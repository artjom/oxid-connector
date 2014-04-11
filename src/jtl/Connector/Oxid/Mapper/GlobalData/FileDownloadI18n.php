<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\GlobalDataContainer;

/**
 * Summary of FileDownloadI18n
 */
class FileDownloadI18n extends BaseMapper
{  
    protected $_config = array
    (
     "model" => "\\jtl\\Connector\\Model\\FileDownloadI18n",
        "table" => "oxfiles",
        "pk" => "OXID",
        "mapPull" => array(
            "_fileDownloadId" => "OXID",
            "_name" => "OXFILENAME"
        ),
        "mapPush" => array(
            "OXID" => "_fileDownloadId",
            "OXFILENAME" => "_name"
        )
    );    
}

/* non mapped properties
 * FileDownloadI18n:
 * _description
 */