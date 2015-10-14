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

// echo '<pre>';
// print_r($arResult);
// echo '</pre>';
?>
<div class="element" style="background-image: url('')">
	<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
	$strMainID = $this->GetEditAreaId($arItem['ID']);?>
	<div class="max_width clear_fix" id="<?=$strMainID?>">
		<!--<h1>Каталог товаров:</h1>-->
		<div class="col_4 col_8_w760 col_pad20">
			<img class="element_image" src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt=""/>
			<div class="element_props">
				<span class="gray"><i class="fa fa-tint"></i> asdasd</span>
				<span class="blue"><i class="fa fa-sun-o"></i> asdasd</span>
			</div>
			<div class="element_price">
				<div class="catalog_table_item_price"><?=$arResult['PROPERTIES']['PRICE']['VALUE']?></div>
				<a class="button" href="<?=$arResult['BUY_URL']?>">Добавить в корзину</a>
			</div>
			<a href="#" class="element_moreinfo">Узнайте больше у специалиста</a>
		</div>
		<div class="col_4 col_8_w760 col_pad20 element_description">
			<h2>Описание</h2>
			<p>
				<?if (!empty($arResult['DETAIL_TEXT'])):?>
					<?=$arResult['DETAIL_TEXT']?>
				<?else:?>
					<?=$arResult['PREVIEW_TEXT']?>
				<?endif;?>
			</p>
			<h2>Состав</h2>
			<p>
				<ul>
					<li>asdas</li>
					<li>asdas</li>
					<li>asdas</li>
					<li>asdas</li>
				</ul>
				f you have n click 'Open Dispute' before Purchase Protection deadline or
			</p>
		</div>
	</div>
</div>


