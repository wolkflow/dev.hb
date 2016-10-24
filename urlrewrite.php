<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/programs/(.+?)/#",
		"RULE" => "ELEMENT=\$1&",
		"ID" => "",
		"PATH" => "/programs/detail.php",
	),
    array(
		"CONDITION" => "#^/catalog/(.+?)/(.+?)/#",
		"RULE" => "SECTION=\$1&ELEMENT=\$2&",
		"ID" => "",
		"PATH" => "/catalog/detail.php",
	),
    array(
		"CONDITION" => "#^/catalog/(.+?)/#",
		"RULE" => "SECTION=\$1&",
		"ID" => "",
		"PATH" => "/catalog/index.php",
	),
);

?>