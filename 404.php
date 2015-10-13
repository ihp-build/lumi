<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Страница не найдена");
$APPLICATION->SetPageProperty("title", "404 Страница не найдена");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
?>

<style>
.text_404_page {
	font-size: 1.6em;
	padding-bottom: 40px;
}
.text_404_page a {
	display: inline-block;
	vertical-align: top;
}
</style>

<div class="main_prod">
	<div class="max_width">
		
		<div class='text_404_page col_padlr_20 clear_fix'>
			Страница не найдена, попробуйте начать <a class='clear_fix' href='/' title='Главная'>сначала</a>
		</div>
	</div>
</div>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>