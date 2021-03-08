<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
if(isset($_REQUEST['logout']) && $_REQUEST['logout'] == 'yes'){
    global $USER;
    $USER->Logout();
    header("location: /auth");
    die;
}
?>

<div class="bx-system-auth-form">
	<?if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR']):?>
		<?ShowMessage($arResult['ERROR_MESSAGE']);?>
	<?endif;?>
	<?if($arResult["FORM_TYPE"] == "login"):?>
		<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class="reg_wrapper">
			<div class="reg_step reg_step_1">
				<div class="head_h1">Авторизация</div>
				<div class="row">

					<?if($arResult["BACKURL"] <> ''):?>
						<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
					<?endif?>
					<?foreach ($arResult["POST"] as $key => $value):?>
						<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
					<?endforeach?>
					<input type="hidden" name="AUTH_FORM" value="Y" />
					<input type="hidden" name="TYPE" value="AUTH" />

					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<label for="#"><?=GetMessage("AUTH_LOGIN")?></label>
						<input class="input_site input_site_dark" type="text" name="USER_LOGIN" />
					</div>
					<script>
						BX.ready(function() {
							var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
							if (loginCookie)
							{
								var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
								var loginInput = form.elements["USER_LOGIN"];
								loginInput.value = loginCookie;
							}
						});
					</script>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<label for="#"><?=GetMessage("AUTH_PASSWORD")?></label>
						<input class="input_site input_site_dark" type="password" name="USER_PASSWORD" autocomplete="off" />
					</div>
					<?if($arResult["SECURE_AUTH"]):?>
						<span class="bx-auth-secure" id="bx_auth_secure<?=$arResult["RND"]?>" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
							<div class="bx-auth-secure-icon"></div>
						</span>
						<noscript>
							<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
								<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
							</span>
						</noscript>
						<script type="text/javascript">
							document.getElementById('bx_auth_secure<?=$arResult["RND"]?>').style.display = 'inline-block';
						</script>
					<?endif?>
					<?if ($arResult["STORE_PASSWORD"] == "Y"):?>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<label class='label_wrapper' for="USER_REMEMBER_frm" title="<?=GetMessage("AUTH_REMEMBER_ME")?>">
								<input type="checkbox" class="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y" />
								<span class='checkbox-custom'></span>
								<span class='label_text'><?echo GetMessage("AUTH_REMEMBER_SHORT")?></span>
							</label>
						</div>
					<?endif?>
					<?if ($arResult["CAPTCHA_CODE"]):?>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<label for="#"><?echo GetMessage("AUTH_CAPTCHA_PROMT")?></label><br><br>
							<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
							<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
							<input class="input_site input_site_dark" type="text" name="captcha_word" maxlength="50" value="" />
						</div>
					<?endif?>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<input type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>"  class="btn_site btn_transparent" />
					</div>
					<?if($arResult["AUTH_SERVICES"]):?>
						<div class="bx-auth-lbl"><?=GetMessage("socserv_as_user_form")?></div>
						<?$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "icons",
							array(
								"AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
								"SUFFIX"=>"form",
							),
							$component,
							array("HIDE_ICONS"=>"Y")
						);?>
					<?endif?>
				</div>
			</div>
		</form>
		<?if($arResult["AUTH_SERVICES"]):?>
			<?$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
				array(
					"AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
					"AUTH_URL"=>$arResult["AUTH_URL"],
					"POST"=>$arResult["POST"],
					"POPUP"=>"Y",
					"SUFFIX"=>"form",
				),
				$component,
				array("HIDE_ICONS"=>"Y")
			);?>
		<?endif?>
	<?elseif($arResult["FORM_TYPE"] == "otp"):?>
		<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
			<?if($arResult["BACKURL"] <> ''):?>
				<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
			<?endif?>
			<input type="hidden" name="AUTH_FORM" value="Y" />
			<input type="hidden" name="TYPE" value="OTP" />
			<table width="95%">
				<tr>
					<td colspan="2">
					<?echo GetMessage("auth_form_comp_otp")?><br />
					<input type="text" name="USER_OTP" maxlength="50" value="" size="17" autocomplete="off" /></td>
				</tr>
				<?if ($arResult["CAPTCHA_CODE"]):?>
				<tr>
					<td colspan="2">
					<?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:<br />
					<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
					<input type="text" name="captcha_word" maxlength="50" value="" /></td>
				</tr>
				<?endif?>
				<?if ($arResult["REMEMBER_OTP"] == "Y"):?>
				<tr>
					<td valign="top"><input type="checkbox" id="OTP_REMEMBER_frm" name="OTP_REMEMBER" value="Y" /></td>
					<td width="100%"><label for="OTP_REMEMBER_frm" title="<?echo GetMessage("auth_form_comp_otp_remember_title")?>"><?echo GetMessage("auth_form_comp_otp_remember")?></label></td>
				</tr>
				<?endif?>
				<tr>
					<td colspan="2"><input type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" /></td>
				</tr>
				<tr>
					<td colspan="2"><noindex><a href="<?=$arResult["AUTH_LOGIN_URL"]?>" rel="nofollow"><?echo GetMessage("auth_form_comp_auth")?></a></noindex><br /></td>
				</tr>
			</table>
		</form>
	<?else:?>
		<form action="<?=$arResult["AUTH_URL"]?>" class="reg_wrapper">
			<div class="reg_step reg_step_1">
				<div class="head_h1">Вы авторизованы</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<label for="#"><?=$arResult["USER_NAME"]?><br />
						[<?=$arResult["USER_LOGIN"]?>]</label><br />
						<label for="#"><a href="/personal/" title="<?=GetMessage("AUTH_PROFILE")?>"><?=GetMessage("AUTH_PROFILE")?></a></label><br />
						<?foreach ($arResult["GET"] as $key => $value):?>
							<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
						<?endforeach?>
						<input type="hidden" name="logout" value="yes" />
						<input type="submit" name="logout_butt" value="<?=GetMessage("AUTH_LOGOUT_BUTTON")?>"class="btn_site btn_transparent" />
					</div>
				</div>
			</div>
		</form>
	<?endif?>
</div>
