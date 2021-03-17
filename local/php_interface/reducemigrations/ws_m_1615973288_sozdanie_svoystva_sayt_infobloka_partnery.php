<?php

use Bitrix\Iblock\PropertyTable;

/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1615973288_sozdanie_svoystva_sayt_infobloka_partnery extends \WS\ReduceMigrations\Scenario\ScriptScenario {

    /**
     * Scenario title
     **/
    public static function name() {
        return 'Создание свойства сайт инфоблока Партнеры';
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
        return 'd410d9f7f7490bbff04d57dd69d63782b67e3175';
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
        $iblockId = getIblockIdByCode('contractors');
        $id = PropertyTable::add([
            'IBLOCK_ID' => $iblockId,
            'ACTIVE' => 'Y',
            'NAME' => 'Сайт',
            'CODE' => 'site',
            'PROPERTY_TYPE' => 'S',
        ])->getId();
        $this->setData(['ID'=>$id]);
    }

    /**
     * Write action by rollback scenario. Use method `getData` for getting commit saved data.
     * For printing info into console use object from $this->printer() method.
     **/
    public function rollback() {
        \Bitrix\Main\Loader::includeModule('iblock');
        $id = $this->getData()['ID'];
        PropertyTable::delete($id);
    }
}
