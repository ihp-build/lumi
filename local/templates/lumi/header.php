<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html" xml:lang="ru" lang="ru">
<head>

	<meta http-equiv="Content-Language" content="ru" />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<?$APPLICATION->ShowHead()?>
	<title><?$APPLICATION->ShowTitle()?></title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<script type="text/javascript" src="/.zaba/jquery_1_11_min.js"></script>


	<link rel="shortcut icon" href="/.zaba/favicon.ico">

	<link rel="stylesheet" href="/.zaba/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="/.zaba/fancybox/jquery.fancybox.js?v=2.1.5"></script>



	<link rel="stylesheet" href="/.zaba/jquery_ui/jquery-ui.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="/.zaba/jquery_ui/jquery-ui.structure.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="/.zaba/jquery_ui/jquery-ui.theme.min.css" type="text/css" media="screen" />
	<script type="text/javascript" src="/.zaba/jquery_ui/jquery-ui.min.js"></script>


	<?/*<script type="text/javascript" src="/.zaba/pagescroll.js"></script>*/?>
	<script type="text/javascript" src="/.zaba/jquery.mousewheel.js"></script>

	<script type="text/javascript" src="/.zaba/scripts.js"></script>
	<script type="text/javascript" src="/.zaba/itBe.js"></script>

	<link rel="stylesheet" href="/.zaba/style.css" type="text/css" />
	<?/*<link rel="stylesheet" href="/.zaba/framework.css" type="text/css" />*/?>
	<link rel="stylesheet" href="/.zaba/itbeframes.css" type="text/css" />
	<link rel="stylesheet" href="/.zaba/buttons.css" type="text/css" />


	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!-- <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script> -->

	<!-- {$(".nav a").mPageScroll2id();} -->
	<!-- .zoom, .grayscale, .clear_fix, .max_width, .footer, .content, .scrolled -->
	<!-- fancybox fancybox.ajax + ajaxFormSend -->
	<!-- $('.ajaxFormSend').submit(function(){ajaxFormTry($(this));return false;}); -->

	<?/*<script type="text/javascript" src="//s.bold.su/models/"></script>*/?>
	<link rel="stylesheet" href="//s.bold.su/fonts/?forum&notosans&dincyr" type="text/css" />
<?/*<script type="text/javascript" src="//s.bold.su/js/?smoothscroll"></script>*/?>


	<!-------------------------------------------------------------------------------------------->

	<link rel="stylesheet" href="/.include/styles.css" type="text/css" />
	<script type="text/javascript" src="/.include/scripts.js"></script>




</head>
<body>

<?$APPLICATION->ShowPanel();?>

<div class="header">
	<div class="max_width clear_fix">
		<div class="col_8 col_padlr_10">
			<a href="/" class="logo"></a>
			<div class="nav">
				<?$APPLICATION->IncludeComponent(
					"bitrix:menu", 
					"lumi_top_menu", 
					Array(
						"ROOT_MENU_TYPE"	=>	"top",
						"MAX_LEVEL"	=>	"1",
						"USE_EXT"	=>	"N",
						"MENU_CACHE_TYPE" => "A",
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_USE_GROUPS" => "N",
						"MENU_CACHE_GET_VARS" => Array()
					)
				);?>
			</div>
			<div class="nav_opener">
				<i class="fa fa-bars"></i>
			</div>
			<div class="right">
				<div class="centered_vertical text_right">
					<div class="header_per clear_fix">
						<a href="/zag.jpg" class="header_per_u fancybox">Вход/Регистрация</a>
						<a href="/zag.jpg" class="header_per_b fancybox">Корзина</a>
					</div>
					<div class="header_phone">
						<?$APPLICATION->IncludeFile(
							"/include/header_phone.php",
							Array(),
							Array("MODE"=>"text")
						);?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
