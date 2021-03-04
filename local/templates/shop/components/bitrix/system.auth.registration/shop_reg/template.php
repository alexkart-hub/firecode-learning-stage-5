<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>
<?//print_r($arResult);?>
<? ShowMessage($arParams["~AUTH_RESULT"]); ?>
<?if($arResult["SHOW_EMAIL_SENT_CONFIRMATION"]):?>
	<p><?echo GetMessage("AUTH_EMAIL_SENT")?></p>
<?endif;?>
<?if(!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"] && $arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
	<p><?echo GetMessage("AUTH_EMAIL_WILL_BE_SENT")?></p>
<?endif?>
<noindex>
	<?if($USER->IsAuthorized()):?>
		<label for="#"><?echo GetMessage("MAIN_REGISTER_AUTH")?></label>
	<?else:?>
		<?if($arResult["SHOW_SMS_FIELD"] == true):?>
			<form class="reg_wrapper" method="post" action="<?=$arResult["AUTH_URL"]?>" name="regform">
				<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
							<span>*</span><?echo GetMessage("main_register_sms_code")?>
							<input class="input_site input_site_dark" size="30" type="text" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" />
							<input type="submit" name="code_submit_button" value="<?echo GetMessage("main_register_sms_send")?>" class="btn_site btn_transparent" />
			</form>
			<script>
				new BX.PhoneAuth({
					containerId: 'bx_register_resend',
					errorContainerId: 'bx_register_error',
					interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
					data:
						<?=CUtil::PhpToJSObject([
							'signedData' => $arResult["SIGNED_DATA"],
						])?>,
					onError:
						function(response)
						{
							var errorDiv = BX('bx_register_error');
							var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
							errorNode.innerHTML = '';
							for(var i = 0; i < response.errors.length; i++)
							{
								errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
							}
							errorDiv.style.display = '';
						}
				});
			</script>
			<div id="bx_register_error" style="display:none"><?ShowError("error")?></div>
			<div id="bx_register_resend"></div>
		<?elseif(!$arResult["SHOW_EMAIL_SENT_CONFIRMATION"]):?>
			<form class="reg_wrapper" method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform" enctype="multipart/form-data">
				<div class="reg_step reg_step_1">
					<div class="head_h1">Личные данные</div>
					<div class="row">
						<input type="hidden" name="AUTH_FORM" value="Y" />
						<input type="hidden" name="TYPE" value="REGISTRATION" />

						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<label for="#"><?=GetMessage("AUTH_LOGIN_MIN")?><span>*</span></label>
							<input class="input_site input_site_dark" type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>" class="bx-auth-input" />
						</div>

						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<label for="#"><?=GetMessage("AUTH_EMAIL")?><?if($arResult["EMAIL_REQUIRED"]):?><span>*</span><?endif?></label>
							<input class="input_site input_site_dark" type="text" name="USER_EMAIL" maxlength="255" value="<?=$arResult["USER_EMAIL"]?>" class="bx-auth-input" />
						</div>

						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<label for="#"><?=GetMessage("AUTH_PASSWORD_REQ")?><span>*</span></label>
							<input class="input_site input_site_dark" type="password" name="USER_PASSWORD" maxlength="255" value="<?=$arResult["USER_PASSWORD"]?>" class="bx-auth-input" autocomplete="off" />
						</div>
						<?if($arResult["SECURE_AUTH"]):?>
							<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
								<div class="bx-auth-secure-icon"></div>
							</span>
							<noscript>
							<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
								<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
							</span>
							</noscript>
							<script type="text/javascript">
							document.getElementById('bx_auth_secure').style.display = 'inline-block';
							</script>
						<?endif?>


						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<label for="#"><?=GetMessage("AUTH_CONFIRM")?><span>*</span></label>
							<input class="input_site input_site_dark" type="password" name="USER_CONFIRM_PASSWORD" maxlength="255" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="bx-auth-input" autocomplete="off" />
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<label for="#"><?=GetMessage("AUTH_NAME")?></label>
							<input class="input_site input_site_dark" type="text" name="USER_NAME" maxlength="50" value="<?=$arResult["USER_NAME"]?>" class="bx-auth-input" />
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<label for="#"><?=GetMessage("AUTH_LAST_NAME")?></label>
							<input class="input_site input_site_dark" type="text" name="USER_LAST_NAME" maxlength="50" value="<?=$arResult["USER_LAST_NAME"]?>" class="bx-auth-input" />
						</div>

						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<label for="#"><?echo GetMessage("main_register_phone_number")?><?if($arResult["PHONE_REQUIRED"]):?><span>*</span><?endif?></label>
							<input class="input_site phone input_site_dark" type="text" name="USER_PHONE_NUMBER" maxlength="255" value="<?=$arResult["USER_PHONE_NUMBER"]?>" class="bx-auth-input" />
						</div>

						<?// ********************* User properties ***************************************************?>
						<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
							<?=strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?>
							<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
							<?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;
								?><?=$arUserField["EDIT_FORM_LABEL"]?>:
									<?$APPLICATION->IncludeComponent(
										"bitrix:system.field.edit",
										$arUserField["USER_TYPE"]["USER_TYPE_ID"],
										array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "bform"), null, array("HIDE_ICONS"=>"Y"));?>
							<?endforeach;?>
						<?endif;?>
						<?// ******************** /User properties ***************************************************

						/* CAPTCHA */
						if ($arResult["USE_CAPTCHA"] == "Y")
						{
							?>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<b><?=GetMessage("CAPTCHA_REGF_TITLE")?></b><br><br>
									<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
									<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br>
									<label for="#"><span>*</span><?=GetMessage("CAPTCHA_REGF_PROMT")?></label>
									<input class="input_site input_site_dark" type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" />
								</div>
							</div>
							<div class="row">
							<?
						}
						/* CAPTCHA */
						?>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.userconsent.request",
								"for_registration",
								array(
									"ID" => COption::getOptionString("main", "new_user_agreement", ""),
									"IS_CHECKED" => "Y",
									"AUTO_SAVE" => "N",
									"IS_LOADED" => "Y",
									"ORIGINATOR_ID" => $arResult["AGREEMENT_ORIGINATOR_ID"],
									"ORIGIN_ID" => $arResult["AGREEMENT_ORIGIN_ID"],
									"INPUT_NAME" => $arResult["AGREEMENT_INPUT_NAME"],
									"REPLACE" => array(
										"button_caption" => GetMessage("AUTH_REGISTER"),
										"fields" => array(
											rtrim(GetMessage("AUTH_NAME"), ":"),
											rtrim(GetMessage("AUTH_LAST_NAME"), ":"),
											rtrim(GetMessage("AUTH_LOGIN_MIN"), ":"),
											rtrim(GetMessage("AUTH_PASSWORD_REQ"), ":"),
											rtrim(GetMessage("AUTH_EMAIL"), ":"),
										)
									),
								)
							);?>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<input class="btn_site btn_transparent" type="submit" name="Register" value="<?=GetMessage("AUTH_REGISTER")?>" />
						</div>
					</div>
				</div>
			</form>
			<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
			<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>
			<script type="text/javascript">
			document.bform.USER_LOGIN.focus();
			</script>
		<?endif?>
	<? endif;?>
</noindex>
