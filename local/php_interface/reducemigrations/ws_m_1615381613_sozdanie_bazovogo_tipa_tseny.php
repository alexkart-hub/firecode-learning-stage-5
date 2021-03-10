<?php

/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1615381613_sozdanie_bazovogo_tipa_tseny extends \WS\ReduceMigrations\Scenario\ScriptScenario {

    /**
     * Scenario title
     **/
    public static function name() {
        return 'Создание базового типа цены';
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
        return 'eb8f9b2132425594630889d709abd5aa1a67242f';
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
        CModule::IncludeModule("catalog");
        $arFields = array(
            "BASE" => "Y",
            "NAME" => "retail",
            "XML_ID" => "XML_retail",
            "SORT" => 100,
            "USER_GROUP" => array(1, 2, 3, 4),
            "USER_GROUP_BUY" => array(1, 2, 3, 4),
            "USER_LANG" => array(
                "ru" => "Розничная",
                "en" => "Retail"
            )
        );

        $id = CCatalogGroup::Add($arFields);
        $this->setData(['ID'=>$id]);
    }

    /**
     * Write action by rollback scenario. Use method `getData` for getting commit saved data.
     * For printing info into console use object from $this->printer() method.
     **/
    public function rollback() {
        CModule::IncludeModule("catalog");
        $id = $this->getData()['ID'];
        CCatalogGroup::Update($id, ["BASE"=>"N"]);
        CCatalogGroup::Delete($id);
    }
}
