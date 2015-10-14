<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="main_preim">
	<h2>Работать с нами легко и удобно</h2>
	<div class="max_width mrg_t30 clear_fix">

		<?foreach($arResult["ITEMS"] as $arItem) { ?>

			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>

			<? if ($arItem['ID'] == "24") { //Консультации специалистов?>
				<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<a href="#" class="col_2 col_4_w980 col_8_w480 main_preim_i" style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>');" onclick="return consultRequest();">
						<b><?=$arItem['NAME']?></b>
						узнайте подробнне
					</a>
				</div>
			<?}else{?>
				<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<a href="/zag.jpg" class="col_2 col_4_w980 col_8_w480 main_preim_i fancybox" style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>');">
						<b><?=$arItem['NAME']?></b>
						узнайте подробнне
					</a>
				</div>
			<?}?>

		<?}?>


	</div>
	<div class="text_center">
		<a class="main_preim_lnk fancybox" href="/about/">Узнайте больше о нас</a>
	</div>
</div>