<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

use jtl\Connector\Model\Identity as IdentityModel;
use jtl\Connector\Model\CustomerOrderPaymentInfo as CustomerOrderPaymentInfoModel;

class CustomerOrderPaymentInfo  extends BaseMapper
{
    public function pull($data=null, $offset=0, $limit=null)
    {
        $return = [];
        $customerOrderPaymentInfoTable = $this->getPaymentInfo($data);
                
        foreach ($customerOrderPaymentInfoTable as $value)
        {
            $customerOrderPaymentInfo = new CustomerOrderPaymentInfoModel();
            
            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXPAYMENTSID']);
            $customerOrderPaymentInfo->setId($identityModel);

            $identityModel = new IdentityModel();
            $identityModel->setEndpoint($value['OXORDERID']);
            $customerOrderPaymentInfo->setCustomerOrderId($identityModel);
            
            if(isset($value['lsbankname']))
            {
                $customerOrderPaymentInfo->setBankName($value['lsbankname']);
            }
            
            if(isset($value['lsktoinhaber']))
            {
                $customerOrderPaymentInfo->setAccountHolder($value['lsktoinhaber']);
            }
            
            if(isset($value['lsktonr']))
            {
                if($this->checkIBAN($value['lsktonr']))
                {
                    $customerOrderPaymentInfo->setIban($value['lsktonr']);
                    $customerOrderPaymentInfo->setAccountNumber("");
                } else {
                    $customerOrderPaymentInfo->setAccountNumber($value['lsktonr']);
                }
            }
            
            if(isset($value['lsblz']))
            {
                if($this->checkBIC($value['lsblz']))
                {
                    $customerOrderPaymentInfo->setBic($value['lsblz']);    
                    $customerOrderPaymentInfo->setBankCode("");
                } else {
                    $customerOrderPaymentInfo->setBankCode($value['lsblz']);
                }
            }
            
            $return[] = $customerOrderPaymentInfo;
        }
        return $return;
    }
    
    public function getPaymentInfo($param)
    {   
        $sqlResult = $this->db->query("SELECT oxorder.OXID AS OXORDERID, oxuserpayments.OXID AS OXPAYMENTSID, oxuserpayments.OXUSERID, DECODE(OXVALUE, 'sd45DF09_sdlk09239DD') AS OXVALUEDECODED
                                        FROM oxuserpayments, oxorder WHERE oxuserpayments.OXUSERID = oxorder.OXUSERID
                                        AND oxuserpayments.OXID = '{$param['OXPAYMENTID']}'");
        
        //Hole alle PaymentInfos pro Bestellung
        for ($i = 0; $i < count($sqlResult); $i++)
        {          
            if($sqlResult[$i]['OXVALUEDECODED'])
            {
                $paymentInfoArr = explode("@@", $sqlResult[$i]['OXVALUEDECODED']);
                unset($paymentInfoArr[4]);
                
                //Vergebe neue Key Parameter
                foreach ($paymentInfoArr as $k => $v) 
                {
                    unset ($paymentInfoArr[$k]);

                    switch ($k)
                    {
                        case 0:
                            $new_arr = explode("__", $v);
                            $new_key = $new_arr[0];
                            $v = $new_arr[1];
                            break;
                        case 1:
                            $new_arr = explode("__", $v);
                            $new_key = $new_arr[0];
                            $v = $new_arr[1];
                            break;
                        case 2:
                            $new_arr = explode("__", $v);
                            $new_key = $new_arr[0];
                            $v = $new_arr[1];
                            break;
                        case 3:
                            $new_arr = explode("__", $v);
                            $new_key = $new_arr[0];
                            $v = $new_arr[1];
                            break;
                    }
                    $paymentInfoArr[$new_key] = $v;
                }
                
                //F�ge Array PaymentInformationen hinzu
                $sqlResult[$i] = $sqlResult[$i] + $paymentInfoArr;
                
            }
            //Entferne Spalte OxValueDecoded
            unset($sqlResult[$i]['OXVALUEDECODED']);
        }      
        return $sqlResult;
    }
    
    /**
     * Summary of checkIBAN
     * Pr�ft ob es sich um eine IBAN Nummer handelt
     * @param $iban
     * @return Boolean
     */
    public function checkIBAN($iban = "")
	{
        $iban = preg_replace('/\s*/i', '', $iban);
        return preg_match('/[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}/i', $iban);
    }

    /**
     * Summary of checkBIC
     * Pr�ft ob es sich um eine BIC Nummer handelt
     * @param $bic
     * @return Boolean
     */
    public function checkBIC($bic = "")
	{
        $bic = preg_replace('/\s*/i', '', $bic);
        return preg_match('/([a-zA-Z]{4}[a-zA-Z]{2}[a-zA-Z0-9]{2}([a-zA-Z0-9]{3})?)/i', $bic);
    }
}