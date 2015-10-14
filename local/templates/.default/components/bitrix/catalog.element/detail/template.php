<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

// if ($USER->isAdmin()) {
	// echo '<pre>';
	// print_r($arResult);
	// echo '</pre>';
// }
?>
<div class="element" style="background-image: url('')">
	<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
	$strMainID = $this->GetEditAreaId($arItem['ID']);?>
	<div class="max_width clear_fix" id="<?=$strMainID?>">
		<!--<h1>Каталог товаров:</h1>-->
		<div class="col_4 col_8_w760 col_pad20">
			<?if (!empty($arResult['DETAIL_PICTURE'])):?>
				<img class="element_image" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt=""/>
			<?else:?>
				<img class="element_image" src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt=""/>
			<?endif;?>
			<div class="element_props">
			<?if (is_array($arResult['PROPERTIES']['GREY_PROP']['~VALUE'])):?>
				<?foreach ($arResult['PROPERTIES']['GREY_PROP']['~VALUE'] as $vGrey):?>
				<span class="gray"><?=$vGrey?></span>
				<?endforeach;?>
			<?endif;?>
			<?if (is_array($arResult['PROPERTIES']['BLUE_PROP']['~VALUE'])):?>
				<?foreach ($arResult['PROPERTIES']['BLUE_PROP']['~VALUE'] as $vBlue):?>
				<span class="blue"><?=$vBlue?></span>
				<?endforeach;?>
			<?endif;?>
			</div>
			<div class="element_price">
				<div class="catalog_table_item_price"><?=$arResult['PROPERTIES']['PRICE']['VALUE']?></div>
				<a href="#" class="button" onclick="return addToBasket(<?=$arResult['ID'];?>);">Добавить в корзину</a>
			</div>
			<a href="#" class="element_moreinfo">Узнайте больше у специалиста</a>
		</div>
		<div class="col_4 col_8_w760 col_pad20 element_description">
			<?if (!empty($arResult['DETAIL_TEXT'])):?>
				<?
					if ($arResult['DETAIL_TEXT_TYPE'] == 'text') {
						echo $arResult['DETAIL_TEXT'];
					} else {
						echo $arResult['~DETAIL_TEXT'];
					}
				?>
			<?else:?>
				<?
					if ($arResult['PREVIEW_TEXT_TYPE'] == 'text') {
						echo $arResult['PREVIEW_TEXT'];
					} else {
						echo $arResult['~PREVIEW_TEXT'];
					}
				?>
			<?endif;?>
		</div>
	</div>
</div>


