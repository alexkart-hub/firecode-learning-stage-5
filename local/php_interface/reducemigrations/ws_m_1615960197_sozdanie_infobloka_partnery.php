<?php

use Bitrix\Iblock\IblockFieldTable;
use Bitrix\Iblock\IblockGroupTable;
use Bitrix\Iblock\IblockSiteTable;
use Bitrix\Iblock\IblockTable;

/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1615960197_sozdanie_infobloka_partnery extends \WS\ReduceMigrations\Scenario\ScriptScenario {

    /**
     * Scenario title
     **/
    public static function name() {
        return 'Создание инфоблока Партнеры';
    }

    /**
     * Priority of scenario
     **/
    public static function priority() {
        return self::PRIORITY_HIGH;
    }

    /**
     * @return string hash
     */
    public static function hash() {
        return '32323f1cca6fb98535aac07fbd4a1d80000d125d';
    }

    /**
     * @return int approximately time in seconds
     */
    public static function approximatelyTime() {
        return 0;
    }

    /**
     * Writes action by apply scenario. Use method `setData` to save needed rollback data.
     * For printing info into console use object from $this->printer() method.
     **/
    public function commit() {
        \Bitrix\Main\Loader::includeModule('iblock');
        $id = IblockTable::add([
            'LID'=>'s1',
            'CODE'=>'contractors',
            'IBLOCK_TYPE_ID'=>'catalog',
            'NAME'=>'Партнеры',
            'ACTIVE'=>'Y',
            'LIST_PAGE_URL' => '/partners/',
            'SECTION_PAGE_URL' => '/partners/#SECTION_CODE#/',
            'DETAIL_PAGE_URL' => '/partners/#SECTION_CODE#/#ELEMENT_CODE#',
            'GROUP_ID' => array('2' => 'R'),
        ])->getId();
        $this->setData(['ID'=>$id]);
        IblockSiteTable::add([
            'IBLOCK_ID'=>$id,
            'SITE_ID'=>'s1',
        ]);
        IblockGroupTable::add([
            'IBLOCK_ID'=>$id,
            'GROUP_ID'=>2,
            'PERMISSION'=>'R',
        ]);
        IblockGroupTable::add([
            'IBLOCK_ID'=>$id,
            'GROUP_ID'=>1,
            'PERMISSION'=>'X',
        ]);
        $arFields = array(
            "ACTIVE_FROM" => array(
                "IS_REQUIRED" => "N",
                "DEFAULT_VALUE" => "=now"
            ),
            "PREVIEW_PICTURE" => array(
                "IS_REQUIRED" => "N",
                "DEFAULT_VALUE" => array(
                    "FROM_DETAIL" => "Y",
                    "UPDATE_WITH_DETAIL" => "Y",
                    "DELETE_WITH_DETAIL" => "Y",
                    "SCALE" => "Y",
                    "WIDTH" => "300",
                    "HEIGHT" => "300",
                )
            ),
            "DETAIL_PICTURE" => array(
                "IS_REQUIRED" => "N",
                "DEFAULT_VALUE" => array(
                    "SCALE" => "Y",
                    "WIDTH" => "1000",
                    "HEIGHT" => "1000",
                )
            ),
            "CODE" => array(
                "IS_REQUIRED" => "N",
                "DEFAULT_VALUE" => array(
                    "UNIQUE" => "Y",
                    "TRANSLITERATION" => "Y",
                    "TRANS_CASE" => "L",
                    "TRANS_SPACE"=> "-",
                )
            ),
            "SECTION_PICTURE" => array(
                "IS_REQUIRED" => "N",
                "DEFAULT_VALUE" => array(
                    "FROM_DETAIL" => "Y",
                    "UPDATE_WITH_DETAIL" => "Y",
                    "DELETE_WITH_DETAIL" => "Y",
                    "SCALE" => "Y",
                    "WIDTH" => "300",
                    "HEIGHT" => "300",
                )
            ),
            "SECTION_DETAIL_PICTURE" => array(
                "IS_REQUIRED" => "N",
                "DEFAULT_VALUE" => array(
                    "SCALE" => "Y",
                    "WIDTH" => "1000",
                    "HEIGHT" => "1000",
                )
            ),
            "SECTION_CODE" => array(
                "IS_REQUIRED" => "N",
                "DEFAULT_VALUE" => array(
                    "UNIQUE" => "Y",
                    "TRANSLITERATION" => "Y",
                    "TRANS_CASE" => "L",
                    "TRANS_SPACE"=> "-",
                )
            ),
        );
        CIBlock::SetFields(
            $id,
            $arFields
        );
//        foreach ($arFields as $fieldId=>$value) {
//            IblockFieldTable::add([
//                'IBLOCK_ID'=>$id,
//                'FIELD_ID'=>$fieldId,
//                'IS_REQUIRED'=>$value['IS_REQUIRED'],
//                'DEFAULT_VALUE'=>$value['DEFAULT_VALUE'],
//            ]);
//        }
    }

    /**
     * Write action by rollback scenario. Use method `getData` for getting commit saved data.
     * For printing info into console use object from $this->printer() method.
     **/
    public function rollback() {
        \Bitrix\Main\Loader::includeModule('iblock');
        $id = $this->getData()['ID'];
        IblockTable::Delete($id);
        IblockGroupTable::Delete([
            'IBLOCK_ID'=>$id,
        ]);
        IblockSiteTable::Delete([
            'IBLOCK_ID'=>$id,
        ]);
        IblockFieldTable::Delete([
            'IBLOCK_ID'=>$id,
        ]);
    }
}
