<?php

/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1614872368_sozdanie_infobloka_stati extends \WS\ReduceMigrations\Scenario\ScriptScenario {

    /**
     * Scenario title
     **/
    public static function name() {
        return 'Создание инфоблока Статьи';
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
        return '9b4c3e6ee01072a90a1b65af0384b2b288b3f85f';
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
    public function commit()
    {
        CModule::IncludeModule("iblock");
        $ib = new CIBlock;
        $arFields = array(
            "ACTIVE" => "Yes",
            "NAME" => "Статьи",
            "CODE" => "articles",
            "IBLOCK_TYPE_ID" => "information",
            "SITE_ID" => array("s1"),
            "LID" => "s1",
            "SORT" => 500,
            "LIST_PAGE_URL" => "#SITE_DIR#/articles/index.php?ID=#IBLOCK_ID#",
            "SECTION_PAGE_URL" => "#SITE_DIR#/articles/list.php?SECTION_ID=#SECTION_ID#",
            "DETAIL_PAGE_URL" => "#SITE_DIR#/articles/detail.php?ID=#ELEMENT_ID#",
            "PICTURE" => "",
            "DESCRIPTION" => "",
            "DESCRIPTION_TYPE" => "text",
            "GROUP_ID" => array("2" => "R"),
            "SECTIONS_NAME" => "Разделы",
            "SECTION_NAME" => "Раздел",
            "SECTION_ADD" => "Добавить раздел",
            "SECTION_EDIT" => "Изменить раздел",
            "SECTION_DELETE" => "Удалить раздел",
            "ELEMENTS_NAME" => "Статья",
            "ELEMENT_NAME" => "Статья",
            "ELEMENT_ADD" => "Добавить статью",
            "ELEMENT_EDIT" => "Изменить статью",
            "ELEMENT_DELETE" => "Удалить статью",
        );
        $id = $ib->Add($arFields);
        $this->SetData(["id" => $id]);
        $arFieldsElement = array(
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
                "IS_REQUIRED" => "Y",
                "DEFAULT_VALUE" => array(
                    "UNIQUE" => "Y",
                    "TRANSLITERATION" => "Y",
                    "TRANS_CASE" => "L",
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
                "IS_REQUIRED" => "Y",
                "DEFAULT_VALUE" => array(
                    "UNIQUE" => "Y",
                    "TRANSLITERATION" => "Y",
                    "TRANS_CASE" => "L",
                )
            ),
        );
        CIBlock::SetFields(
            $id,
            $arFieldsElement
        );
    }

    /**
     * Write action by rollback scenario. Use method `getData` for getting commit saved data.
     * For printing info into console use object from $this->printer() method.
     **/
    public function rollback()
    {
        CModule::IncludeModule("iblock");
        $data = $this->GetData();
        CIBlock::Delete($data["id"]);
    }
}
