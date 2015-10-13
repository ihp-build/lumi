<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карта сайта");
$APPLICATION->SetPageProperty("title", "Карта сайта");
$APPLICATION->AddChainItem("Карта сайта", "/sitemap.php");
?>

<div class="col_padlr_20 clear_fix">

<?$APPLICATION->IncludeComponent("bitrix:main.map","",Array(
        "LEVEL" => "3", 
        "COL_NUM" => "1", 
        "SHOW_DESCRIPTION" => "N", 
        "SET_TITLE" => "Y", 
        "CACHE_TYPE" => "Y", 
        "CACHE_TIME" => "3600" 
    )
);?>

</div>

<br />

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>