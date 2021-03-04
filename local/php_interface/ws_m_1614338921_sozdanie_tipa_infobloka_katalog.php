<?php

/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1614338921_sozdanie_tipa_infobloka_katalog extends \WS\ReduceMigrations\Scenario\ScriptScenario {

    /**
     * Scenario title
     **/
    public static function name() {
        return 'Создание типа инфоблока Каталог';
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
        return '98024d6d936a42ef4c3b08485eb239f77163e265';
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
        // my code
        CModule::IncludeModule("iblock");
             $arFields = Array(
            'ID'=>'catalog',
            'SECTIONS'=>'Y',
            'IN_RSS'=>'N',
            'SORT'=>100,
            'LANG'=>Array(
                'ru'=>Array(
                    'NAME'=>'Каталог',
                    'SECTION_NAME'=>'Раздел',
                    'ELEMENT_NAME'=>'Элемент'
                    )
                )
            );

        $obBlocktype = new CIBlockType;
        $res = $obBlocktype->Add($arFields);
        if($res){
        $this->SetData(['ID'=>'catalog']);
        }
    }

    /**
     * Write action by rollback scenario. Use method `getData` for getting commit saved data.
     * For printing info into console use object from $this->printer() method.
     **/
    public function rollback() {
        // my code
        CModule::IncludeModule("iblock");
        $data = $this->getData();
        CIBlockType::Delete($data['ID']);
    }
}
