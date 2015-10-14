<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<?foreach($arResult as $arItem):?>

	<?if ($arItem["PERMISSION"] > "D"):?>
		<a class="<?if ($arItem['SELECTED']):?> selected<?endif?>" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
	<?endif?>

<?endforeach?>

<?endif?>