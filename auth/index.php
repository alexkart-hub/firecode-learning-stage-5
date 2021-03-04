<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
define("NEED_AUTH",true);
if (isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"])>0)
	LocalRedirect($backurl);
$APPLICATION->SetTitle("Авторизация");
$APPLICATION->AddChainItem($APPLICATION->GetTitle());
?><section class="content_page">
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
 <br>
			 <?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"shop_auth",
	Array(
		"FORGOT_PASSWORD_URL" => "/auth/forgot.php",
		"PROFILE_URL" => "/personal/",
		"REGISTER_URL" => "/auth/registration.php",
		"SHOW_ERRORS" => "Y"
	)
);?><br>
			<?$APPLICATION->IncludeComponent("bitrix:system.auth.confirmation", "shop_confirmation", Array(
	"CONFIRM_CODE" => "confirm_code",	// Название переменной, в которой передается код подтверждения
		"LOGIN" => "login",	// Название переменной, в которой передается логин пользователя
		"USER_ID" => "confirm_user_id",	// Название переменной, в которой передается ID пользователя
	),
	false
);?><br>
			<br>
			<br>
			<br>
		</div>
	</div>
</div>
 </section> <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>