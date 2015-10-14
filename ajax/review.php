<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

<?
if(isset($_REQUEST['submit'])){?>
<div class="col_pad20">
	<div class="notify">
		<h2>Спасибо,</h2>
		<div>ваш отзыв появится после модерации</div>
	</div>
</div>

<?
	return;
}
?>
<div class="col_pad20">
	<div class="notify">
		<form class="form_opened" action="/ajax/review.php?submit" method="post" onsubmit="return ajaxFormTry($(this))">
			<div class="form_opened_head">Оствить отзыв</div>
		</div>
			<input type="text" class="required" name="uname" placeholder="Имя"/>
			<input type="text" class="required_mail" name="umail" placeholder="e-mail"/>
			<textarea name="umessage" class="required" placeholder="Отзыв"></textarea>		
			<input type="submit" class="button button_line" value="Отправить"/>
		</form>
	</div>
</div>
