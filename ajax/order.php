<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?

CModule::IncludeModule("iblock");


function getCookieElements()
{
	if (isset($_COOKIE['basket_elements']))
	{
		$elements = array();

		$basket = rtrim($_COOKIE['basket_elements'], ',');
		$basket_array = explode(',', $basket);

		foreach ($basket_array as $b_key => $b_value)
		{
			$b_value_array = explode('x', $b_value);
			$val_id = $b_value_array[0];
			$val_quantity = $b_value_array[1];

			$elements[$val_id] = $val_quantity;
		}
		return $elements;
	}
	return array();
}

$elements = getCookieElements();

?>

<?if(isset($_REQUEST['isorder'])){?>

	<?if ($elements)
	{


		$user_name = $_POST['uname'];
		$user_email = $_POST['umail'];
		$user_phone = $_POST['uphone'];


		$mail_pattern_user_content = "Имя: " . $user_name . "\n"
									. "E-Mail: " . $user_email . "\n"
									. "Телефон: " . $user_phone . "\n"
									. "\n\nВыбранные товары:\n\n==========\n\n";
		$mail_pattern_manager_content = "Имя: " . $user_name . "\n"
									. "E-Mail: " . $user_email . "\n"
									. "Телефон: " . $user_phone . "\n"
									. "\n\nВыбранные товары:\n\n==========\n\n";


		$ids = array();
		foreach ($elements as $iter_key => $iter_value)
			$ids[] = $iter_key;

		$total_price = 0;
		$arSelect = Array("ID", "NAME", "PREVIEW_PICTURE", "PROPERTY_PRICE");
		$arFilter = Array("IBLOCK_ID" => "1", "ID" => $ids, "ACTIVE"=>"Y");
		$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
		while($arFields = $res->Fetch())
		{
			$id = $arFields['ID'];
			$name = $arFields['NAME'];
			$price = $arFields['PROPERTY_PRICE_VALUE'];
			$quantity = $elements[$id];
			$total_price_element = intval($price) * intval($quantity);

			$total_price += $total_price_element;

			$mail_pattern_user_content .= "Товар: " . $name . "\n"
										. "Цена единицы товара: " . $price . "\n"
										. "Количество: " . $quantity . "\n"
										. "Стоимость: " . $total_price_element . "\n"
										. "\n==========\n\n";
			$mail_pattern_manager_content .= "Товар: " . $name . "\n"
										. "ID товара на сайте: " . $id . "\n"
										. "Цена единицы товара: " . $price . "\n"
										. "Количество: " . $quantity . "\n"
										. "Стоимость: " . $total_price_element . "\n"
										. "\n==========\n\n";
		}

		$mail_pattern_user_content .= "Общая стоимость:  " . $total_price . "\n\n";
		$mail_pattern_manager_content .= "Общая стоимость:  " . $total_price . "\n\n";



		$el = new CIBlockElement;
		$arLoad = Array(
			"IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
			"IBLOCK_ID"      => 3, // Заказы
			
			"NAME"           => "Заказ (".$user_email.") ".date('Y.m.d H:i:s'),
			"ACTIVE"         => "Y",            // активен
			"PREVIEW_TEXT"   => $mail_pattern_user_content,
		);
		$el->Add($arLoad);



		//Отправка менеджеру
		$arMailPattern = array(
			"EMAIL_TO" => "voinovas@kavminkr.ru, kmvres@kavminkr.ru",
			"BCC" => "",
			"TEXT" => $mail_pattern_manager_content,
		);
		CEvent::Send("CUSTOM_ORDER", "s1", $arMailPattern, "N", "8");

		//Отправка пользователю
		$arMailPattern = array(
			"EMAIL_TO" => $user_email,
			"BCC" => "",
			"TEXT" => $mail_pattern_user_content,
		);
		CEvent::Send("CUSTOM_ORDER", "s1", $arMailPattern, "N", "9");

		// Очистка корзины
		setcookie('basket_elements', '', 1, '/');

		?>

		<div class="notify">
			<div class="form_opened_head">Спасибо</div>
			<div class="form_opened_head">Наши специалисты свяжутся с вами</div>
		</div>

	<?}?>

<?return;}?>

<div class="notify">
	<form class="form_opened" action="/ajax/order.php?isorder" method="post" onsubmit="return ajaxFormTry($(this))">
		<div class="form_opened_head">Оформление заказа</div>

		<input type="text" class="required" name="uname" placeholder="Имя"/>
		<input type="text" class="required_mail" name="umail" placeholder="e-mail"/>
		<input type="text" class="required_phone" name="uphone" placeholder="Телефон"/>
		<input type="submit" value="Отправить"/>
	</form>
</div>

