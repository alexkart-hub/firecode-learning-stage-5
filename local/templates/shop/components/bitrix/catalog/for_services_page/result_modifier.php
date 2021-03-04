<?
$arFilter = array("IBLOCK_ID" => $arParams['IBLOCK_ID'],"ID" => $arResult['VARIABLES']['SECTION_ID']);
$arDate = CIBlockSection::GetList(Array(),$arFilter,true);
$arResult['ITEM'] = $arDate->GetNext();