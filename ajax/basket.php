<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<script>
var basketSlide = itBeSlider({
	display:$('.basket_slider_display'),
})
</script>
<?

CModule::IncludeModule("iblock");

function addToBasket()
{
	if (isset($_REQUEST['add']) && isset($_REQUEST['element_id']))
	{
		$element_id = $_REQUEST['element_id'];
		$current_quantity = 1;
		$all_elements = array();
		
		if (isset($_COOKIE['basket_elements']))
		{
			$basket = rtrim($_COOKIE['basket_elements'], ',');
			$basket_array = explode(',', $basket);

			$obj = '';
			$never_added = true;
			foreach ($basket_array as $b_key => $b_value)
			{
				$b_value_array = explode('x', $b_value);
				$val_id = $b_value_array[0];
				$val_quantity = $b_value_array[1];

				if ( $val_id == $element_id )
				{
					$never_added = false;

					$val_quantity = intval($val_quantity) + 1;
					$val_quantity = (string)$val_quantity;
					$current_quantity = $val_quantity;
				}

				$obj .= $val_id . 'x' . $val_quantity . ',';
				$all_elements[] = array('element_id' => $val_id, 'quantity' => $val_quantity);

			}

			if ($never_added)
			{
				$obj .= $element_id . 'x' . '1,';
				$all_elements[] = array('element_id' => $element_id, 'quantity' => '1');
			}

			setcookie('basket_elements', $obj, time()+36000000, '/');
			return array('element_id' => $element_id, 'quantity' => $current_quantity, "all_elements" => $all_elements);
		}
		else
		{
			$obj = $element_id . 'x' . '1,';
			setcookie('basket_elements', $obj, time()+36000000, '/');
			return array('element_id' => $element_id, 'quantity' => $current_quantity, "all_elements" => array(array('element_id' => $element_id, 'quantity' => '1')));
		}
	}
	return array();
}

$element_cookie_data = addToBasket();


function removeFromBasket()
{
	if (isset($_REQUEST['remove']) && isset($_REQUEST['element_id']))
	{
		$element_id = $_REQUEST['element_id'];

		if (isset($_COOKIE['basket_elements']))
		{
			$basket = rtrim($_COOKIE['basket_elements'], ',');
			$basket_array = explode(',', $basket);

			$obj = '';
			foreach ($basket_array as $b_key => $b_value)
			{
				$b_value_array = explode('x', $b_value);
				$val_id = $b_value_array[0];
				$val_quantity = $b_value_array[1];

				if ( $val_id == $element_id )
					continue;

				$obj .= $val_id . 'x' . $val_quantity . ',';
			}

			setcookie('basket_elements', $obj, time()+36000000, '/');
			header("Location: /ajax/basket.php");

		}
	}
}

$check_remove_action = removeFromBasket();

function allElements()
{
	if (isset($_COOKIE['basket_elements']))
	{
		$all_elements = array();
		$basket = rtrim($_COOKIE['basket_elements'], ',');
		$basket_array = explode(',', $basket);
		foreach ($basket_array as $b_key => $b_value)
		{
			$b_value_array = explode('x', $b_value);
			$val_id = $b_value_array[0];
			$val_quantity = $b_value_array[1];
			$all_elements[] = array('element_id' => $val_id, 'quantity' => $val_quantity);
		}
		return $all_elements;
	}
	return array();
}

?>

<div class="basket_display">
	<? if ( $element_cookie_data ) { ?>

		<?
		$element_id = $_REQUEST['element_id'];

		$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "PROPERTY_PRICE");
		$arFilter = Array("IBLOCK_ID" => "1", "ID" => $element_id, "ACTIVE"=>"Y");
		$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
		while($arFields = $res->Fetch())
		{
			?>
			<div class="basket_addedd clear_fix">
				<h3>Товар добавлен в корзину</h3>
				<div class="col_5 col_4_w980 col_8_w640">
					<img src="<?=CFile::GetPath($arFields['PREVIEW_PICTURE']);?>" class="basket_addedd_img" alt=""/>
					<div class="basket_addedd_name"><?=$arFields['NAME'];?></div>
					<div class="text_center">
						<div class="catalog_table_item_price"><?=$arFields['PROPERTY_PRICE_VALUE']?></div>
						<div class="basket_addedd_quality"> x <?=$element_cookie_data['quantity']?> шт.</div>
					</div>
				</div>
				<div class="col_3 col_4_w980 col_8_w640 col_pad20">
					<a onclick="$.fancybox.close()" class="button col_8 col_4_w640 text_center button_line"><i class="fa fa-arrow-left"></i> Продолжить покупки</a>
					<a class="button col_8 col_4_w640 text_center" onclick="return orderBasket();"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
				</div>
			</div>
		<?
		}
		?>
	<? } ?>
	<div class="basket">
		<?
		if ($element_cookie_data)
			$all_elements = $element_cookie_data['all_elements'];
		else
			$all_elements = allElements();
		?>
		<h3>В корзине товаров: <?=count($all_elements);?></h3>
		<?
		if ( count($all_elements) > 0 )
		{
			$ids = array();
			foreach ($all_elements as $iter_key => $iter_value)
			{
				$ids[] = $iter_value['element_id'];
			}
			global $basketFilter;
			$basketFilter = array('ID' => $ids);

			?>
			<?$APPLICATION->IncludeComponent("bitrix:news.list", "basket_content", Array(
			"ALL_ELEMENTS" => $all_elements,
			"IBLOCK_TYPE" => "general",	// Тип информационного блока (используется только для проверки)
			"IBLOCK_ID" => "1",	// Код информационного блока
			"NEWS_COUNT" => "100",	// Количество новостей на странице
			"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
			"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
			"SORT_BY2" => "ID",	// Поле для второй сортировки новостей
			"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
			"FILTER_NAME" => "basketFilter",	// Фильтр
			"FIELD_CODE" => array(	// Поля
				0 => "DETAIL_TEXT",
				1 => "DETAIL_PICTURE",
				2 => "",
			),
			"PROPERTY_CODE" => array(	// Свойства
				0 => "PRICE",
				1 => "",
			),
			"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
			"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
			"AJAX_MODE" => "N",	// Включить режим AJAX
			"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
			"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
			"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
			"CACHE_TYPE" => "N",	// Тип кеширования
			"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
			"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
			"CACHE_GROUPS" => "Y",	// Учитывать права доступа
			"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
			"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
			"SET_STATUS_404" => "N",	// Устанавливать статус 404, если не найдены элемент или раздел
			"SET_TITLE" => "N",	// Устанавливать заголовок страницы
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
			"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
			"PARENT_SECTION" => "",	// ID раздела
			"PARENT_SECTION_CODE" => "",	// Код раздела
			"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
			"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
			"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
			"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
			"PAGER_TITLE" => "Новости",	// Название категорий
			"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
			"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
			"PAGER_SHOW_ALL" => "Y",	// Показывать ссылку "Все"
			"DISPLAY_DATE" => "Y",	// Выводить дату элемента
			"DISPLAY_NAME" => "Y",	// Выводить название элемента
			"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
			"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
			"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
			),
			false
		);?>
		<?
		}
		?>

		<? if ( !isset($_REQUEST['add']) && count($all_elements) ) { ?>
			<div class="col_3 col_4_w980 col_8_w640 col_pad20">
				<br /><a class="button col_8 col_4_w640 text_center" onclick="return orderBasket();"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
			</div>
		<? } ?>

	</div>
</div>