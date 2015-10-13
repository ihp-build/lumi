<?//if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?include($_SERVER['DOCUMENT_ROOT'].'/local/templates/lumi/header.php');?>

<div class="catalog_baner">
	<img src="/upl/cat_baner.jpg" alt=""/>
</div>
	<div class="max_width">
		<div class="breadcramp col_padlr_20 clear_fix">
			<?$APPLICATION->IncludeComponent("bitrix:breadcrumb","lumi",Array(
				"START_FROM" => "0", 
				"PATH" => "", 
				"SITE_ID" => "s1" 
				)
			);?>
		</div>
		<h1><?=$APPLICATION->ShowTitle(false);?></h1>