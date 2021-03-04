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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arViewStyles = array(
	'LIST' => array(
		'CONT' => 'bx_sitemap',
		'TITLE' => 'bx_sitemap_title',
		'LIST' => 'bx_sitemap_ul',
	),
	'LINE' => array(
		'CONT' => 'bx_catalog_line',
		'TITLE' => 'bx_catalog_line_category_title',
		'LIST' => 'bx_catalog_line_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/line-empty.png'
	),
	'TEXT' => array(
		'CONT' => 'bx_catalog_text',
		'TITLE' => 'bx_catalog_text_category_title',
		'LIST' => 'bx_catalog_text_ul'
	),
	'TILE' => array(
		'CONT' => 'bx_catalog_tile',
		'TITLE' => 'bx_catalog_tile_category_title',
		'LIST' => 'bx_catalog_tile_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?><div class="<? echo $arCurView['CONT']; ?>"><?
if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID'])
{
	$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

	?><h1
		class="<? echo $arCurView['TITLE']; ?>"
		id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>"
	><a href="<? echo $arResult['SECTION']['SECTION_PAGE_URL']; ?>"><?
		echo (
			isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != ""
			? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]
			: $arResult['SECTION']['NAME']
		);
	?></a></h1><?
}
if (0 < $arResult["SECTIONS_COUNT"])
{
?>
<ul class="<? echo $arCurView['LIST']; ?>">
<?
	switch ($arParams['VIEW_MODE'])
	{
		case 'LINE':
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

				if (false === $arSection['PICTURE'])
					$arSection['PICTURE'] = array(
						'SRC' => $arCurView['EMPTY_IMG'],
						'ALT' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							: $arSection["NAME"]
						),
						'TITLE' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							: $arSection["NAME"]
						)
					);
				?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
				<a
					href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
					class="bx_catalog_line_img"
					style="background-image: url('<? echo $arSection['PICTURE']['SRC']; ?>');"
					title="<? echo $arSection['PICTURE']['TITLE']; ?>"
				></a>
				<h2 class="bx_catalog_line_title"><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
				if ($arParams["COUNT_ELEMENTS"])
				{
					?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
				}
				?></h2><?
				if ('' != $arSection['DESCRIPTION'])
				{
					?><p class="bx_catalog_line_description"><? echo $arSection['DESCRIPTION']; ?></p><?
				}
				?><div style="clear: both;"></div>
				</li><?
			}
			unset($arSection);
			break;
		case 'TEXT':
			//print_r($arResult['SECTION']);

			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

				?>
				<div class="row" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">

					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<a href="<? echo $arSection['SECTION_PAGE_URL']; ?>" class="head_h1"><? echo $arSection['NAME']; ?></a>
					</div>
					<? if (!empty($arSection['elements'])) : ?>
						<? foreach($arSection['elements'] as $element) : ?>
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
						<? endforeach; ?>
					<? endif; ?>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<div class="with_line">
							<div class="btn_site btn_transparent">
								<a href="<? echo $arSection['SECTION_PAGE_URL']; ?>">
									Показать все
								</a>
							</div>
						</div>
					</div>
				</div>
				<?/*
				<li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"><h2 class="bx_catalog_text_title"><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
				if ($arParams["COUNT_ELEMENTS"])
				{
					?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
				}
				?></h2></li>
				*/?>

				<?
			}
			unset($arSection);



			break;
		case 'TILE':
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

				if (false === $arSection['PICTURE'])
					$arSection['PICTURE'] = array(
						'SRC' => $arCurView['EMPTY_IMG'],
						'ALT' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							: $arSection["NAME"]
						),
						'TITLE' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							: $arSection["NAME"]
						)
					);
				?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
				<a
					href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
					class="bx_catalog_tile_img"
					style="background-image:url('<? echo $arSection['PICTURE']['SRC']; ?>');"
					title="<? echo $arSection['PICTURE']['TITLE']; ?>"
					> </a><?
				if ('Y' != $arParams['HIDE_SECTION_NAME'])
				{
					?><h2 class="bx_catalog_tile_title"><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
					if ($arParams["COUNT_ELEMENTS"])
					{
						?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
					}
				?></h2><?
				}
				?></li><?
			}
			unset($arSection);
			break;
		case 'LIST':
			$intCurrentDepth = 1;
			$boolFirst = true;
			foreach ($arResult['SECTIONS'] as &$arSection)
			{
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

				if ($intCurrentDepth < $arSection['RELATIVE_DEPTH_LEVEL'])
				{
					if (0 < $intCurrentDepth)
						echo "\n",str_repeat("\t", $arSection['RELATIVE_DEPTH_LEVEL']),'<ul>';
				}
				elseif ($intCurrentDepth == $arSection['RELATIVE_DEPTH_LEVEL'])
				{
					if (!$boolFirst)
						echo '</li>';
				}
				else
				{
					while ($intCurrentDepth > $arSection['RELATIVE_DEPTH_LEVEL'])
					{
						echo '</li>',"\n",str_repeat("\t", $intCurrentDepth),'</ul>',"\n",str_repeat("\t", $intCurrentDepth-1);
						$intCurrentDepth--;
					}
					echo str_repeat("\t", $intCurrentDepth-1),'</li>';
				}

				echo (!$boolFirst ? "\n" : ''),str_repeat("\t", $arSection['RELATIVE_DEPTH_LEVEL']);
				?><li id="<?=$this->GetEditAreaId($arSection['ID']);?>"><h2 class="bx_sitemap_li_title"><a href="<? echo $arSection["SECTION_PAGE_URL"]; ?>"><? echo $arSection["NAME"];?><?
				if ($arParams["COUNT_ELEMENTS"])
				{
					?> <span>(<? echo $arSection["ELEMENT_CNT"]; ?>)</span><?
				}
				?></a></h2><?

				$intCurrentDepth = $arSection['RELATIVE_DEPTH_LEVEL'];
				$boolFirst = false;
			}
			unset($arSection);
			while ($intCurrentDepth > 1)
			{
				echo '</li>',"\n",str_repeat("\t", $intCurrentDepth),'</ul>',"\n",str_repeat("\t", $intCurrentDepth-1);
				$intCurrentDepth--;
			}
			if ($intCurrentDepth > 0)
			{
				echo '</li>',"\n";
			}
			break;
	}
?>
</ul>
<?
	echo ('LINE' != $arParams['VIEW_MODE'] ? '<div style="clear: both;"></div>' : '');
}
?></div>