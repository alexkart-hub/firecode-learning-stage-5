<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

ShowMessage($arParams["~AUTH_RESULT"]);
?>
<?if($USER->IsAuthorized()):?>
	<label for="#"><?echo GetMessage("MAIN_REGISTER_AUTH")?></label>
<?else:?>
	<form class="reg_wrapper" name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
		<div class="head_h1">Восстановление пароля</div>
		<?if (strlen($arResult["BACKURL"]) > 0):?>
			<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?endif;?>

		<input type="hidden" name="AUTH_FORM" value="Y">
		<input type="hidden" name="TYPE" value="SEND_PWD">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<label for="#"><?=GetMessage("sys_forgot_pass_login1")?></label>
				<input type="text" name="USER_LOGIN" value="<?=$arResult["USER_EMAIL"]?>" class="input_site input_site_dark">
				<input type="hidden" name="USER_EMAIL" />
				<input type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" class="btn_site btn_transparent btn_forgot" />
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="forgot_text"><?echo GetMessage("sys_forgot_pass_label")?></div>
			</div>
			<?if($arResult["PHONE_REGISTRATION"]):?>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<label for=""><?=GetMessage("sys_forgot_pass_phone")?></label>
					<input type="text" name="USER_PHONE_NUMBER" value=""  class="input_site phone input_site_dark">
					<?echo GetMessage("sys_forgot_pass_note_phone")?>
				</div>
			<?endif;?>
			<?if($arResult["USE_CAPTCHA"]):?>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
					<label for=""><?echo GetMessage("system_auth_captcha")?></label>
					<input type="text" name="captcha_word" maxlength="50" value="" class="input_site input_site_dark">
				</div>
			<?endif?>
		</div>
	</form>
<?endif;?>

<script type="text/javascript">
	document.bform.onsubmit = function(){document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;};
	document.bform.USER_LOGIN.focus();
</script>
