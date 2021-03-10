<?php

/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1615352486_sozdanie_pochtovogo_shablona_formy_zapis_na_ustanovku extends \WS\ReduceMigrations\Scenario\ScriptScenario {

    /**
     * Scenario title
     **/
    public static function name() {
        return 'Создание почтового шаблона формы Запись на установку';
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
        return 'f273f9637a3ba1e32bcbec34ec3d87c4ce56d7c9';
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
        $arFields = array(
            "ACTIVE" => "Y",
            "EVENT_NAME" => "FEEDBACK_FORM",
            "LID" => array("s1"),
            "EMAIL_FROM" => "#DEFAULT_EMAIL_FROM#",
            "EMAIL_TO" => "#EMAIL_TO#",
            "LANGUAGE_ID" => "ru",
            "SUBJECT" => "#SITE_NAME#: Запись на установку",
            "BODY_TYPE" => "text",
            "MESSAGE" => "
Информационное сообщение сайта #SITE_NAME#
------------------------------------------



Автор: #AUTHOR#
E-mail автора: #AUTHOR_EMAIL#

Номер телефона: #PHONE#

Сообщение сгенерировано автоматически.
",
        );


        $emess = new CEventMessage;
        $idEmess = $emess->Add($arFields);
        $this->SetData(["ID"=>$idEmess]);
    }

    /**
     * Write action by rollback scenario. Use method `getData` for getting commit saved data.
     * For printing info into console use object from $this->printer() method.
     **/
    public function rollback() {
        $idEmess = $this->getData()["ID"];
        $emess = new CEventMessage;
        $emess->Delete($idEmess);
    }
}
