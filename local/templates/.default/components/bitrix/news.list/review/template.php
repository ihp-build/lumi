<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="main_rev">
	<div class="max_width">
		<h2 class="text_center">Отзывы наших клиентов</h2>
		<div class="main_rev_arr">
			<div class="main_rev_slider">
				<div id="main_rev_slider_disp" class="main_rev_slider_disp">
					
					<?foreach($arResult["ITEMS"] as $arItem) { ?>

						<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						?>

						<div class="main_rev_slider_i" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
							<div style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>')" class="main_rev_slider_i_img"></div>
							<div class="centered_vertical">
								<?=$arItem["PREVIEW_TEXT"]?>
								<i><?=$arItem["NAME"]?></i>
							</div>
						</div>
					<? } ?>

				</div>
			</div>
			<div class="main_rev_arr_l"></div>
			<div class="main_rev_arr_r"></div>
		</div>
		<div class="text_center">
			<a href="/review/" class="buttonline fancybox">Подробнее</a>
		</div>
	</div>
</div>