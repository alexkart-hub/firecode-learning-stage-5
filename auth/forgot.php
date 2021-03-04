<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Восстановление пароля");
$APPLICATION->SetTitle("Восстановление пароля");
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
				<?$APPLICATION->IncludeComponent("bitrix:system.auth.forgotpasswd", "shop_forgot", Array(
	"AUTH_AUTH_URL" => "/auth/",
		"AUTH_REGISTER_URL" => "/auth/registration.php",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
			</div>
		</div>
	</div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>