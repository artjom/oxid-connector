<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\ModelContainer\ProductContainer;

/**
 * Summary of Product
 */
class Product extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\Product",
            "table" => "oxarticles",
            "PK" => "OXID",
            "mapPull" => array
                (
                    "_id" => "OXID",
                    "_masterProductId" => "OXPARENTID",
                    "_manufacturerId" => "OXMANUFACTURERID",
                    "_unitId" => "OXUNITNAME",
                    "_basePriceUnitId" => null,
                    "_sku" => "OXARTNUM",
                    "_stockLevel" => "OXSTOCK",
                    "_vat" => null,
                    "_minimumOrderQuantity" => "OXUNITQUANTITY",
                    "_ean" => "OXEAN",
                    "_productWeight" => "OXWEIGHT",
                    "_recommendedRetailPrice" => "OXTPRICE",
                    "_keywords" => "OXSEARCHKEYS",
                    "_sort" => "OXSORT",
                    "_created" => "OXINSERT",
                    "_availableFrom" => null,
                    "_manufacturerNumber" => "OXMPN",
                    "_isMasterProduct" => null
                ),
               "mapPush" => array(
                    "OXID" => "_id",
                    "OXPARENTID" => "_masterProductId",
                    "OXMANUFACTURERID" => "_manufacturerId",
                    "OXUNITNAME" => "_unitId",
                    "OXARTNUM" => "_sku",
                    "OXSTOCK" => "_stockLevel",
                    "OXUNITQUANTITY" => "_minimumOrderQuantity",
                    "OXEAN" => "_ean",
                    "OXWEIGHT" => "_productWeight",
                    "OXTPRICE" => "_recommendedRetailPrice",
                    "OXSEARCHKEYS" => "_keywords",
                    "OXSORT" => "_sort",
                    "OXINSERT" => "_created",
                    "OXACTIVEFROM" => "_availableFrom",
                    "OXMPN" => "_manufacturerNumber"
               )
        );
    
    public function _created($data)
    {
        return $this->stringToDateTime($data['OXINSERT']);
    }
    
    public function _availableFrom($data)
    {
        return $this->stringToDateTime($data['OXACTIVEFROM']);
    }
    
    public function _isMasterProduct($data)
    {            
            $oxidConf = new Config();
            
            $sqlResult = $this->_db->query("SELECT Count(OXPARENTID) AS ParentCount FROM oxid_michele.oxarticles
                                            WHERE OXPARENTID = '{$data['OXID']}';");
            
            if(($sqlResult[0]['ParentCount'] != 0))
            {
                return true;
            }            
        return false;
    }   
    
    //ToDo!
    //public function _vat($data)
    //{
    //    if(!empty($data['OXVAT']))
    //    {
    //        return $data['OXVAT'];
    //    }else{
    //        die(print_r($this->getDefaultVAT));
    //        return $this->getDefaultVAT;
    //    }
    //}
    
    //_basePriceUnitId = Preis wird bereits in der Artikel Tabelle vergeben.
    //_basePriceDivisor ?
}

/* non mapped properties
Product:
_deliveryStatus
_shippingClassId
_note
_isTopProduct
_shippingWeight
_isNew
_considerStock
_permitNegativeStock
_considerVariationStock
_isDivisible
_considerBasePrice
_serialNumber
_isbn
_asin
_unNumber
_hazardIdNumber
_taric
_takeOffQuantity
_setArticleId
_upc
_originCountry
_epid
_productTypeId
_inflowQuantity
_inflowDate
_bestBefore
_supplierStockLevel
_supplierDeliveryTime
*/