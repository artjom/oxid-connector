<?php
namespace jtl\Connector\Oxid\Controller;

use \jtl\Connector\Result\Action;
use \jtl\Connector\Model\Statistic;
use \jtl\Core\Controller\Controller;
use \jtl\Core\Model\DataModel;
use \jtl\Core\Model\QueryFilter;

class Connector extends Controller {   
    public function statistic(QueryFilter $filter) {
        $action = new Action();
        $action->setHandled(true);
        
        $return = [];
        
        $mainControllers = array(
            'Category',
            'Customer',
            'CustomerOrder',
            'GlobalData',
            'Image',
            'Product',
            'Manufacturer',
            'Specific'
        );
        
        foreach($mainControllers as $controller) {
            $class = "\\jtl\\Connector\\Oxid\\Mapper\\{$controller}";
            
            if(class_exists($class)) {
                try {
                    $mapper = new $class();
                    
                    $statModel = new Statistic();
                    
                    $statModel->setAvailable($mapper->statistic());
                    $statModel->setPending(0);
                    $statModel->setControllerName(lcfirst($controller));
                    
                    $return[] = $statModel->getPublic();
                }
                catch (\Exception $exc) {
                    $err = new Error();
                    $err->setCode($exc->getCode());
                    $err->setMessage($exc->getMessage());
                    $action->setError($err);
                }
            }
        }
        
        $action->setResult($return);
        
        return $action;        
    } 
    
    public function pull(QueryFilter $queryfilter) {}   
    
    public function push(DataModel $model) {}    
}