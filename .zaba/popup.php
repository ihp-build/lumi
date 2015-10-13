<?
if($_POST['data']){
	?>
		<div class="popupform">
			<?/*
			print_r($_POST['data']);

			0 - value
			1 - placeholder
			*/?>
			<h2>Спасибо, <?=$_POST['data']['name'][0]?>!</h2>
			мы обязательно ответим на ваш вопрос.
		</div>
	<?
}else{
	?>
		<div class="popupform">
			<h2>Задать вопрос</h2>
			<form onsubmit="function(){ajaxFormTry($(this));return false;}" class="ajaxFormSend" method="post" action="/add_qwestion.php">
				<input class="submited" name="title" type="hidden"  placeholder="Заголовок" value="Задать вопрос"/>
				Имя:
				<input class="submited required" name="name" type="text" placeholder="Имя"/>
				e-mail:
				<input class="submited required_mail" name="email" type="text" placeholder="e-mail"/>
				Телефон:
				<input class="submited required_phone" name="phone" type="text" placeholder="телефон"/>
				Вопрос:
				<textarea class="submited required" name="value" placeholder="Вопрос"></textarea>
				<input class="butt" type="submit"/>
			</form>
		</div>
	<?
}
?>