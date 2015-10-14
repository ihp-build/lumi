<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?if(isset($_REQUEST['isorder'])){?>

	<div class="basket_display">
	<h3>Спасибо</h3>
	наши специалисты свяжутся с вами
	</div>

<?return;}?>

<div class="basket_display">
	<form action="/ajax/order.php?isorder" method="post" onsubmit="return ajaxFormTry($(this))">
		<input type="text" class="required" name="uname" placeholder="Имя"/>
		<input type="text" class="required_mail" name="umail" placeholder="e-mail"/>
		<input type="text" class="required_phone" name="uphone" placeholder="Телефон"/>
		<input type="submit" value="Отправить"/>
	</form>
</div>

