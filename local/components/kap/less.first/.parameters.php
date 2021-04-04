<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\TypeLanguageTable;
use Bitrix\Iblock\TypeTable;
use Bitrix\Main\Loader;

if (!Loader::IncludeModule("iblock"))
    return;

//IB types
$arIBTypes = [];
$rsIBTypes = TypeTable::getList([
    'order' => array('ID' => 'ASC'),
]);
while ($IBTypes = $rsIBTypes->fetch()) {
    $rsIBTypesLang = TypeLanguageTable::getList([
        'filter' => array('IBLOCK_TYPE_ID' => $IBTypes['ID'], 'LANGUAGE_ID' => LANG),
        'select' => array('NAME'),
    ]);
    $arIBTypes[$IBTypes['ID']] = $rsIBTypesLang->fetch()['NAME'];
}

//IB
$arIBlocks = [];
$arIBlockCodes = [];
$rsIBlocks = IblockTable::getList([
    'order' => array('ID' => 'ASC'),
    'filter' => array(
        'IBLOCK_TYPE_ID' => ($arCurrentValues["IBLOCK_TYPE"] != "-"
            ? $arCurrentValues["IBLOCK_TYPE"]
            : ""),
    ),
]);
while ($Iblock = $rsIBlocks->fetch()) {
    $arIBlocks[$Iblock["CODE"]] = $Iblock["NAME"];
}

$arComponentParameters = array(
    "GROUPS" => array(
        "SETTINGS_IB" => array(
            "NAME" => 'Инфоблок',
            "SORT" => 20
        ),
    ),
    "PARAMETERS" => array(

        "IBLOCK_TYPE" => array(
            "PARENT" => "SETTINGS_IB",
            "NAME" => "Тип инфоблока",
            "TYPE" => "LIST",
            "VALUES" => $arIBTypes,
            "DEFAULT" => "",
            "REFRESH" => "Y",
            "SORT" => 10,
        ),

        "IBLOCK_CODE" => array(
            "PARENT" => "SETTINGS_IB",
            "NAME" => "Наименование инфоблока",
            "TYPE" => "LIST",
            "VALUES" => $arIBlocks,
            "DEFAULT" => "",
            "REFRESH" => "Y",
            "SORT" => 20,
        ),


        "CACHE_TIME" => array(
            "DEFAULT" => 3600,
        ),
        "CACHE_GROUPS" => array(
            "PARENT" => "CACHE_SETTINGS",
            "NAME" => "Кеш",
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
        ),

    ),
);
