<?
global $USER;
if($USER->IsAuthorized()) {
    $authName = "Выход";
}else{
    $authName = "Вход";
}
$aMenuLinks = Array(
	Array(
		"Каталог", 
		"/catalog/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Услуги", 
		"/services/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Блог", 
		"/articles/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Доставка", 
		"/delivery/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Оплата", 
		"/payment/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
        $authName,
		"/auth",
		Array(),
		Array(),
		""
	)
);
?>