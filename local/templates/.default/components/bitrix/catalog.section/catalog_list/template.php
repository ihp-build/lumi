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
// print_r($arResult['ITEMS']);
// echo '</pre>';
?>

<?if (!empty($arResult['ITEMS'])):?>

	<div class="catalog_table clear_fix">
	<?if ($arParams["DISPLAY_TOP_PAGER"])
	{
		?><? echo $arResult["NAV_STRING"]; ?><?
	}

	$strElementEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT");
	$strElementDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE");
	$arElementDeleteParams = array("CONFIRM" => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));?>
	<?foreach ($arResult['ITEMS'] as $key => $arItem):?>
		<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $strElementEdit);
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $strElementDelete, $arElementDeleteParams);
		$strMainID = $this->GetEditAreaId($arItem['ID']);?>
		<div class="catalog_table_item col_4 col_8_w980" id="<?=$strMainID?>">
			<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="catalog_table_item_img col_4 col_8_w480" style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>')"></a>
			<div class="catalog_table_item_text col_4 col_8_w480">
				<a href="<?=$arItem['DETAIL_PAGE_URL']?>"  class="catalog_table_item_name"><?=$arItem['NAME']?></a>
				<div class="catalog_table_item_txt">
					<?=$arItem['PREVIEW_TEXT']?>
				</div>

				<div class="catalog_table_item_price"><?=$arItem['PROPERTIES']['PRICE']['VALUE']?></div>
				<!--<span class="button">1</span>-->
				<a class="button" href="#">Добавить в корзину</a>
			</div>
		</div>
	<?endforeach;?>
	</div>

	<?if ($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?echo $arResult["NAV_STRING"]; ?>
	<?endif;?>
	
<?endif;?>