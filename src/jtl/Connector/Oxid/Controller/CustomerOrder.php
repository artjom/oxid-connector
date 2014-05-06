<?php
namespace jtl\Connector\Oxid\Controller;

use jtl\Core\Rpc\Error;
use jtl\Core\Model\QueryFilter;
use jtl\Core\Exception\DatabaseException;
use jtl\Core\Exception\TransactionException;

use jtl\Connector\Result\Action;
use jtl\Connector\ModelContainer\CustomerOrderContainer;
use jtl\Connector\Result\Transaction as TransactionResult;
use jtl\Connector\Transaction\Handler as TransactionHandler;

use jtl\Connector\Oxid\Controller\BaseController;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrder as CustomerOrderMapper;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderItem as CustomerOrderItemMapper;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderPaymentInfo as CustomerOrderPaymentInfoMapper;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderShippingAddress as CustomerOrderShippingAddressMapper;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderBillingAddress as CustomerOrderBillingAddressMapper;


class CustomerOrder extends BaseController
{
    //public function pull($params)
    //{
    //    $action = new Action();
    //    $action->setHandled(true);
        
    //    $filter = new QueryFilter();
    //    $filter->set($params);
        
    //    try
    //    {
    //        $container = new CustomerOrderContainer();
            
    //        $customerOrderMapper = new CustomerOrderMapper();
    //        $customerOrderItemMapper = new CustomerOrderItemMapper();
    //        $customerOrderShippingAddressMapper = new CustomerOrderShippingAddressMapper();
    //        $customerOrderBillingAddressMapper = new CustomerOrderBillingAddressMapper();
    //        $customerOrderPaymentInfoMapper = new CustomerOrderPaymentInfoMapper();
            
    //        $customerOrderMapper->fetchAll($container, 'customer_order');
    //        $customerOrderItemMapper->fetchAll($container, 'customer_order_item', array('query' => "SELECT * FROM oxorderarticles ORDER BY OXORDERID DESC"));
    //        $customerOrderShippingAddressMapper->fetchAll($container, 'customer_order_shipping_address');
    //        $customerOrderBillingAddressMapper->fetchAll($container, 'customer_order_billing_address');
    //        $customerOrderPaymentInfoMapper->fetchAll($container, 'customer_order_payment_info', $customerOrderPaymentInfoMapper->getPaymentInfo());

    //        $result[] = $container->getPublic(array('items'));
			
    //        $action->setResult($result);
    //    }
    //    catch (\Exception $exc) 
    //    {
    //        $err = new Error();
    //        $err->setCode($exc->getCode());
    //        $err->setMessage($exc->getMessage());
    //        $action->setError($err);
    //    }
        
    //    return $action;
        
    //}
}

/* non mapped class
 * - CustomerOrderAttr
 * - CustomerOrderItemVariation
 */