<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Корзина");
$APPLICATION->SetTitle("Корзина");
?>

<?
	echo "<pre>";
	if (isset($_COOKIE['cart_elements']))
	{
		$json_rs = (array)json_decode($_COOKIE['cart_elements']);
		
		foreach ($json_rs as $key => $value)
		{
			$val = (array)$value;
			print_r($val);
		}
	}
	echo "</pre>";
?>

<h3>Ваша корзина пуста</h3>

<p>

<a href="/ajax/addToCart.php?add&element_id=1">Добавить товар ID 1 в корзину</a>

</p>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>