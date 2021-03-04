<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<?//print_r($arParams);?>
<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>

<?if($arResult["SHOW_SMS_FIELD"] == true):?>

<form method="post" action="<?=$arResult["FORM_TARGET"]?>">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
<table class="profile-table data-table">
	<tbody>
		<tr>
			<td><?echo GetMessage("main_profile_code")?><span class="starrequired">*</span></td>
			<td><input size="30" type="text" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" /></td>
		</tr>
	</tbody>
</table>

<p><input type="submit" name="code_submit_button" value="<?echo GetMessage("main_profile_send")?>" /></p>

</form>

<script>
	new BX.PhoneAuth({
		containerId: 'bx_profile_resend',
		errorContainerId: 'bx_profile_error',
		interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
		data:
			<?=CUtil::PhpToJSObject([
				'signedData' => $arResult["SIGNED_DATA"],
			])?>,
		onError:
			function(response)
			{
				var errorDiv = BX('bx_profile_error');
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

<div id="bx_profile_error" style="display:none"><?ShowError("error")?></div>

<div id="bx_profile_resend"></div>

<?else:?>

<script type="text/javascript">
	<!--
	var opened_sections = [<?
	$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
	$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
	if (strlen($arResult["opened"]) > 0)
	{
		echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
	}
	else
	{
		$arResult["opened"] = "reg";
		echo "'reg'";
	}
	?>];
	//-->

	var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
</script>

<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

<div class="head_h1"><a title="<?=GetMessage("REG_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('reg')"><?=GetMessage("REG_SHOW_HIDE")?></a></div>
<div class="profile-block-<?=strpos($arResult["opened"], "reg") === false ? "hidden" : "shown"?>" id="user_div_reg">
	<div class="row">

	<?
	if($arResult["ID"]>0)
	{
	?>
		<?
		if (strlen($arResult["arUser"]["TIMESTAMP_X"])>0)
		{
		?>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<label for="#"><?=GetMessage('LAST_UPDATE')?></label>
		<?=$arResult["arUser"]["TIMESTAMP_X"]?>
		</div>
		<?
		}
		?>
		<?
		if (strlen($arResult["arUser"]["LAST_LOGIN"])>0)
		{
		?>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<label for="#"><?=GetMessage('LAST_LOGIN')?></label>
		<?=$arResult["arUser"]["LAST_LOGIN"]?>
		</div>
		<?
		}
		?>
	<?
	}
	?>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<label for="#"><?echo GetMessage("main_profile_title")?></label>
		<input class="input_site input_site_dark" type="text" name="TITLE" value="<?=$arResult["arUser"]["TITLE"]?>" />
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<label for="#"><?=GetMessage('NAME')?></label>
		<input class="input_site input_site_dark" type="text" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" />
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<label for="#"><?=GetMessage('LAST_NAME')?></label>
		<input class="input_site input_site_dark" type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" />
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<label for="#"><?=GetMessage('SECOND_NAME')?></label>
		<input class="input_site input_site_dark" type="text" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" />
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<label for="#"><?=GetMessage('LOGIN')?><span>*</span></label>
		<input class="input_site input_site_dark" type="text" name="LOGIN" maxlength="50" value="<? echo $arResult["arUser"]["LOGIN"]?>" />
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<label for="#"><?=GetMessage('EMAIL')?><?if($arResult["EMAIL_REQUIRED"]):?><span>*</span><?endif?></label>
		<input class="input_site input_site_dark" type="text" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"]?>" />
	</div>
	<?if($arResult["PHONE_REGISTRATION"]):?>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<label for="#"><?echo GetMessage("main_profile_phone_number")?><?if($arResult["PHONE_REQUIRED"]):?><span>*</span><?endif?></label>
		<input class="input_site input_site_dark" type="text" name="PHONE_NUMBER" maxlength="50" value="<? echo $arResult["arUser"]["PHONE_NUMBER"]?>" />
	</div>
	<?endif?>
	<?if($arResult['CAN_EDIT_PASSWORD']):?>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<label for="#"><?=GetMessage('NEW_PASSWORD_REQ')?></label>
		<input class="input_site input_site_dark" type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" />
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
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<label for="#"><?=GetMessage('NEW_PASSWORD_CONFIRM')?></label>
		<input class="input_site input_site_dark" type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" />
	</div>
	<?endif?>
	<?if($arResult["TIME_ZONE_ENABLED"] == true):?>
	<tr>
		<td colspan="2" class="profile-header"><?echo GetMessage("main_profile_time_zones")?></td>
	</tr>
	<tr>
		<td><?echo GetMessage("main_profile_time_zones_auto")?></td>
		<td>
			<select name="AUTO_TIME_ZONE" onchange="this.form.TIME_ZONE.disabled=(this.value != 'N')">
				<option value=""><?echo GetMessage("main_profile_time_zones_auto_def")?></option>
				<option value="Y"<?=($arResult["arUser"]["AUTO_TIME_ZONE"] == "Y"? ' SELECTED="SELECTED"' : '')?>><?echo GetMessage("main_profile_time_zones_auto_yes")?></option>
				<option value="N"<?=($arResult["arUser"]["AUTO_TIME_ZONE"] == "N"? ' SELECTED="SELECTED"' : '')?>><?echo GetMessage("main_profile_time_zones_auto_no")?></option>
			</select>
		</td>
	</tr>
	<tr>
		<td><?echo GetMessage("main_profile_time_zones_zones")?></td>
		<td>
			<select name="TIME_ZONE"<?if($arResult["arUser"]["AUTO_TIME_ZONE"] <> "N") echo ' disabled="disabled"'?>>
	<?foreach($arResult["TIME_ZONE_LIST"] as $tz=>$tz_name):?>
				<option value="<?=htmlspecialcharsbx($tz)?>"<?=($arResult["arUser"]["TIME_ZONE"] == $tz? ' SELECTED="SELECTED"' : '')?>><?=htmlspecialcharsbx($tz_name)?></option>
	<?endforeach?>
			</select>
		</td>
	</tr>
	<?endif?>

	</div>
</div>
<div class="head_h1"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('personal')"><?=GetMessage("USER_PERSONAL_INFO")?></a></div>
<div id="user_div_personal" class="profile-block-<?=strpos($arResult["opened"], "personal") === false ? "hidden" : "shown"?>">
	<div class="row">

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_PROFESSION')?></label>
			<input class="input_site input_site_dark" type="text" name="PERSONAL_PROFESSION" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_PROFESSION"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_WWW')?></label>
			<input class="input_site input_site_dark" type="text" name="PERSONAL_WWW" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_WWW"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_ICQ')?></label>
			<input class="input_site input_site_dark" type="text" name="PERSONAL_ICQ" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_ICQ"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_GENDER')?></label>
			<select class="input_site input_site_dark" name="PERSONAL_GENDER">
				<option value=""><?=GetMessage("USER_DONT_KNOW")?></option>
				<option value="M"<?=$arResult["arUser"]["PERSONAL_GENDER"] == "M" ? " SELECTED=\"SELECTED\"" : ""?>><?=GetMessage("USER_MALE")?></option>
				<option value="F"<?=$arResult["arUser"]["PERSONAL_GENDER"] == "F" ? " SELECTED=\"SELECTED\"" : ""?>><?=GetMessage("USER_FEMALE")?></option>
			</select>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage("USER_BIRTHDAY_DT")?> (<?=$arResult["DATE_FORMAT"]?>):</label>
			<?
			$APPLICATION->IncludeComponent(
				'bitrix:main.calendar',
				'shop_calendar',
				array(
					'SHOW_INPUT' => 'Y',
					'FORM_NAME' => 'form1',
					'INPUT_NAME' => 'PERSONAL_BIRTHDAY',
					'INPUT_VALUE' => $arResult["arUser"]["PERSONAL_BIRTHDAY"],
					'INPUT_CLASS' => 'input_site input_site_dark',
					'SHOW_TIME' => 'N'
				),
				null,
				array('HIDE_ICONS' => 'Y')
			);

			//=CalendarDate("PERSONAL_BIRTHDAY", $arResult["arUser"]["PERSONAL_BIRTHDAY"], "form1", "15")
			?>
		</div>


		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_PHONE')?></label>
			<input class="input_site input_site_dark" type="text" name="PERSONAL_PHONE" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_PHONE"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_FAX')?></label>
			<input class="input_site input_site_dark" type="text" name="PERSONAL_FAX" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_FAX"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_MOBILE')?></label>
			<input class="input_site input_site_dark" type="text" name="PERSONAL_MOBILE" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_MOBILE"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_PAGER')?></label>
			<input class="input_site input_site_dark" type="text" name="PERSONAL_PAGER" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_PAGER"]?>" />
		</div>


		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_CITY')?></label>
			<input class="input_site input_site_dark" type="text" name="PERSONAL_CITY" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_CITY"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_ZIP')?></label>
			<input class="input_site input_site_dark" type="text" name="PERSONAL_ZIP" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_ZIP"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage("USER_STREET")?></label>
			<textarea class="input_site input_site_dark" cols="30" rows="5" name="PERSONAL_STREET"><?=$arResult["arUser"]["PERSONAL_STREET"]?></textarea>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_MAILBOX')?></label>
			<input class="input_site input_site_dark" type="text" name="PERSONAL_MAILBOX" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_MAILBOX"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage("USER_NOTES")?></label>
			<textarea class="input_site input_site_dark" cols="30" rows="5" name="PERSONAL_NOTES"><?=$arResult["arUser"]["PERSONAL_NOTES"]?></textarea>
		</div>

	</div>
</div>

<div class="head_h1"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('work')"><?=GetMessage("USER_WORK_INFO")?></a></div>
<div id="user_div_work" class="profile-block-<?=strpos($arResult["opened"], "work") === false ? "hidden" : "shown"?>">

	<div class="row">

		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_COMPANY')?></label>
			<input class="input_site input_site_dark" type="text" name="WORK_COMPANY" maxlength="255" value="<?=$arResult["arUser"]["WORK_COMPANY"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_WWW')?></label>
			<input class="input_site input_site_dark" type="text" name="WORK_WWW" maxlength="255" value="<?=$arResult["arUser"]["WORK_WWW"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_DEPARTMENT')?></label>
			<input class="input_site input_site_dark" type="text" name="WORK_DEPARTMENT" maxlength="255" value="<?=$arResult["arUser"]["WORK_DEPARTMENT"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_POSITION')?></label>
			<input class="input_site input_site_dark" type="text" name="WORK_POSITION" maxlength="255" value="<?=$arResult["arUser"]["WORK_POSITION"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage("USER_WORK_PROFILE")?></label>
			<textarea class="input_site input_site_dark" cols="30" rows="5" name="WORK_PROFILE"><?=$arResult["arUser"]["WORK_PROFILE"]?></textarea>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_PHONE')?></label>
			<input class="input_site input_site_dark phone" type="text" name="WORK_PHONE" maxlength="255" value="<?=$arResult["arUser"]["WORK_PHONE"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_FAX')?></label>
			<input class="input_site input_site_dark phone" type="text" name="WORK_FAX" maxlength="255" value="<?=$arResult["arUser"]["WORK_FAX"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_PAGER')?></label>
			<input class="input_site input_site_dark" type="text" name="WORK_PAGER" maxlength="255" value="<?=$arResult["arUser"]["WORK_PAGER"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_STATE')?></label>
			<input class="input_site input_site_dark" type="text" name="WORK_STATE" maxlength="255" value="<?=$arResult["arUser"]["WORK_STATE"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_CITY')?></label>
			<input class="input_site input_site_dark" type="text" name="WORK_CITY" maxlength="255" value="<?=$arResult["arUser"]["WORK_CITY"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_ZIP')?></label>
			<input class="input_site input_site_dark" type="text" name="WORK_ZIP" maxlength="255" value="<?=$arResult["arUser"]["WORK_ZIP"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage("USER_STREET")?></label>
			<textarea class="input_site input_site_dark" cols="30" rows="5" name="WORK_STREET"><?=$arResult["arUser"]["WORK_STREET"]?></textarea>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('USER_MAILBOX')?></label>
			<input class="input_site input_site_dark" type="text" name="WORK_MAILBOX" maxlength="255" value="<?=$arResult["arUser"]["WORK_MAILBOX"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage("USER_NOTES")?></label>
			<textarea class="input_site input_site_dark" cols="30" rows="5" name="WORK_NOTES"><?=$arResult["arUser"]["WORK_NOTES"]?></textarea>
		</div>

	</div>
</div>
	<?
	if ($arResult["INCLUDE_FORUM"] == "Y")
	{
	?>

<div class="head_h1"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('forum')"><?=GetMessage("forum_INFO")?></a></div>
<div id="user_div_forum" class="profile-block-<?=strpos($arResult["opened"], "forum") === false ? "hidden" : "shown"?>">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label class='label_wrapper'>
				<label for="#"><?=GetMessage("forum_SHOW_NAME")?></label>
				<input type="hidden" name="forum_SHOW_NAME" value="N" /><input class="checkbox" type="checkbox" name="forum_SHOW_NAME" value="Y" <?if ($arResult["arForumUser"]["SHOW_NAME"]=="Y") echo "checked=\"checked\"";?> />
				<span class='checkbox-custom'></span>
			</label>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('forum_DESCRIPTION')?></label>
			<input class="input_site input_site_dark" type="text" name="forum_DESCRIPTION" maxlength="255" value="<?=$arResult["arForumUser"]["DESCRIPTION"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('forum_INTERESTS')?></label>
			<textarea class="input_site input_site_dark" cols="30" rows="5" name="forum_INTERESTS"><?=$arResult["arForumUser"]["INTERESTS"]; ?></textarea>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage("forum_SIGNATURE")?></label>
			<textarea class="input_site input_site_dark" cols="30" rows="5" name="forum_SIGNATURE"><?=$arResult["arForumUser"]["SIGNATURE"]; ?></textarea>
		</div>
	</div>
</div>

	<?
	}
	?>
	<?
	if ($arResult["INCLUDE_BLOG"] == "Y")
	{
	?>
<div class="head_h1"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('blog')"><?=GetMessage("blog_INFO")?></a></div>
<div id="user_div_blog" class="profile-block-<?=strpos($arResult["opened"], "blog") === false ? "hidden" : "shown"?>">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('blog_ALIAS')?></label>
			<input class="input_site input_site_dark" type="text" name="blog_ALIAS" maxlength="255" value="<?=$arResult["arBlogUser"]["ALIAS"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('blog_DESCRIPTION')?></label>
			<input class="input_site input_site_dark" type="text" name="blog_DESCRIPTION" maxlength="255" value="<?=$arResult["arBlogUser"]["DESCRIPTION"]?>" />
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?=GetMessage('blog_INTERESTS')?></label>
			<textarea class="input_site input_site_dark" cols="30" rows="5" class="typearea" name="blog_INTERESTS"><?echo $arResult["arBlogUser"]["INTERESTS"]; ?></textarea>
		</div>
	</div>
</div>
	<?
	}
	?>
	<?if ($arResult["INCLUDE_LEARNING"] == "Y"):?>
	<div class="head_h1"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('learning')"><?=GetMessage("learning_INFO")?></a></div>
	<div id="user_div_learning" class="profile-block-<?=strpos($arResult["opened"], "learning") === false ? "hidden" : "shown"?>">
	<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<label for="#"><?=GetMessage("learning_PUBLIC_PROFILE");?>:</label>
				<input class="input_site input_site_dark" type="hidden" name="student_PUBLIC_PROFILE" value="N" /><input type="checkbox" name="student_PUBLIC_PROFILE" value="Y" <?if ($arResult["arStudent"]["PUBLIC_PROFILE"]=="Y") echo "checked=\"checked\"";?> />
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<label for="#"><?=GetMessage("learning_RESUME");?>:</label>
				<textarea class="input_site input_site_dark" cols="30" rows="5" name="student_RESUME"><?=$arResult["arStudent"]["RESUME"]; ?></textarea>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<label for="#"><?=GetMessage("learning_TRANSCRIPT");?>:</label>
				<?=$arResult["arStudent"]["TRANSCRIPT"];?>-<?=$arResult["ID"]?>
			</div>
		</div>
	</div>
	<?endif;?>
	<?if($arResult["IS_ADMIN"]):?>
	<div class="head_h1"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('admin')"><?=GetMessage("USER_ADMIN_NOTES")?></a></div>
	<div id="user_div_admin" class="profile-block-<?=strpos($arResult["opened"], "admin") === false ? "hidden" : "shown"?>">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<label for="#"><?=GetMessage("USER_ADMIN_NOTES")?>:</label>
				<textarea class="input_site input_site_dark" cols="30" rows="5" name="ADMIN_NOTES"><?=$arResult["arUser"]["ADMIN_NOTES"]?></textarea>
			</div>
		</div>
	</div>
	<?endif;?>
	<?// ********************* User properties ***************************************************?>
	<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
	<div class="head_h1"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('user_properties')"><?=strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></a></div>
	<div id="user_div_user_properties" class="profile-block-<?=strpos($arResult["opened"], "user_properties") === false ? "hidden" : "shown"?>">



		<?$first = true;?>
		<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>

			<?if ($arUserField["MANDATORY"]=="Y"):?>
				<span class="starrequired">*</span>
			<?endif;?>
			<?=$arUserField["EDIT_FORM_LABEL"]?>:
				<?$APPLICATION->IncludeComponent(
					"bitrix:system.field.edit",
					$arUserField["USER_TYPE"]["USER_TYPE_ID"],
					array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField), null, array("HIDE_ICONS"=>"Y"));?>
		<?endforeach;?>


	</div>
	<?endif;?>
	<?// ******************** /User properties ***************************************************?>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<label for="#"><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></label><br><br>
			<input type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>" class="btn_site btn_transparent">&nbsp;&nbsp;<input type="reset" value="<?=GetMessage('MAIN_RESET');?>" class="btn_site btn_transparent">
		</div>
	</div>
</form>
<?
if($arResult["SOCSERV_ENABLED"])
{
	$APPLICATION->IncludeComponent("bitrix:socserv.auth.split", ".default", array(
			"SHOW_PROFILES" => "Y",
			"ALLOW_DELETE" => "Y"
		),
		false
	);
}
?>

<?endif?>

</div>