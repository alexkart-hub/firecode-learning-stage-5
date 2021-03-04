<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?/*
<p><?echo $arResult["MESSAGE_TEXT"]?></p>
*/?>
<div class="head_h1">
<?//here you can place your own messages
	switch($arResult["MESSAGE_CODE"])
	{
	case "E01":
		?><?=GetMessage("CT_BSAC_USER_NOT_FOUND")?><? //When user not found
		break;
	case "E02":
		?><? //User was successfully authorized after confirmation
		break;
	case "E03":
		?><?=GetMessage("CT_BSAC_ALREADY_CONFIRM")?><? //User already confirm his registration
		break;
	case "E04":
		?><?=GetMessage("CT_BSAC_MISSED_CODE")?><? //Missed confirmation code
		break;
	case "E05":
		?><?=GetMessage("CT_BSAC_CODE_NOT_MATCH")?><? //Confirmation code provided does not match stored one
		break;
	case "E06":
		?><?=GetMessage("CT_BSAC_CONFIRMATION_WAS_SACCESSFULL")?><? //Confirmation was successfull
		break;
	case "E07":
		?><?=GetMessage("CT_BSAC_SOME_ERROR")?><? //Some error occured during confirmation
		break;
	}
?>
</div>
<?if($arResult["SHOW_FORM"]):?>
	<form method="post" action="<?echo $arResult["FORM_ACTION"]?>" class="reg_wrapper">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?echo GetMessage("CT_BSAC_LOGIN")?></label>
			<input class="input_site input_site_dark" type="text" name="<?echo $arParams["LOGIN"]?>" value="<?echo $arResult["LOGIN"]?>"/>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<label for="#"><?echo GetMessage("CT_BSAC_CONFIRM_CODE")?></label>
			<input class="input_site input_site_dark" type="text" name="<?echo $arParams["CONFIRM_CODE"]?>" value="<?echo $arResult["CONFIRM_CODE"]?>"/>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<input class="btn_site btn_transparent" type="submit" value="<?echo GetMessage("CT_BSAC_CONFIRM")?>" />
		</div>
		<input type="hidden" name="<?echo $arParams["USER_ID"]?>" value="<?echo $arResult["USER_ID"]?>" />
	</form>
<?elseif(!$USER->IsAuthorized()):?>
	<?//$APPLICATION->IncludeComponent("bitrix:system.auth.authorize", "", array());?>
	<?//$APPLICATION->IncludeComponent("bitrix:system.auth.form", "shop_auth", array());?>
<?endif?>