<?
$arFilter = array("IBLOCK_ID" => $arParams['IBLOCK_ID'],"ID" => $arResult['VARIABLES']['SECTION_ID']);
$arDate = CIBlockSection::GetList(Array(),$arFilter,true,array("DESCRIPTION","UF_SEO_TITLE"));
$arResult['ITEM'] = $arDate->GetNext();

$arSectionsFilter = array("IBLOCK_ID" =>  $arParams['IBLOCK_ID'], "DEPTH_LEVEL" => 1);
$arSectionsSelect = array("ID","CODE" );
$rsSectionsList = CIBlockSection::GetList(Array(),$arSectionsFilter,false,$arSectionsSelect);

$key = 0;
while($arSectionsList = $rsSectionsList -> GetNext())
{
	$arResult['SECTIONS_LIST'][$key++] = $arSectionsList;
}