<?
/**
 * @param $code
 * @return string
 */
function getIblockIdByCode($code){
    $res = CIBlock::GetList(
                    Array(),
                    Array("CODE"=>$code),
                    true
                );
    return $res->Fetch()['ID'];
}
/**
 * @param string $code
 * @param string $iblock_id
 * @return string
 */
function getSectionIdByCode($code, $iblock_id){
    $res = CIBlockSection::GetList(
        Array(),
        Array("CODE"=>$code,"IBLOCK_ID" => $iblock_id),
        true
    );
    return $res->Fetch()['ID'];
}/**
 * @param string $code
 * @param string $iblock_id
 * @return string
 */
function getEventIdBySubject($subject,$typeId){
    $arFilter = Array(
        "TYPE_ID"       => $typeId,
        "SUBJECT"       => $subject,
    );

    $rsMess = CEventMessage::GetList($by="site_id", $order="desc", $arFilter);


    return $rsMess->Fetch()['ID'];
}
