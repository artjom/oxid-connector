<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
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
                    "_shippingClassId" => "",
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
                    "_availableFrom" => "OXACTIVEFROM",
                    "_manufacturerNumber" => "OXMPN",
                    "_isMasterProduct" => null,
                    "_takeOffQuantity" => null,
                    "_setArticleId" => null,
                    "_upc" => null,
                    "_originCountry" => null,
                    "_epid" => null,
                    "_productTypeId" => null,
                    "_inflowQuantity" => null,
                    "_inflowDate" => null,
                    "_supplierStockLevel" => null,
                    "_supplierDeliveryTime" => null,
                    "_bestBefore" => null
                )
        );
    
    //_vat = OXVAT(Spezielle MwSt) Normale MwSt in Currency-Blob "oxconfig"
    //_basePriceUnitId = Preis wird bereits in der Artikel Tabelle vergeben.
    //_basePriceDivisor ?
    
    //_isMasterProduct Wenn Artikel in ParentId eingetragen wurde ist der Artikel ein Materartikel in Oxid
}

/* non mapped properties
Product:
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
 */