<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
global $APPLICATION;
?>
<?// print_r($arResult['my_sections']) ?>
<?// print_r($arResult['my_elements']) ?>
<?// print_r($arResult['render']) ?>
<?// print_r($arResult['SECTIONS']) ?>
<?// print_r($arParams) ?>

<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
	<div class="row">
		<? foreach($arResult['render'] as $arSection) : ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<a href="<?=$arSection['SECTION_PAGE_URL']?>" class="head_h1"><?=$arSection['NAME']?></a>
			</div>

<?//print_r($arResult['SECTION'][$arSectio])?>
<?//print_r($arSection)?>


			<? if (!empty($arSection['elements'])) : ?>
				<? foreach($arSection['elements'] as $element) : ?>
<?//print_r($element)?>
					<?$APPLICATION->IncludeComponent(
						"bitrix:catalog.element",
						"single_element",
						array(
							"ACTION_VARIABLE" => "action",
							"ADD_DETAIL_TO_SLIDER" => "N",
							"ADD_ELEMENT_CHAIN" => "N",
							"ADD_PICT_PROP" => "-",
							"ADD_PROPERTIES_TO_BASKET" => "Y",
							"ADD_SECTIONS_CHAIN" => "N",
							"ADD_TO_BASKET_ACTION" => array(
								0 => "ADD",
							),
							"ADD_TO_BASKET_ACTION_PRIMARY" => array(
								0 => "ADD",
							),
							"BACKGROUND_IMAGE" => "-",
							"BASKET_URL" => "/personal/basket.php",
							"BRAND_USE" => "N",
							"BROWSER_TITLE" => "-",
							"CACHE_GROUPS" => "Y",
							"CACHE_TIME" => "36000000",
							"CACHE_TYPE" => "A",
							"CHECK_SECTION_ID_VARIABLE" => "Y",
							"COMPATIBLE_MODE" => "N",
							"COMPONENT_TEMPLATE" => "single_element",
							"CONVERT_CURRENCY" => "N",
							"DETAIL_PICTURE_MODE" => array(
								0 => "POPUP",
								1 => "MAGNIFIER",
							),
							"DETAIL_URL" => $element["DETAIL_PAGE_URL"],
							"DISABLE_INIT_JS_IN_COMPONENT" => "N",
							"DISPLAY_COMPARE" => "N",
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PREVIEW_TEXT_MODE" => "S",
							"ELEMENT_CODE" => "",
							"ELEMENT_ID" => $element["ID"],
							"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
							"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
							"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
							"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
							"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
							"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
							"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
							"GIFTS_MESS_BTN_BUY" => "Выбрать",
							"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
							"GIFTS_SHOW_IMAGE" => "Y",
							"GIFTS_SHOW_NAME" => "Y",
							"GIFTS_SHOW_OLD_PRICE" => "Y",
							"HIDE_NOT_AVAILABLE_OFFERS" => "N",
							"IBLOCK_ID" => "1",
							"IBLOCK_TYPE" => "goods",
							"IMAGE_RESOLUTION" => "16by9",
							"LABEL_PROP" => array(
							),
							"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
							"LINK_IBLOCK_ID" => "",
							"LINK_IBLOCK_TYPE" => "",
							"LINK_PROPERTY_SID" => "",
							"MESSAGE_404" => "",
							"MESS_BTN_ADD_TO_BASKET" => "В корзину",
							"MESS_BTN_BUY" => "Купить",
							"MESS_BTN_SUBSCRIBE" => "Подписаться",
							"MESS_COMMENTS_TAB" => "Комментарии",
							"MESS_DESCRIPTION_TAB" => "Описание",
							"MESS_NOT_AVAILABLE" => "Нет в наличии",
							"MESS_PRICE_RANGES_TITLE" => "Цены",
							"MESS_PROPERTIES_TAB" => "Характеристики",
							"META_DESCRIPTION" => "-",
							"META_KEYWORDS" => "-",
							"OFFERS_LIMIT" => "0",
							"PARTIAL_PRODUCT_PROPERTIES" => "Y",
							"PRICE_CODE" => array(
								0 => "retail_price",
							),
							"PRICE_VAT_INCLUDE" => "Y",
							"PRICE_VAT_SHOW_VALUE" => "N",
							"PRODUCT_ID_VARIABLE" => "id",
							"PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
							"PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
							"PRODUCT_PROPS_VARIABLE" => "prop",
							"PRODUCT_QUANTITY_VARIABLE" => "quantity",
							"PRODUCT_SUBSCRIPTION" => "Y",
							"SECTION_CODE" => "",
							"SECTION_CODE_PATH" => "",
							"SECTION_ID" => "",
							"SECTION_ID_VARIABLE" => "SECTION_ID",
							"SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
							"SEF_MODE" => "Y",
							"SEF_RULE" => "/catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
							"SET_BROWSER_TITLE" => "N",
							"SET_CANONICAL_URL" => "N",
							"SET_LAST_MODIFIED" => "N",
							"SET_META_DESCRIPTION" => "N",
							"SET_META_KEYWORDS" => "N",
							"SET_STATUS_404" => "N",
							"SET_TITLE" => "N",
							"SET_VIEWED_IN_COMPONENT" => "N",
							"SHOW_404" => "N",
							"SHOW_CLOSE_POPUP" => "Y",
							"SHOW_DEACTIVATED" => "N",
							"SHOW_DISCOUNT_PERCENT" => "N",
							"SHOW_MAX_QUANTITY" => "N",
							"SHOW_OLD_PRICE" => "N",
							"SHOW_PRICE_COUNT" => "1",
							"SHOW_SLIDER" => "N",
							"STRICT_SECTION_CHECK" => "N",
							"TEMPLATE_THEME" => "blue",
							"USE_COMMENTS" => "N",
							"USE_ELEMENT_COUNTER" => "N",
							"USE_ENHANCED_ECOMMERCE" => "N",
							"USE_GIFTS_DETAIL" => "N",
							"USE_GIFTS_MAIN_PR_SECTION_LIST" => "N",
							"USE_MAIN_ELEMENT_SECTION" => "N",
							"USE_PRICE_COUNT" => "N",
							"USE_PRODUCT_QUANTITY" => "Y",
							"USE_RATIO_IN_RANGES" => "N",
							"USE_VOTE_RATING" => "N"
						),
						false
					);?>
