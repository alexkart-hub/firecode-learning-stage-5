<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 text-center-xs">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/local/templates/shop/footer_inc_1.php"
					)
				);?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/local/templates/shop/footer_inc_2.php"
					)
				);?>
				<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"partners",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "DETAIL_PICTURE",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "contractors",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "6",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Партнеры",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "site",
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
		"COMPONENT_TEMPLATE" => "partners"
	),
	false
);?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/local/templates/shop/footer_inc_3.php"
					)
				);?>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/local/templates/shop/footer_inc_4.php"
					)
				);?>
				<address>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/local/templates/shop/footer_inc_5.php"
								)
							);?>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/local/templates/shop/footer_inc_6.php"
								)
							);?>
						</div>
						<div class="hidden-xs col-sm-12 col-md-12 col-lg-12">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/local/templates/shop/footer_inc_7.php"
								)
							);?>
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/local/templates/shop/footer_inc_8.php"
								)
							);?>
						</div>
					</div>
				</address>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/local/templates/shop/footer_inc_9.php"
					)
				);?>
				<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"left_footer",
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "footer",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "left_footer"
	),
	false
);?>
				<div class="soc">
					<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/local/templates/shop/footer_inc_10.php"
					)
				);?>
				</div>
				<div class="developers hidden-sm hidden-md hidden-lg">
					Создание сайта: <a rel="nofollow" target="_blank" title="Создание сайтов" href="https://eurosites.ru/">EUROSITES.RU</a>
				</div>
			</div>
		</div>
	</div>
</footer>

<div class="bg_page_site"></div>
<div class="forma_callback">
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.feedback",
        "shop_feedback_form_main_page",
        array(
            "EMAIL_TO" => COption::GetOptionString("main", "email_from"),
            "EVENT_MESSAGE_ID" => array(
                0 => getEventIdBySubject("#SITE_NAME#: Запись на установку","FEEDBACK_FORM"),
            ),
            "OK_TEXT" => "Спасибо, ваше сообщение принято.",
            "REQUIRED_FIELDS" => array(
                0 => "NAME",
                1 => "PHONE",
            ),
            "USE_CAPTCHA" => "N",
            "COMPONENT_TEMPLATE" => "shop_feedback_form_main_page"
        ),
        false
    );?>

    <div class="close_forma_callback"></div>
</div>

<div class="menu-icon_wrapper hidden-sm hidden-md hidden-lg">
	<div class="menu-icon">
		<span></span>
	</div>
</div>
<div class="box_nav_mob type_devel">
	<div class="nav_mob">
	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"",
		Array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc",
			"EDIT_TEMPLATE" => "",
			"PATH" => "/local/templates/shop/footer_inc_11.php"
		)
	);?>


		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => "/local/templates/shop/footer_inc_search.php"
			)
		);?>
		<?$APPLICATION->IncludeComponent(
					"bitrix:menu",
					"mobile",
					array(
						"ALLOW_MULTI_SELECT" => "N",
						"CHILD_MENU_TYPE" => "left",
						"DELAY" => "N",
						"MAX_LEVEL" => "1",
						"MENU_CACHE_GET_VARS" => array(
						),
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_TYPE" => "N",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"ROOT_MENU_TYPE" => "mobile",
						"USE_EXT" => "N"
					),
					false
				);?>
		<div class="info">
		<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/local/templates/shop/footer_inc_12.php"
					)
				);?>
		</div>
		<span class="close_box_nav_mob"></span>
	</div>
</div>

</div>

<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/fancybox/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/numbered.js"></script>
<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/slick.min.js"></script>
<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH ?>/js/script.js"></script>
</body>

</html>