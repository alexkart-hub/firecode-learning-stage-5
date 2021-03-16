<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.order.ajax", 
	".default", 
	array(
		"ACTION_VARIABLE" => "soa-action",
		"ADDITIONAL_PICT_PROP_17" => "-",
		"ALLOW_APPEND_ORDER" => "Y",
		"ALLOW_AUTO_REGISTER" => "N",
		"ALLOW_NEW_PROFILE" => "N",
		"ALLOW_USER_PROFILES" => "N",
		"BASKET_IMAGES_SCALING" => "adaptive",
		"BASKET_POSITION" => "before",
		"COMPATIBLE_MODE" => "Y",
		"DELIVERIES_PER_PAGE" => "9",
		"DELIVERY_FADE_EXTRA_SERVICES" => "N",
		"DELIVERY_NO_AJAX" => "N",
		"DELIVERY_NO_SESSION" => "Y",
		"DELIVERY_TO_PAYSYSTEM" => "d2p",
		"DISABLE_BASKET_REDIRECT" => "Y",
		"EMPTY_BASKET_HINT_PATH" => "/catalog/",
		"HIDE_ORDER_DESCRIPTION" => "N",
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
		"PATH_TO_AUTH" => "/auth/",
		"PATH_TO_BASKET" => "/personal/basket.php",
		"PATH_TO_PAYMENT" => "payment.php",
		"PATH_TO_PERSONAL" => "/personal/",
		"PAY_FROM_ACCOUNT" => "N",
		"PAY_SYSTEMS_PER_PAGE" => "9",
		"PICKUPS_PER_PAGE" => "5",
		"PICKUP_MAP_TYPE" => "yandex",
		"PRODUCT_COLUMNS_HIDDEN" => array(
			0 => "PREVIEW_PICTURE",
			1 => "PRICE_FORMATED",
		),
		"PRODUCT_COLUMNS_VISIBLE" => array(
			0 => "DETAIL_PICTURE",
			1 => "PRICE_FORMATED",
			2 => "PROPERTY_artikle",
		),
		"SEND_NEW_USER_NOTIFY" => "Y",
		"SERVICES_IMAGES_SCALING" => "adaptive",
		"SET_TITLE" => "N",
		"SHOW_BASKET_HEADERS" => "N",
		"SHOW_COUPONS" => "Y",
		"SHOW_COUPONS_BASKET" => "Y",
		"SHOW_COUPONS_DELIVERY" => "Y",
		"SHOW_COUPONS_PAY_SYSTEM" => "Y",
		"SHOW_DELIVERY_INFO_NAME" => "Y",
		"SHOW_DELIVERY_LIST_NAMES" => "Y",
		"SHOW_DELIVERY_PARENT_NAMES" => "N",
		"SHOW_MAP_IN_PROPS" => "N",
		"SHOW_NEAREST_PICKUP" => "N",
		"SHOW_NOT_CALCULATED_DELIVERIES" => "L",
		"SHOW_ORDER_BUTTON" => "always",
		"SHOW_PAY_SYSTEM_INFO_NAME" => "Y",
		"SHOW_PAY_SYSTEM_LIST_NAMES" => "Y",
		"SHOW_PICKUP_MAP" => "Y",
		"SHOW_STORES_IMAGES" => "N",
		"SHOW_TOTAL_ORDER_BUTTON" => "Y",
		"SHOW_VAT_PRICE" => "N",
		"SKIP_USELESS_BLOCK" => "N",
		"SPOT_LOCATION_BY_GEOIP" => "Y",
		"TEMPLATE_LOCATION" => "popup",
		"TEMPLATE_THEME" => "red",
		"USER_CONSENT" => "Y",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_CUSTOM_ADDITIONAL_MESSAGES" => "N",
		"USE_CUSTOM_ERROR_MESSAGES" => "N",
		"USE_CUSTOM_MAIN_MESSAGES" => "N",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_PHONE_NORMALIZATION" => "Y",
		"USE_PRELOAD" => "Y",
		"USE_PREPAYMENT" => "N",
		"USE_YM_GOALS" => "N",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>