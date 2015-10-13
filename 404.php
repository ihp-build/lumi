<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Страница не найдена");
$APPLICATION->SetPageProperty("title", "404 Страница не найдена");

echo '<div class="main_prod">';
echo '<dvi class="max_width">';
echo "<style>.text_404_page {font-size: 1.6em; padding-top: 40px; padding-bottom: 40px;}</style>";
echo "<div class='centered text_404_page'>Страница не найдена, попробуйте начать <a href='/' title='Главная'>сначала</a></div>";
echo '</div></div>';
/*$APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
	"LEVEL"	=>	"3",
	"COL_NUM"	=>	"2",
	"SHOW_DESCRIPTION"	=>	"Y",
	"SET_TITLE"	=>	"Y",
	"CACHE_TIME"	=>	"3600"
	)
);*/

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>