<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>


<section class="first_screen">
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"newsmain",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "/articles/#ELEMENT_CODE#/",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "DETAIL_TEXT",
			3 => "DETAIL_PICTURE",
			4 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => getIblockIdByCode('news_on_main'),
		"IBLOCK_TYPE" => "information",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "1",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "newsmain"
	),
	false
);?>


	<div class="under_first_screnn">
		<div class="container">
			<div class="row">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:catalog.section.list",
                    "show_on_main",
                    array(
                        "ADD_SECTIONS_CHAIN" => "N",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "COUNT_ELEMENTS" => "N",
                        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                        "FILTER_NAME" => "sectionsFilter",
                        "HIDE_SECTION_NAME" => "N",
                        "IBLOCK_ID" => getIblockIdByCode('catalog'),
                        "IBLOCK_TYPE" => "catalog",
                        "SECTION_CODE" => "",
                        "SECTION_FIELDS" => array(
                            0 => "PICTURE",
                            1 => "",
                        ),
                        "SECTION_ID" => $_REQUEST["SECTION_ID"],
                        "SECTION_URL" => "/catalog/#SECTION_CODE#/",
                        "SECTION_USER_FIELDS" => array(
                            0 => "UF_SHOW_ON_MAIN",
                            1 => "UF_PICTURE_ACTIVE",
                            2 => "",
                        ),
                        "SHOW_PARENT_NAME" => "Y",
                        "TOP_DEPTH" => "1",
                        "VIEW_MODE" => "TILE",
                        "COMPONENT_TEMPLATE" => "show_on_main"
                    ),
                    false
                );?>
			</div>
		</div>
	</div>
</section>

<section class="new_goods">
	<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.top", 
	"eight_goods_on_main", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_TO_BASKET_ACTION" => "BUY",
		"BASKET_URL" => "/personal/basket.php",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPATIBLE_MODE" => "Y",
		"COMPONENT_TEMPLATE" => "eight_goods_on_main",
		"CONVERT_CURRENCY" => "N",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"DETAIL_URL" => "/catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#",
		"DISPLAY_COMPARE" => "N",
		"ELEMENT_COUNT" => "8",
		"ELEMENT_SORT_FIELD" => "shows",
		"ELEMENT_SORT_FIELD2" => "shows",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "asc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "",
		"HIDE_NOT_AVAILABLE" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		"IBLOCK_ID" => getIblockIdByCode("catalog"),
		"IBLOCK_TYPE" => "catalog",
		"LABEL_PROP" => "",
		"LINE_ELEMENT_COUNT" => "4",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"OFFERS_LIMIT" => "8",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"PRICE_CODE" => array(
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"ROTATE_TIMER" => "30",
		"SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
		"SEF_MODE" => "Y",
		"SEF_RULE" => "/catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PAGINATION" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "Y",
		"VIEW_MODE" => "SECTION",
		"PROPERTY_CODE_MOBILE" => ""
	),
	false
);?>
</section>

<section class="articles">
	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"two_articles_on_main", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "/articles/#ELEMENT_CODE#/",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
			2 => "PREVIEW_PICTURE",
			3 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => getIblockIdByCode('articles'),
		"IBLOCK_TYPE" => "information",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "2",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "squears",
		"PAGER_TITLE" => "Статьи",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "two_articles_on_main"
	),
	false
);?>
</section>

<section class="sound">
	<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"show_single_and_four", 
	array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "show_single_and_four",
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"HIDE_SECTION_NAME" => "N",
		"IBLOCK_ID" => getIblockIdByCode('catalog'),
		"IBLOCK_TYPE" => "catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(
			0 => "NAME",
			1 => "DESCRIPTION",
			2 => "PICTURE",
			3 => "",
		),
		"SECTION_ID" => "6",
		"SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
		"SECTION_USER_FIELDS" => array(
			0 => "UF_SHOW_ON_MAIN",
			1 => "",
		),
		"SHOW_PARENT_NAME" => "Y",
		"SHOW_SECTION_COUNT" => "4",
		"TOP_DEPTH" => "1",
		"VIEW_MODE" => "TILE"
	),
	false
);?>
</section>


<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
