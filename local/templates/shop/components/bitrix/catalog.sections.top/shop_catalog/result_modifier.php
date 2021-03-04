<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (empty($arResult))
	return;


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
		if($ar_result_sec['DEPTH_LEVEL'] == 1)
		{

			$parent_id = $ar_result_sec['ID'];
			$arResult['render'][$parent_id] = $ar_result_sec;
			$path = $ar_result_sec['SECTION_PAGE_URL'];
		}
	}
	$arResult['my_sections'][$ar_result_sec['ID']] = $ar_result_sec;
	if($ar_result_sec['DEPTH_LEVEL'] > 1)
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
	//$arResult['my_elements'][$ar_result['ID']]['DETAIL_PAGE_URL'] = $arResult['my_sections'][$section]['path']. $ar_result['CODE']."/";
	if($arResult['my_elements'][$ar_result['ID']]['PREVIEW_PICTURE']){
		$arResult['my_elements'][$ar_result['ID']]['PREVIEW_PICTURE'] = CFile::GetFileArray($arResult['my_elements'][$ar_result['ID']]['PREVIEW_PICTURE']);
	}
}


foreach($arResult['render'] as $section)
{
	$count = 0;
	foreach($arResult['my_elements'] as $element)
	{
		if($element['parent_id'] == $section['ID'])
		{
			$arResult['render'][$section['ID']]['elements'][++$count] = $element;
			if($count >= $arParams['ELEMENT_COUNT'])
			{
				break;
			}
		}
	}
}