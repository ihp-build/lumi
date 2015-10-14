<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<h3>В корзине товаров: <?=count($arParams['ALL_ELEMENTS']);?></h3>
<div class="basket_slider">
	<div class="basket_slider_display">

		<?
		$total_price = 0;
		?>
		<?foreach($arResult["ITEMS"] as $arItem) { ?>
			<?
			$quantity = 1;
			foreach ($arParams['ALL_ELEMENTS'] as $iter_key => $iter_value)
			{
				if ($iter_value['element_id'] == $arItem['ID'])
				{
					$quantity = $iter_value['quantity'];
					break;
				}
			}

			$total_price += (intval($arItem['PROPERTIES']['PRICE']['VALUE']) * intval($quantity));

			?>
			<div class="basket_slider_item">
				<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
					<div class="basket_slider_item_img" style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>')"></div>
					<div class="basket_addedd_name"><?=$arItem['NAME']?></div>
				</a>
				<div class="text_center">
					<div class="catalog_table_item_price"><?=$asItem['PROPERTIES']['PRICE']['VALUE']?></div>
					<div class="basket_addedd_quality"> x <?=$quantity?> шт.</div>
				</div>
			</div>
		<?
		}
		?>

	</div>
</div>

<div class="basket_full">
	Общая сумма покупок: <b><?=$total_price?></b> руб.
</div>