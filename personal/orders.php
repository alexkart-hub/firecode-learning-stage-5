<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Заказы");
$APPLICATION->SetTitle("Заказы");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:sale.personal.order",
	"",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CUSTOM_SELECT_PROPS" => array(""),
		"DETAIL_HIDE_USER_INFO" => array("0"),
		"DISALLOW_CANCEL" => "N",
		"HISTORIC_STATUSES" => array("F"),
		"NAV_TEMPLATE" => "",
		"ORDERS_PER_PAGE" => "20",
		"ORDER_DEFAULT_SORT" => "DATE_INSERT",
		"PATH_TO_BASKET" => "/personal/basket.php",
		"PATH_TO_CATALOG" => "/catalog/",
		"PATH_TO_PAYMENT" => "/personal/order/payment/",
		"REFRESH_PRICES" => "N",
		"RESTRICT_CHANGE_PAYSYSTEM" => array("F"),
		"SAVE_IN_SESSION" => "Y",
		"SEF_FOLDER" => "/personal/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => Array("cancel"=>"cancel/#ID#","detail"=>"order/detail/#ID#","list"=>"/personal/orders.php"),
		"SET_TITLE" => "Y",
		"STATUS_COLOR_F" => "gray",
		"STATUS_COLOR_N" => "green",
		"STATUS_COLOR_PSEUDO_CANCELLED" => "red"
	)
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>