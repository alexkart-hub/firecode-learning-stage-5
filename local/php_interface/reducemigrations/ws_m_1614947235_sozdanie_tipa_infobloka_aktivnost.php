<?php

/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1614947235_sozdanie_tipa_infobloka_aktivnost extends \WS\ReduceMigrations\Scenario\ScriptScenario {

    /**
     * Scenario title
     **/
    public static function name() {
        return 'Создание типа инфоблока Активность';
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
        return '901fe89f4f5f7c6b98d11e4cbf934e0453b3468a';
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
            'ID'=>'activity',
            'SECTIONS'=>'Y',
            'IN_RSS'=>'N',
            'SORT'=>100,
            'LANG'=>Array(
                'ru'=>Array(
                    'NAME'=>'Активность',
                    'SECTION_NAME'=>'Раздел',
                    'ELEMENT_NAME'=>'Элемент'
                )
            )
        );

        $obBlocktype = new CIBlockType;
        $res = $obBlocktype->Add($arFields);
        if($res){
            $this->SetData(['ID'=>$arFields['ID']]);
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
