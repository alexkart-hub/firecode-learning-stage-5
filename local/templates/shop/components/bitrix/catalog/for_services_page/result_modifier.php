<?
$arFilter = array("IBLOCK_ID" => $arParams['IBLOCK_ID'],"ID" => $arResult['VARIABLES']['SECTION_ID']);
$arData = CIBlockSection::GetList(Array(),$arFilter,true);
$arResult['ITEM'] = $arData->GetNext();