<?/*					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<div class="item_goods">
							<div class="img_wrapper">
								<img src="<?=$element['PREVIEW_PICTURE']['SRC']?>" alt="Автосигнализация Pandora DXL 3970 PRO ver.2">
								<div class="dark">
									<div class="text_cart">В корзину</div>
								</div>
							</div>
							<a href="#" class="name">Автосигнализация Pandora DXL 3970 PRO ver.2</a>
							<div class="price">3 340 руб.</div>
							<div class="counter">
								<div class="minus">&minus;</div><div class="value">1</div><div class="plus">&plus;</div>
							</div>
							<a class="btn_site btn_red add_to_cart">В корзину</a>
						</div>
					</div>
*/?>				<? endforeach; ?>
			<? endif; ?>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
				<div class="with_line">
					<div class="btn_site btn_transparent">
						<a href="<?=$arSection['SECTION_PAGE_URL']?>">Показать все</a>
					</div>
				</div>
			</div>

		<? endforeach; ?>
	</div>
</div>





<?/*
<div class="catalog-sections-top">

<?foreach($arResult["SECTIONS"] as $arSection):?>
	<? if($arResult['my_sections'][$arSection['ID']]['DEPTH_LEVEL'] == 1) : ?>
<p><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?> <?=$arResult['my_sections'][$arSection['ID']]['parent_id']?></a></p>
	<? endif; ?>
<table cellpadding="0" cellspacing="0" border="0">
	<tr>
		<?
		$cell = 0;
		foreach($arSection["ITEMS"] as $arElement):
		?>
		<?
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCST_ELEMENT_DELETE_CONFIRM')));
		?>
		<td valign="top" width="<?=round(100/$arParams["LINE_ELEMENT_COUNT"])?>%" id="<?=$this->GetEditAreaId($arElement['ID']);?>">

			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td valign="top">
						<?=$arResult['my_sections'][$arSection['ID']]['parent_id'] ?>
					<?if(is_array($arElement["PREVIEW_PICTURE"])):?>
						<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><img
								border="0"
								src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>"
								width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>"
								height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>"
								alt="<?=$arElement["PREVIEW_PICTURE"]["ALT"]?>"
								title="<?=$arElement["PREVIEW_PICTURE"]["TITLE"]?>"
								/></a><br />
					<?elseif(is_array($arElement["DETAIL_PICTURE"])):?>
						<a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><img
								border="0"
								src="<?=$arElement["DETAIL_PICTURE"]["SRC"]?>"
								width="<?=$arElement["DETAIL_PICTURE"]["WIDTH"]?>"
								height="<?=$arElement["DETAIL_PICTURE"]["HEIGHT"]?>"
								alt="<?=$arElement["DETAIL_PICTURE"]["ALT"]?>"
								title="<?=$arElement["DETAIL_PICTURE"]["TITLE"]?>"
								/></a><br />
					<?endif?>
					</td>
					<td valign="top"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a><br />
						<?foreach($arElement["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
							<small><?=$arProperty["NAME"]?>:&nbsp;<?
								if(is_array($arProperty["DISPLAY_VALUE"]))
									echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
								else
									echo $arProperty["DISPLAY_VALUE"];?></small><br />
						<?endforeach?>
						<br />
						<?=$arElement["PREVIEW_TEXT"]?>
					</td>
				</tr>
			</table>

			<?foreach($arElement["PRICES"] as $code=>$arPrice):?>
				<?if($arPrice["CAN_ACCESS"]):?>
					<p><?=$arResult["PRICES"][$code]["TITLE"];?>:&nbsp;&nbsp;
					<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
						<s><?=$arPrice["PRINT_VALUE"]?></s> <span class="catalog-price"><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></span>
					<?else:?>
						<span class="catalog-price"><?=$arPrice["PRINT_VALUE"]?></span>
					<?endif?>
					</p>
				<?endif;?>
			<?endforeach;?>
			<?if(is_array($arElement["PRICE_MATRIX"])):?>
				<table cellpadding="0" cellspacing="0" border="0" width="100%" class="data-table">
				<thead>
				<tr>
					<?if(count($arElement["PRICE_MATRIX"]["ROWS"]) >= 1 && ($arElement["PRICE_MATRIX"]["ROWS"][0]["QUANTITY_FROM"] > 0 || $arElement["PRICE_MATRIX"]["ROWS"][0]["QUANTITY_TO"] > 0)):?>
						<td valign="top" nowrap><?= GetMessage("CATALOG_QUANTITY") ?></td>
					<?endif?>
					<?foreach($arElement["PRICE_MATRIX"]["COLS"] as $typeID => $arType):?>
						<td valign="top" nowrap><?= $arType["NAME_LANG"] ?></td>
					<?endforeach?>
				</tr>
				</thead>
				<?foreach ($arElement["PRICE_MATRIX"]["ROWS"] as $ind => $arQuantity):?>
				<tr>
					<?if(count($arElement["PRICE_MATRIX"]["ROWS"]) > 1 || count($arElement["PRICE_MATRIX"]["ROWS"]) == 1 && ($arElement["PRICE_MATRIX"]["ROWS"][0]["QUANTITY_FROM"] > 0 || $arElement["PRICE_MATRIX"]["ROWS"][0]["QUANTITY_TO"] > 0)):?>
						<th nowrap><?
							if (IntVal($arQuantity["QUANTITY_FROM"]) > 0 && IntVal($arQuantity["QUANTITY_TO"]) > 0)
								echo str_replace("#FROM#", $arQuantity["QUANTITY_FROM"], str_replace("#TO#", $arQuantity["QUANTITY_TO"], GetMessage("CATALOG_QUANTITY_FROM_TO")));
							elseif (IntVal($arQuantity["QUANTITY_FROM"]) > 0)
								echo str_replace("#FROM#", $arQuantity["QUANTITY_FROM"], GetMessage("CATALOG_QUANTITY_FROM"));
							elseif (IntVal($arQuantity["QUANTITY_TO"]) > 0)
								echo str_replace("#TO#", $arQuantity["QUANTITY_TO"], GetMessage("CATALOG_QUANTITY_TO"));
						?></th>
					<?endif?>
					<?foreach($arElement["PRICE_MATRIX"]["COLS"] as $typeID => $arType):?>
						<td><?
							if($arElement["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["DISCOUNT_PRICE"] < $arElement["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["PRICE"]):?>
								<s><?=FormatCurrency($arElement["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["PRICE"], $arElement["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["CURRENCY"])?></s><span class="catalog-price"><?=FormatCurrency($arElement["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["DISCOUNT_PRICE"], $arElement["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["CURRENCY"]);?></span>
							<?else:?>
								<span class="catalog-price"><?=FormatCurrency($arElement["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["PRICE"], $arElement["PRICE_MATRIX"]["MATRIX"][$typeID][$ind]["CURRENCY"]);?></span>
							<?endif?>&nbsp;
						</td>
					<?endforeach?>
				</tr>
				<?endforeach?>
				</table><br />
			<?endif?>
			<?if($arParams["DISPLAY_COMPARE"]):?>
				<noindex><a href="<?echo $arElement["COMPARE_URL"]?>" rel="nofollow"><?echo GetMessage("CATALOG_COMPARE")?></a>&nbsp;</noindex>
			<?endif?>
			<?if($arElement["CAN_BUY"]):?>
				<?if($arParams["USE_PRODUCT_QUANTITY"] || count($arElement["PRODUCT_PROPERTIES"])):?>
					<form action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
					<table border="0" cellspacing="0" cellpadding="2">
					<?if($arParams["USE_PRODUCT_QUANTITY"]):?>
						<tr valign="top">
							<td><?echo GetMessage("CT_BCST_QUANTITY")?>:</td>
							<td>
								<input type="text" name="<?echo $arParams["PRODUCT_QUANTITY_VARIABLE"]?>" value="1" size="5">
							</td>
						</tr>
					<?endif;?>
					<?foreach($arElement["PRODUCT_PROPERTIES"] as $pid => $product_property):?>
						<tr valign="top">
							<td><?echo $arElement["PROPERTIES"][$pid]["NAME"]?>:</td>
							<td>
							<?if(
								$arElement["PROPERTIES"][$pid]["PROPERTY_TYPE"] == "L"
								&& $arElement["PROPERTIES"][$pid]["LIST_TYPE"] == "C"
							):?>
								<?foreach($product_property["VALUES"] as $k => $v):?>
									<label><input type="radio" name="<?echo $arParams["PRODUCT_PROPS_VARIABLE"]?>[<?echo $pid?>]" value="<?echo $k?>" <?if($k == $product_property["SELECTED"]) echo '"checked"'?>><?echo $v?></label><br>
								<?endforeach;?>
							<?else:?>
								<select name="<?echo $arParams["PRODUCT_PROPS_VARIABLE"]?>[<?echo $pid?>]">
									<?foreach($product_property["VALUES"] as $k => $v):?>
										<option value="<?echo $k?>" <?if($k == $product_property["SELECTED"]) echo '"selected"'?>><?echo $v?></option>
									<?endforeach;?>
								</select>
							<?endif;?>
							</td>
						</tr>
					<?endforeach;?>
					</table>
					<input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]?>" value="BUY">
					<input type="hidden" name="<?echo $arParams["PRODUCT_ID_VARIABLE"]?>" value="<?echo $arElement["ID"]?>">
					<input type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."BUY"?>" value="<?echo GetMessage("CATALOG_BUY")?>">
					<input type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."ADD2BASKET"?>" value="<?echo GetMessage("CATALOG_ADD")?>">
					</form>
				<?else:?>
					<noindex><a href="<?echo $arElement["BUY_URL"]?>" rel="nofollow"><?echo GetMessage("CATALOG_BUY")?></a>
					&nbsp;<a href="<?echo $arElement["ADD_URL"]?>" rel="nofollow"><?echo GetMessage("CATALOG_ADD")?></a></noindex>
				<?endif;?>
			<?elseif((count($arResult["PRICES"]) > 0) || is_array($arElement["PRICE_MATRIX"])):?>
				<?=GetMessage("CATALOG_NOT_AVAILABLE")?>
			<?endif?>
			&nbsp;
		</td>
	<?
	$cell++;
	if($cell>=$arParams["LINE_ELEMENT_COUNT"]):
		$cell = 0;
	?>
	</tr>
	<tr>
	<?
	endif; // if($n%$LINE_ELEMENT_COUNT == 0):
		endforeach; // foreach($arResult["ITEMS"] as $arElement):
		while ($cell<$arParams["LINE_ELEMENT_COUNT"]):
			$cell++;
		?><td>&nbsp;</td><?
		endwhile;
		?>
	</tr>
</table>
<?endforeach?>
</div>
*/?>