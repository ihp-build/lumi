<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/catalog/([a-zA-Z0-9/_-]*)/([a-zA-Z0-9_-]*)/\??(.*)#",
		"RULE" => "CODE=\$2&\$3",
		"ID" => "",
		"PATH" => "/catalog/detail.php",
	),
);

?>