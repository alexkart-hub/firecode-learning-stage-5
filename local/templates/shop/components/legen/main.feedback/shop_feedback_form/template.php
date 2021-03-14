<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{
	?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>
<div class="item_contacts">

<div class="head">Напишите нам</div>
<form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="form_contacts">
<?=bitrix_sessid_post()?>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<input type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" class="input_site name" placeholder="<?=GetMessage("MFT_NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><?=" *";?><?endif?>">
	</div>
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="mf-text">

		</div>
		<input type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" class="input_site" placeholder="<?=GetMessage("MFT_EMAIL")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><?=" *";?><?endif?>">
	</div>
</div>
<textarea  class="textarea_site" name="MESSAGE"  placeholder="<?=GetMessage("MFT_MESSAGE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><?=" *";?><?endif?>"><?=$arResult["MESSAGE"]?></textarea>

		<label class='label_wrapper'>
			<input type='checkbox' class='checkbox' name='soglasie' checked>
			<span class='checkbox-custom'></span>
			<span class='label_text'>Принимаю <a href="/soglasie.pdf" target="_blank">согласие на обработку персональных данных</a></span>
		</label>
		<br>

	<?if($arParams["USE_CAPTCHA"] == "Y"):?>
	<div class="mf-captcha">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
		<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
		<input type="text" name="captcha_word" size="30" maxlength="50" value="">
	</div>
	<?endif;?>
	<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
    <input type="submit" name="submit" class="btn_site btn_red" value="<?=GetMessage("MFT_SUBMIT")?>">
</form>
</div>
