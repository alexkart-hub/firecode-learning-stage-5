<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "first",
	"DESCRIPTION" => "Первый",
	//"ICON" => "/images/bitrix_tv.gif",
	"COMPLEX" => "N",
//	"PATH" => array(
//		"ID" => "content",
//		"CHILD" => array(
//			"ID" => "media",
//			"NAME" => GetMessage("BITRIXTVBIG_COMPONENTS"),
//		),
//	),
    "PATH" => array(
        "ID"=>"less",
        "NAME"=>"Учебный",
    ),
);
?>