<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class Product2Category extends BaseMapper
{
    protected $mapperConfig = array
        (
            "query" => "SELECT * FROM oxobject2category ORDER BY OXCATNID ASC",
            "getMethod" => "getCategories",
            "table" => "oxobject2category",
            "mapPull" => array
                (
                "categoryId" => "OXCATNID",
                "id" => "OXID",
                "productId" => "OXOBJECTID"
                ),
            "mapPush" => array(
                "OXID" => "_id",
                "OXCATNID" => "_categoryId",
                "OXOBJECTID" => "_productId"
            )   
        );
    
    
    //public function pull($data=null, $offset=0, $limit=null) {
    //    return array($this->generateModel($data));
    //}
    
}