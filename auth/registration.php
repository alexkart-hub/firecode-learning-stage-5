<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
define("NEED_AUTH",true);
$APPLICATION->SetPageProperty("TITLE", "Регистрация");
$APPLICATION->SetTitle("Регистрация");
$APPLICATION->AddChainItem($APPLICATION->GetTitle());
?>
<section class="content_page">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<?$APPLICATION->IncludeComponent(
					"bitrix:menu",
					"auth_left",
					Array(
						"ALLOW_MULTI_SELECT" => "N",
						"CHILD_MENU_TYPE" => "left",
						"DELAY" => "N",
						"MAX_LEVEL" => "1",
						"MENU_CACHE_GET_VARS" => array(""),
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_TYPE" => "N",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"ROOT_MENU_TYPE" => "left",
						"USE_EXT" => "N"
					)
				);?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.register",
					"shop_reg",
					Array(
						"AUTH" => "Y",
						"REQUIRED_FIELDS" => array("EMAIL", "PERSONAL_PHONE"),
						"SET_TITLE" => "Y",
						"SHOW_FIELDS" => array("EMAIL", "NAME", "LAST_NAME", "PERSONAL_PHONE"),
						"SUCCESS_PAGE" => "/personal/",
						"USER_PROPERTY" => array(),
						"USER_PROPERTY_NAME" => "",
						"USE_BACKURL" => "Y"
					)
				);?>
				<?/*
				<?$APPLICATION->IncludeComponent(
					"bitrix:system.auth.registration",
					"shop_reg",
					Array(
					)
				);?>
				*/?>
			</div>
		</div>
	</div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>