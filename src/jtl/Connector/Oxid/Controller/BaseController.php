<?php
namespace jtl\Connector\Oxid\Controller;

use jtl\Core\Rpc\Error;
use jtl\Core\Database\Mysql;
use jtl\Core\Model\DataModel;
use jtl\Core\Model\QueryFilter;
use jtl\Core\Utilities\ClassName;
use \jtl\Core\Controller\Controller;

use jtl\Connector\Result\Action;
use jtl\Connector\Model\Statistic;
use jtl\Connector\ModelContainer\MainContainer;

class BaseController extends Controller
{
    protected $_db;
    
	public function __construct() {
        $this->db = Mysql::getInstance();
	}	
	
    public function pull(QueryFilter $queryfilter) {
        $action = new Action();
        $action->setHandled(true);
        
        try {
            $reflect = new \ReflectionClass($this);
            $class = "\\jtl\\Connector\\Oxid\\Mapper\\{$reflect->getShortName()}";
        
            if(!class_exists($class)) throw new \Exception("Class " . $class . " not available");
            
            $mapper = new $class();
                
            $result = $mapper->pull(null, $queryfilter->getOffset(), $queryfilter->getLimit());
            
            $action->setResult($result);          
        }
        catch (\Exception $exc) {
                $err = new Error();
                $err->setCode($exc->getCode());
                $err->setMessage($exc->getFile().' ('.$exc->getLine().'):'.$exc->getMessage());
                $action->setError($err);
            }
            
        return $action;
    }
    
    public function push(DataModel $model) {
        $action = new Action();
        
        $action->setHandled(true);
        
        try {
            $reflect = new \ReflectionClass($this);
            $class = "\\jtl\\Connector\\Oxid\\Mapper\\{$reflect->getShortName()}";
            
            if(!class_exists($class)) throw new \Exception("Class ".$class." not available");
            
            $mapper = new $class();
            
            $result = $mapper->push($model);
            
            $action->setResult($result);
        }
        catch (\Exception $exc) {
            $err = new Error();
            $err->setCode($exc->getCode());
            $err->setMessage($exc->getFile().' ('.$exc->getLine().'):'.$exc->getMessage());
            $action->setError($err);
        }
        
        return $action;        
    }

    public function statistic(QueryFilter $filter) {
        $reflect = new \ReflectionClass($this);
        $class = "\\jtl\\Connector\\Oxid\\Mapper\\{$reflect->getShortName()}";
        
        if(class_exists($class)) {
            $action = new Action();
            $action->setHandled(true);
            
            try {
                $mapper = new $class();
                
                $statModel = new Statistic();
                
                $statModel->setAvailable($mapper->statistic());
                $statModel->setPending(0);
                $statModel->setControllerName(lcfirst($reflect->getShortName()));
                
                $action->setResult($statModel->getPublic());
            }
            catch (\Exception $exc) {
                $err = new Error();
                $err->setCode($exc->getCode());
                $err->setMessage($exc->getMessage());
                $action->setError($err);
            }
            return $action;
        }
    }
}