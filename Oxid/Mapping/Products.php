<?php
Namespace jtl\Connector\Oxid\Mapping;

require_once("../Database/Database.php");
require_once("../Classes/Product/ProductConf.inc.php");

Class Products {

    public $MediaFile = array();
    public $MediaFileAttr = array();
    public $MediaFileI18n = array();
    public $ProductVariation = array();
    public $ProductVariationI18n = array();
    public $ProductVariationVisibility = array();
    public $ProductVariationValue = array();
    public $ProductVariationValueDependency = array();
    public $ProductVariationValueExtraCharge = array();
    public $ProductVariationValueI18n = array();
    public $ProductVariationValueVisibility = array();
    public $CrossSelling = array();
    public $FileUpload = array();
    public $Product = array();
    public $Product2Category = array();
    public $ProductAttr = array();
    public $ProductAttrI18n = array();
    public $ProductConfigGroup = array();
    public $ProductFileDownload = array();
    public $ProductFunctionAttr = array();
    public $ProductI18n = array();
    public $ProductPrice = array();
    public $ProductSpecialPrice = array();
    public $ProductSpecific = array();
    public $ProductVisibility = array();
    public $ProductWarehouseInfo = array();
    public $SpecialPrice = array();
    public $setArticle = array();

    Public Function getProducts() {
        $database = New Database();
        $query = "SELECT OXID AS ProductID, " .
                "OXSHOPID, " .
                "OXPARENTID, " .
                "OXACTIVE, " .
                "OXACTIVEFROM, " .
                "OXACTIVETO, " .
                "OXARTNUM, " .
                "OXTITLE, " .
                "OXSHORTDESC, " .
                "OXPRICE " .
                "FROM oxarticles";              

        $SQLResult = $database->oxidStatement($query);

        echo $query;

        Return $this->fillProductClasses($SQLResult);
    }

    /**
     * Füllt die Produkt-Klassen mit Inhalt vom Oxid-Shop
     * @param type $SQLResult
     * @return \Products
     */
    Function fillProductClasses($SQLResult) {
        $Products = New Products;

        For ($i = 0; $i < count($SQLResult); ++$i) {

            /* MediaFile */
            $MediaFile = New MediaFile;
//            $MediaFile->setId($SQLResult[$i]['']);
//            $MediaFile->setPath($SQLResult[$i]['']);
//            $MediaFile->setMediaFileCategory($SQLResult[$i]['']);
            $MediaFile->setProductId($SQLResult[$i]['ProductID']);
//            $MediaFile->setSort($SQLResult[$i]['']);
//            $MediaFile->setType($SQLResult[$i]['']);
//            $MediaFile->setUrl($SQLResult[$i]['']);

            /* MediaFileAttr */
            $MediaFileAttr = New MediaFileAttr;
//            $MediaFileAttr->setLocaleName($SQLResult[$i]['']);
//            $MediaFileAttr->setMediaFileAttr($SQLResult[$i]['']);
//            $MediaFileAttr->setMediaFileId($SQLResult[$i]['']);
//            $MediaFileAttr->setName($SQLResult[$i]['']);
//            $MediaFileAttr->setValue($SQLResult[$i]['']);

            /* MediaFileI18n */
            $MediaFileI18n = New MediaFileI18n;
//            $MediaFileI18n->setDescription($SQLResult[$i]['']);
//            $MediaFileI18n->setLocaleName($SQLResult[$i]['']);
//            $MediaFileI18n->setMediaFileId($SQLResult[$i]['']);
//            $MediaFileI18n->setName($SQLResult[$i]['']);

            /* ProductVariation */
            $ProductVariation = New ProductVariation;
//            $ProductVariation->setId($SQLResult[$i]['']);
//            $ProductVariation->setProductId($SQLResult[$i]['']);
//            $ProductVariation->setSort($SQLResult[$i]['']);
//            $ProductVariation->setType($SQLResult[$i]['']);

            /* ProductVariationI18n */
            $ProductVariationI18n = New ProductVariationI18n;
//            $ProductVariationI18n->setLocaleName($SQLResult[$i]['']);
//            $ProductVariationI18n->setName($SQLResult[$i]['']);
//            $ProductVariationI18n->setProductVariationId($SQLResult[$i]['']);

            /* ProductVariationVisibility */
            $ProductVariationVisibility = New ProductVariationVisibility;
//            $ProductVariationVisibility->setCustomerGroupId($SQLResult[$i]['']);
//            $ProductVariationVisibility->setProductVariationId($SQLResult[$i]['']);

            /* ProductVariationValue */
            $ProductVariationValue = New ProductVariationValue;
//            $ProductVariationValue->setExtraWeight($SQLResult[$i]['']);
//            $ProductVariationValue->setId($SQLResult[$i]['']);
//            $ProductVariationValue->setPackagingUnitId($SQLResult[$i]['']);
//            $ProductVariationValue->setProductVariationId($SQLResult[$i]['']);
//            $ProductVariationValue->setSku($SQLResult[$i]['']);
//            $ProductVariationValue->setSort($SQLResult[$i]['']);
//            $ProductVariationValue->setStockLevel($SQLResult[$i]['']);

            /* ProductVariationValueDependency */
            $ProductVariationValueDependency = New ProductVariationValueDependency;
//            $ProductVariationValueDependency->setProductVariationValue($SQLResult[$i]['']);
//            $ProductVariationValueDependency->setProductVariationValueTargetId($SQLResult[$i]['']);

            /* ProductVariationValueExtraCharge */
            $ProductVariationValueExtraCharge = New ProductVariationValueExtraCharge;
//            $ProductVariationValueExtraCharge->setCustomerGroupId($SQLResult[$i]['']);
//            $ProductVariationValueExtraCharge->setCustomerGroupId($SQLResult[$i]['']);

            /* ProductVariationValueI18n */
            $ProductVariationValueI18n = New ProductVariationValueI18n;
//            $ProductVariationValueI18n->setLocaleName($SQLResult[$i]['']);
//            $ProductVariationValueI18n->setName($SQLResult[$i]['']);
//            $ProductVariationValueI18n->setProductVariationValueId($SQLResult[$i]['']);

            /* ProductVariationValueVisibility */
            $ProductVariationValueVisibility = New ProductVariationValueVisibility;
//            $ProductVariationValueVisibility->setCustomerGroupId($SQLResult[$i]['']);
//            $ProductVariationValueVisibility->setProductVariationValueId($SQLResult[$i]['']);

            /* CrossSelling */
            $CrossSelling = New CrossSelling;
//            $CrossSelling->setCrossSellingGroupId($SQLResult[$i]['']);
//            $CrossSelling->setCrossSellingProductId($SQLResult[$i]['']);
//            $CrossSelling->setId($SQLResult[$i]['']);
//            $CrossSelling->setProductId($SQLResult[$i]['']);

            /* FileUpload */
            $FileUpload = New FileUpload;
//            $FileUpload->setDescription($SQLResult[$i]['']);
//            $FileUpload->setFileType($SQLResult[$i]['']);
//            $FileUpload->setId($SQLResult[$i]['']);
//            $FileUpload->setIsRequired($SQLResult[$i]['']);
//            $FileUpload->setName($SQLResult[$i]['']);
//            $FileUpload->setProductId($SQLResult[$i]['']);

            /* Product */
            $Product = New Product;
//            $Product->setId($SQLResult[$i]['']);
//            $Product->setMasterProductId($SQLResult[$i]['']);
//            $Product->setManufacturerId($SQLResult[$i]['']);
//            $Product->setDeliveryStatusId($SQLResult[$i]['']);
//            $Product->setUnitId($SQLResult[$i]['']);
//            $Product->setBasePriceUnitId($SQLResult[$i]['']);
//            $Product->setShippingClassId($SQLResult[$i]['']);
//            $Product->setSku($SQLResult[$i]['']);
//            $Product->setNote($SQLResult[$i]['']);
//            $Product->setStockLevel($SQLResult[$i]['']);
//            $Product->setVat($SQLResult[$i]['']);
//            $Product->setMinimumOrderQuantity($SQLResult[$i]['']);
//            $Product->setEan($SQLResult[$i]['']);
//            $Product->setIsTopProduct($SQLResult[$i]['']);
//            $Product->setProductWeight($SQLResult[$i]['']);
//            $Product->setShippingWeight($SQLResult[$i]['']);
//            $Product->setIsNew($SQLResult[$i]['']);
//            $Product->setRecommendedRetailPrice($SQLResult[$i]['']);
//            $Product->setConsiderStock($SQLResult[$i]['']);
//            $Product->setPermitNegativeStock($SQLResult[$i]['']);
//            $Product->setConsiderVariationStock($SQLResult[$i]['']);
//            $Product->setIsDivisible($SQLResult[$i]['']);
//            $Product->setConsiderBasePrice($SQLResult[$i]['']);
//            $Product->setBasePriceDivisor($SQLResult[$i]['']);
//            $Product->setKeywords($SQLResult[$i]['']);
//            $Product->setCreated($SQLResult[$i]['']);
//            $Product->setAvailableFrom($SQLResult[$i]['']);
//            $Product->setManufacturerNumber($SQLResult[$i]['']);
//            $Product->setSerialNumber($SQLResult[$i]['']);
//            $Product->setIsbn($SQLResult[$i]['']);
//            $Product->setAsin($SQLResult[$i]['']);
//            $Product->setUnNumber($SQLResult[$i]['']);
//            $Product->setHazardIdNumber($SQLResult[$i]['']);
//            $Product->setTaric($SQLResult[$i]['']);
//            $Product->setIsMasterProduct($SQLResult[$i]['']);
//            $Product->setTakeOffQuantity($SQLResult[$i]['']);
//            $Product->setSetArticleId($SQLResult[$i]['']);
//            $Product->setUpc($SQLResult[$i]['']);
//            $Product->setOriginCountry($SQLResult[$i]['']);
//            $Product->setEpid($SQLResult[$i]['']);
//            $Product->setProductTypeId($SQLResult[$i]['']);
//            $Product->setInflowQuantity($SQLResult[$i]['']);
//            $Product->setInflowDate($SQLResult[$i]['']);
//            $Product->setSupplierStockLevel($SQLResult[$i]['']);
//            $Product->setSupplierDeliveryTime($SQLResult[$i]['']);
//            $Product->setBestBefore($SQLResult[$i]['']);



            

            /* Product2Category */
            $Product2Category = New Product2Category;
//            $Product2Category->setCategoryId($SQLResult[$i]['']);
//            $Product2Category->setId($SQLResult[$i]['']);
//            $Product2Category->setProductId($SQLResult[$i]['']);

            /* ProductAttr */
            $ProductAttr = New ProductAttr;
//            $ProductAttr->setId($SQLResult[$i]['']);
//            $ProductAttr->setProductId($SQLResult[$i]['']);
//            $ProductAttr->setSort($SQLResult[$i]['']);
//            $ProductAttr->setType($SQLResult[$i]['']);

            /* ProductAttrI18n */
            $ProductAttrI18n = New ProductAttrI18n;
//            $ProductAttrI18n->setKey($SQLResult[$i]['']);
//            $ProductAttrI18n->setLocaleName($SQLResult[$i]['']);
//            $ProductAttrI18n->setProductAttrId($SQLResult[$i]['']);
//            $ProductAttrI18n->setValue($SQLResult[$i]['']);

            /* ProductConfigGroup */
            $ProductConfigGroup = New ProductConfigGroup;
//            $ProductConfigGroup->setConfigGroupId($SQLResult[$i]['']);
//            $ProductConfigGroup->setId($SQLResult[$i]['']);
//            $ProductConfigGroup->setProductId($SQLResult[$i]['']);
//            $ProductConfigGroup->setSort($SQLResult[$i]['']);

            /* ProductFileDownload */
            $ProductFileDownload = New ProductFileDownload;
//            $ProductFileDownload->setFileDownloadId($SQLResult[$i]['']);
//            $ProductFileDownload->setProductId($SQLResult[$i]['']);

            /* ProductFunctionAttr */
            $ProductFunctionAttr = New ProductFunctionAttr;
//            $ProductFunctionAttr->setId($SQLResult[$i]['']);
//            $ProductFunctionAttr->setKey($SQLResult[$i]['']);
//            $ProductFunctionAttr->setProductId($SQLResult[$i]['']);
//            $ProductFunctionAttr->setValue($SQLResult[$i]['']);

            /* ProductI18n */
            $ProductI18n = New ProductI18n;
//            $ProductI18n->setDescription($SQLResult[$i]['']);
//            $ProductI18n->setLocaleName($SQLResult[$i]['']);
//            $ProductI18n->setMetaDescription($SQLResult[$i]['']);
//            $ProductI18n->setMetaKeywords($SQLResult[$i]['']);
//            $ProductI18n->setName($SQLResult[$i]['']);
//            $ProductI18n->setProductId($SQLResult[$i]['']);
//            $ProductI18n->setShortDescription($SQLResult[$i]['']);
//            $ProductI18n->setTitleTag($SQLResult[$i]['']);
//            $ProductI18n->setUrl($SQLResult[$i]['']);

            /* ProductPrice */
            $ProductPrice = New ProductPrice;
//            $ProductPrice->setCustomerGroupId($SQLResult[$i]['']);
//            $ProductPrice->setNetPrice($SQLResult[$i]['']);
//            $ProductPrice->setProductId($SQLResult[$i]['']);
//            $ProductPrice->setQuantity($SQLResult[$i]['']);

            /* ProductSpecialPrice */
            $ProductSpecialPrice = New ProductSpecialPrice;
//            $ProductSpecialPrice->setActiveFrom($SQLResult[$i]['']);
//            $ProductSpecialPrice->setActiveUntil($SQLResult[$i]['']);
//            $ProductSpecialPrice->setConsiderDateLimit($SQLResult[$i]['']);
//            $ProductSpecialPrice->setConsiderQuantityLimit($SQLResult[$i]['']);
//            $ProductSpecialPrice->setId($SQLResult[$i]['']);
//            $ProductSpecialPrice->setIsActive($SQLResult[$i]['']);
//            $ProductSpecialPrice->setProductId($SQLResult[$i]['']);
//            $ProductSpecialPrice->setQuantityLimit($SQLResult[$i]['']);

            /* ProductSpecific */
            $ProductSpecific = New ProductSpecific;
//            $ProductSpecific->setId($SQLResult[$i]['']);
//            $ProductSpecific->setProductId($SQLResult[$i]['']);
//            $ProductSpecific->setSpecificValueId($SQLResult[$i]['']);

            /* ProductVisibility */
            $ProductVisibility = New ProductVisibility;
//            $ProductVisibility->setCustomerGroupId($SQLResult[$i]['']);
//            $ProductVisibility->setProductId($SQLResult[$i]['']);

            /* ProductWarehouseInfo */
            $ProductWarehouseInfo = New ProductWarehouseInfo;
//            $ProductWarehouseInfo->setInflowDate($SQLResult[$i]['']);
//            $ProductWarehouseInfo->setInflowQuantity($SQLResult[$i]['']);
//            $ProductWarehouseInfo->setProductId($SQLResult[$i]['']);
//            $ProductWarehouseInfo->setStockLevel($SQLResult[$i]['']);
//            $ProductWarehouseInfo->setWarehouseId($SQLResult[$i]['']);

            /* SpecialPrice */
            $SpecialPrice = New SpecialPrice;
//            $SpecialPrice->setCustomerGroupId($SQLResult[$i]['']);
//            $SpecialPrice->setPriceNet($SQLResult[$i]['']);
//            $SpecialPrice->setProductSpecialPriceId($SQLResult[$i]['']);

            /* setArticle */
            $setArticle = New setArticle;
//            $setArticle->setId($SQLResult[$i]['']);
//            $setArticle->setProductId($SQLResult[$i]['']);
//            $setArticle->setQuantity($SQLResult[$i]['']);


            $Products->MediaFile[$i] = $MediaFile;
            $Products->MediaFileAttr[$i] = $MediaFileAttr;
            $Products->MediaFileI18n[$i] = $MediaFileI18n;
            $Products->ProductVariation[$i] = $ProductVariation;
            $Products->ProductVariationI18n[$i] = $ProductVariationI18n;
            $Products->ProductVariationVisibility[$i] = $ProductVariationVisibility;
            $Products->ProductVariationValue[$i] = $ProductVariationValue;
            $Products->ProductVariationValueDependency[$i] = $ProductVariationValueDependency;
            $Products->ProductVariationValueExtraCharge[$i] = $ProductVariationValueExtraCharge;
            $Products->ProductVariationValueI18n[$i] = $ProductVariationValueI18n;
            $Products->ProductVariationValueVisibility[$i] = $ProductVariationValueVisibility;
            $Products->CrossSelling[$i] = $CrossSelling;
            $Products->FileUpload[$i] = $FileUpload;
            $Products->Product[$i] = $Product;
            $Products->Product2Category[$i] = $Product2Category;
            $Products->ProductAttr[$i] = $ProductAttr;
            $Products->ProductAttrI18n[$i] = $ProductAttrI18n;
            $Products->ProductConfigGroup[$i] = $ProductConfigGroup;
            $Products->ProductFileDownload[$i] = $ProductFileDownload;
            $Products->ProductFunctionAttr[$i] = $ProductFunctionAttr;
            $Products->ProductI18n[$i] = $ProductI18n;
            $Products->ProductPrice[$i] = $ProductPrice;
            $Products->ProductSpecialPrice[$i] = $ProductSpecialPrice;
            $Products->ProductSpecific[$i] = $ProductSpecific;
            $Products->ProductVisibility[$i] = $ProductVisibility;
            $Products->ProductWarehouseInfo[$i] = $ProductWarehouseInfo;
            $Products->SpecialPrice[$i] = $SpecialPrice;
            $Products->setArticle[$i] = $setArticle;
        }

        return $Products;
    }

    /**
     * Schreibe Produkte in Oxid-Shop
     * @return null
     */
    Public Function setProducts() {
        return Null;
    }

}

$Products = New Products;
$result = $Products->getProducts();

//Ausgabe
echo "<pre>";
print_r($result);
echo "</pre>";
?>
<a href="http://localhost/">Zur&uuml;ck</a>