<?php

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
    }
}
