<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (empty($arResult))
	return;

foreach($arResult as $key=>$item)
{
	$arResult[$key]['LINK'] = $item['LINK']."?clear_cache=Y";
}

$arFilter = Array('IBLOCK_ID'=> 1, 'GLOBAL_ACTIVE'=>'Y', 'DEPTH_LEVEL' => 1);
$uf_name = Array('UF_ICON_MENU');
$db_list = CIBlockSection::GetList(Array(), $arFilter, true, $uf_name);

while($ar_result = $db_list->GetNext())
{
	foreach($arResult as $key=>$item){
		if($item['TEXT'] == $ar_result['NAME']){
			$icon_crs = CFile::GetFileArray($ar_result['UF_ICON_MENU'])['SRC'];
			$arResult[$key]['icon'] = $icon_crs;
		}
	}
}

$arFilter1 = Array('IBLOCK_ID'=> 1);
$db_list1 = CIBlockSection::GetList(Array(), $arFilter1, true, Array());

while($ar_result1 = $db_list1->GetNext())
{
	foreach($arResult as $key=>$item){
		if($item['TEXT'] == $ar_result1['NAME']){
			$arResult[$key]['ID'] = $ar_result1['ID'];
			$arResult[$key]['IBLOCK_ID'] = $ar_result1['IBLOCK_ID'];
			$arType = CIblockType::GetByID($ar_result1['IBLOCK_TYPE_ID']);
			$arResult[$key]['IBLOCK_TYPE'] = $arType->GetNext()['ID'];

		}
	}

}

$arParams['IBLOCK_TYPE'] = 'goods';
$arParams['IBLOCK_ID'] = 1;
$arParams['FILTER_NAME'] = "arrFilter";
$arParams['PRICE_CODE'] = array('retail_price');
$arParams['CACHE_GROUPS'] = 'Y';
$arParams["FILTER_VIEW_MODE"] = 'VERTICAL';
$arParams["HIDE_NOT_AVAILABLE"] = 'N';
$arParams["TEMPLATE_THEME"] = 'blue';
$arParams['CONVERT_CURRENCY'] = 'N';
$arParams['CURRENCY_ID'] = '';
$arParams["SEF_MODE"] = 'Y';
$arParams["SEF_RULE"] = "/catalog/#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/";
$arResult["VARIABLES"]["SMART_FILTER_PATH"] = '';
$arParams["PAGER_PARAMS_NAME"] = '';