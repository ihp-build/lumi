<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Корзина");
$APPLICATION->SetTitle("Корзина");
?>

<h3>Ваша корзина пуста</h3>

<p>

<a href="/cart/?add&id=1">Добавить товар ID 1 в корзину</a>

</p>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>