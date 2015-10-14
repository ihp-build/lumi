<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/catalog/([a-zA-Z0-9_-]*)/\??(.*)#",
		"RULE" => "CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/catalog/detail.php",
	),
);

?>