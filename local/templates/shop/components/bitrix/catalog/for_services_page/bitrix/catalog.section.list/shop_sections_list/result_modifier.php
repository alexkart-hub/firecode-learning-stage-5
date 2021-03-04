<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arViewModeList = array('LIST', 'LINE', 'TEXT', 'TILE');

$arDefaultParams = array(
	'VIEW_MODE' => 'LIST',
	'SHOW_PARENT_NAME' => 'Y',
	'HIDE_SECTION_NAME' => 'N',
	'ELEMENT_COUNT' => 3
);

$arParams = array_merge($arDefaultParams, $arParams);

if (!in_array($arParams['VIEW_MODE'], $arViewModeList))
	$arParams['VIEW_MODE'] = 'LIST';
if ('N' != $arParams['SHOW_PARENT_NAME'])
	$arParams['SHOW_PARENT_NAME'] = 'Y';
if ('Y' != $arParams['HIDE_SECTION_NAME'])
	$arParams['HIDE_SECTION_NAME'] = 'N';

$arResult['VIEW_MODE_LIST'] = $arViewModeList;

if (0 < $arResult['SECTIONS_COUNT'])
{
	if ('LIST' != $arParams['VIEW_MODE'])
	{
		$boolClear = false;
		$arNewSections = array();
		foreach ($arResult['SECTIONS'] as &$arOneSection)
		{
			if (1 < $arOneSection['RELATIVE_DEPTH_LEVEL'])
			{
				$boolClear = true;
				continue;
			}
			$arNewSections[] = $arOneSection;
		}
		unset($arOneSection);
		if ($boolClear)
		{
			$arResult['SECTIONS'] = $arNewSections;
			$arResult['SECTIONS_COUNT'] = count($arNewSections);
		}
		unset($arNewSections);
	}
}

if (0 < $arResult['SECTIONS_COUNT'])
{
	$boolPicture = false;
	$boolDescr = false;
	$arSelect = array('ID');
	$arMap = array();
	if ('LINE' == $arParams['VIEW_MODE'] || 'TILE' == $arParams['VIEW_MODE'])
	{
		reset($arResult['SECTIONS']);
		$arCurrent = current($arResult['SECTIONS']);
		if (!isset($arCurrent['PICTURE']))
		{
			$boolPicture = true;
			$arSelect[] = 'PICTURE';
		}
		if ('LINE' == $arParams['VIEW_MODE'] && !array_key_exists('DESCRIPTION', $arCurrent))
		{
			$boolDescr = true;
			$arSelect[] = 'DESCRIPTION';
			$arSelect[] = 'DESCRIPTION_TYPE';
		}
	}
	if ($boolPicture || $boolDescr)
	{
		foreach ($arResult['SECTIONS'] as $key => $arSection)
		{
			$arMap[$arSection['ID']] = $key;
		}
		$rsSections = CIBlockSection::GetList(array(), array('ID' => array_keys($arMap)), false, $arSelect);
		while ($arSection = $rsSections->GetNext())
		{
			if (!isset($arMap[$arSection['ID']]))
				continue;
			$key = $arMap[$arSection['ID']];
			if ($boolPicture)
			{
				$arSection['PICTURE'] = intval($arSection['PICTURE']);
				$arSection['PICTURE'] = (0 < $arSection['PICTURE'] ? CFile::GetFileArray($arSection['PICTURE']) : false);
				$arResult['SECTIONS'][$key]['PICTURE'] = $arSection['PICTURE'];
				$arResult['SECTIONS'][$key]['~PICTURE'] = $arSection['~PICTURE'];
			}
			if ($boolDescr)
			{
				$arResult['SECTIONS'][$key]['DESCRIPTION'] = $arSection['DESCRIPTION'];
				$arResult['SECTIONS'][$key]['~DESCRIPTION'] = $arSection['~DESCRIPTION'];
				$arResult['SECTIONS'][$key]['DESCRIPTION_TYPE'] = $arSection['DESCRIPTION_TYPE'];
				$arResult['SECTIONS'][$key]['~DESCRIPTION_TYPE'] = $arSection['~DESCRIPTION_TYPE'];
			}
		}
	}
}

// Add 3 elements for top sections

$depthLevel = $arResult['SECTION']['DEPTH_LEVEL']+1;
$id = $arResult['SECTION']['ID'];
$arFilter = Array('IBLOCK_ID'=> 1, 'GLOBAL_ACTIVE'=>'Y');
$arSelect = Array('ID','NAME','IBLOCK_SECTION_ID','DEPTH_LEVEL','SECTION_PAGE_URL');
//$arSelect = Array();
$db_list = CIBlockSection::GetList(Array('left_margin'=>'asc'), $arFilter, false, $arSelect);

$pre = 0;
$parent_id = "";
while($ar_result_sec = $db_list->GetNext())
{
	if(!$parent_id)
	{
		$parent_id = $ar_result_sec['ID'];
		$arResult['render'][$parent_id] = $ar_result_sec;
		$path = $ar_result_sec['SECTION_PAGE_URL'];
	}
	if(($pre>0) && ($pre >= $ar_result_sec['DEPTH_LEVEL']))
	{
		if($ar_result_sec['DEPTH_LEVEL'] == $depthLevel)
		{

			$parent_id = $ar_result_sec['ID'];
			$arResult['render'][$parent_id] = $ar_result_sec;
			$path = $ar_result_sec['SECTION_PAGE_URL'];
		}
	}
	$arResult['my_sections'][$ar_result_sec['ID']] = $ar_result_sec;
	if($ar_result_sec['DEPTH_LEVEL'] > $depthLevel)
	{
		$arResult['my_sections'][$ar_result_sec['ID']]['parent_id'] = $parent_id;
		$arResult['my_sections'][$ar_result_sec['ID']]['path'] = $path;
	} else {
		$arResult['my_sections'][$ar_result_sec['ID']]['parent_id'] = $parent_id;
		$arResult['my_sections'][$ar_result_sec['ID']]['path'] = $path;
	}
	$pre = $ar_result_sec['DEPTH_LEVEL'];
}

$arOrder = Array('active_from' => 'desc');
$arFilter = Array('IBLOCK_ID' => 1);
$arSelect = Array('ID','NAME','IBLOCK_SECTION_ID','PRICE_1','PREVIEW_PICTURE','DETAIL_PAGE_URL');
$arElements = CIBlockElement::GetList($arOrder,$arFilter,false,false,$arSelect);

while($ar_result = $arElements->GetNext())
{
	$arResult['my_elements'][$ar_result['ID']] = $ar_result;
	$section = $ar_result['IBLOCK_SECTION_ID'];
	$arResult['my_elements'][$ar_result['ID']]['parent_id'] = $arResult['my_sections'][$section]['parent_id'];
	if($arResult['my_elements'][$ar_result['ID']]['PREVIEW_PICTURE']){
		$arResult['my_elements'][$ar_result['ID']]['PREVIEW_PICTURE'] = CFile::GetFileArray($arResult['my_elements'][$ar_result['ID']]['PREVIEW_PICTURE']);
	}
}


foreach($arResult['SECTIONS'] as $key=>$section)
{
	$count = 0;
	foreach($arResult['my_elements'] as $element)
	{
		if($element['parent_id'] == $section['ID'])
		{
			$arResult['SECTIONS'][$key]['elements'][++$count] = $element;
			if($count >= $arParams['ELEMENT_COUNT'])
			{
				break;
			}
		}
	}
}
?>