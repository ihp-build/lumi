<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?

CModule::IncludeModule("iblock");

?>

<?if(isset($_REQUEST['request_performed'])){?>

	<?

	$user_name = $_POST['uname'];
	$user_email = $_POST['umail'];
	$user_phone = $_POST['uphone'];
	$user_message = $_POST['umessage'];
	$content = "Имя: " . $user_name . "\n"
				. "E-Mail: " . $user_email . "\n"
				. "Телефон: " . $user_phone . "\n\n"
				. "Сообщение: \n\n" . $user_message . "\n\n";

	$el = new CIBlockElement;
	$arLoad = Array(
		"IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
		"IBLOCK_ID"      => 4, // Консультации
		
		"NAME"           => "Запрос (".$user_email.") ".date('Y.m.d H:i:s'),
		"ACTIVE"         => "Y",            // активен
		"PREVIEW_TEXT"   => $content,
	);
	$el->Add($arLoad);


	// Отправка сообщения менеджеру
	$arMailPattern = array(
		"EMAIL_TO" => "voinovas@kavminkr.ru",
		"BCC" => "",
		"TEXT" => $content,
	);
	CEvent::Send("CONSULT_REQUEST", "s1", $arMailPattern, "N", "10");

	?>

	<div class="notify">
		<div class="form_opened_head">Спасибо, сообщение отправлено</div>
		<div class="form_opened_head">Наши специалисты свяжутся с вами</div>
	</div>
<?return;}?>

<div class="notify">
	<form class="form_opened" action="/ajax/consultRequest.php?request_performed" method="post" onsubmit="return ajaxFormTry($(this))">
		<div class="form_opened_head">Консультация специалиста</div>

		<input type="text" class="required" name="uname" placeholder="Имя"/>
		<input type="text" class="required_mail" name="umail" placeholder="e-mail"/>
		<input type="text" class="required_phone" name="uphone" placeholder="Телефон"/>
		<textarea name="umessage" class="required" placeholder="Сообщение"></textarea>
		<input type="submit" value="Отправить"/>
	</form>
</div>