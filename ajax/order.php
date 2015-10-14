<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?if(isset($_REQUEST['isorder'])){?>
	<pre>
	<?print_r($_REQUEST)?>
	</pre>
<?return;}?>

<div class="basket_display">
	<form action="/ajax/order.php?isorder" method="post" onsubmit="return ajaxFormTry($(this))">
		<input type="text" class="required" name="uname" placeholder="Имя"/>
		<input type="text" class="required_mail" name="umail" placeholder="e-mail"/>
		<input type="text" class="required_phone" name="uphone" placeholder="Телефон"/>
		<input type="submit" value="Отправить"/>
	</form>
</div>

