<?
include_once "include/helper.php";
include_once "include/handlers.php";
include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/wsrubi.smtp/classes/general/wsrubismtp.php");
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("Handlers", "OnBeforeIBlockElementSectionUpdateHandler"));
AddEventHandler("iblock", "OnBeforeIBlockSectionUpdate", Array("Handlers", "OnBeforeIBlockElementSectionUpdateHandler"));
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", Array("Handlers", "OnBeforeIBlockElementSectionUpdateHandler"));
AddEventHandler("iblock", "OnBeforeIBlockSectionAdd", Array("Handlers", "OnBeforeIBlockElementSectionUpdateHandler"));
