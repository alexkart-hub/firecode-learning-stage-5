<?
function getIblocIdByCode($code){
    $res = CIBlock::GetList(
                    Array(),
                    Array("CODE"=>$code),
                    true
                );
    return $res->Fetch()['ID'];
}
