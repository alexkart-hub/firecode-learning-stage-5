<?

use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\SectionTable;

function debug($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

/** D7
 * @param $code
 * @return string
 */
function getIblockIdByCode($code)
{
    $id = IblockTable::getList([
        'filter' => [
            'CODE' => $code,
        ],
        'select' => [
            'ID',
        ],
    ])->fetch()['ID'];
    return $id;
}

function getElementIdByCode($code)
{
    $id = ElementTable::getList([
        'filter' => [
            'CODE' => $code,
        ],
        'select' => [
            'ID',
        ],
    ])->fetch()['ID'];
    return $id;
}

/**
 * @param string $code
 * @param string $iblock_id
 * @return string
 */
function getSectionIdByCode($code, $iblock_id)
{
    $res = CIBlockSection::GetList(
        array(),
        array("CODE" => $code, "IBLOCK_ID" => $iblock_id),
        true
    );
    return $res->Fetch()['ID'];
}

function getSectionCodeById($id)
{
    $res = CIBlockSection::GetList(
        array(),
        array("ID" => $id),
        false,
        array('CODE')
    );
    return $res->Fetch()['CODE'];
}

/**
 * @param string $code
 * @param string $iblock_id
 * @return string
 */
function getEventIdBySubject($subject, $typeId)
{
    $arFilter = array(
        "TYPE_ID" => $typeId,
        "SUBJECT" => $subject,
    );

    $rsMess = CEventMessage::GetList($by = "site_id", $order = "desc", $arFilter);

    return $rsMess->Fetch()['ID'];
}

function getElementParentId($elementId){
    $res = ElementTable::getList([
        'filter' => [
            'ID' => $elementId,
        ],
        'select' => [
            'IBLOCK_SECTION_ID',
        ],
    ])->fetch()['IBLOCK_SECTION_ID'];
    return $res;
}

function getSectionParentId($sectionId)
{
    $res = SectionTable::getList([
        'filter' => [
            'ID' => $sectionId,
        ],
        'select' => [
            'IBLOCK_SECTION_ID',
        ],
    ])->fetch()['IBLOCK_SECTION_ID'];
    return $res;
}

function getElementGrandParentID($elementId)
{
    $sectionId = getElementParentId($elementId);
    $id = getSectionParentId($sectionId);
    while ($id){
        $sectionId = $id;
        $id = getSectionParentId($sectionId);
    }
    return $sectionId;
}
