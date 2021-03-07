<?php

/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1615140262_dobavit_polzovatelskie_polya_v_infoblok_katalog extends \WS\ReduceMigrations\Scenario\ScriptScenario {

    /**
     * Scenario title
     **/
    public static function name() {
        return 'Добавить пользовательские поля в инфоблок Каталог';
    }

    /**
     * Priority of scenario
     **/
    public static function priority() {
        return self::PRIORITY_MEDIUM;
    }

    /**
     * @return string hash
     */
    public static function hash() {
        return '61d0c6be4c57a4dc3d4f0b311ca8d39eae73f659';
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
        //получаю id инфоблока "Каталог"
        CModule::IncludeModule("iblock");
        $res = CIBlock::GetList(
            Array(),
            Array("CODE"=>'catalog'),
            true
        );
        $iblockId = $res->Fetch()['ID'];

        $cUserTypeEntity = new CUserTypeEntity();

        //заполняю свойства ползовательских полей

        //поле: Показывать на главной странице
        $arUserFields = array(
            'ENTITY_ID' => 'IBLOCK_'.$iblockId.'_SECTION',
            'FIELD_NAME' => 'UF_SHOW_ON_MAIN',
            'USER_TYPE_ID' => 'boolean',
            'XML_ID' => 'XML_ID_SHOW_ON_MAIN',
            'SORT' => 100,
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => '',
            'EDIT_IN_LIST' => '',
            'SETTINGS'          => array(
                'DEFAULT_VALUE' => '',
            ),
            'EDIT_FORM_LABEL'   => array(
                'ru'    => 'Показывать на главной странице',
                'en'    => 'Show on main page',
            ),
            'LIST_COLUMN_LABEL' => array(
                'ru'    => 'Показывать на главной странице',
                'en'    => 'Show on main page',
            ),
            'LIST_FILTER_LABEL' => array(
                'ru'    => 'Показывать на главной странице',
                'en'    => 'Show on main page',
            ),
        );
        $arIds[]   = $cUserTypeEntity->Add($arUserFields);

        //поле: Картинка для главной страницы (при наведении)
        $arUserFields = array(
            'ENTITY_ID' => 'IBLOCK_'.$iblockId.'_SECTION',
            'FIELD_NAME' => 'UF_PICTURE_ACTIVE',
            'USER_TYPE_ID' => 'file',
            'XML_ID' => 'XML_ID_PICTURE_ACTIVE',
            'SORT' => 300,
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => '',
            'EDIT_IN_LIST' => '',
            'EDIT_FORM_LABEL'   => array(
                'ru'    => 'Картинка для главной страницы (при наведении)',
                'en'    => 'Picture for main page (where hover)',
            ),
            'LIST_COLUMN_LABEL' => array(
                'ru'    => 'Картинка для главной страницы (при наведении)',
                'en'    => 'Picture for main page (where hover)',
            ),
            'LIST_FILTER_LABEL' => array(
                'ru'    => 'Картинка для главной страницы (при наведении)',
                'en'    => 'Picture for main page (where hover)',
            ),
        );
        $arIds[]   = $cUserTypeEntity->Add($arUserFields);

        $this->SetData(['ids' => $arIds]);
    }

    /**
     * Write action by rollback scenario. Use method `getData` for getting commit saved data.
     * For printing info into console use object from $this->printer() method.
     **/
    public function rollback() {
        $data = $this->GetData();
        $ids = $data['ids'];
        $cUserTypeEntity = new CUserTypeEntity();
        foreach ($ids as $id) {
            $cUserTypeEntity->Delete($id);
        }
    }
}
