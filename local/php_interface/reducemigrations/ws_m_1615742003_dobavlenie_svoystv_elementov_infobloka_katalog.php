<?php

use Bitrix\Iblock\PropertyEnumerationTable;
use Bitrix\Iblock\PropertyTable;
use Bitrix\Iblock\SectionPropertyTable;

/**
 * Class definition update migrations scenario actions
 **/
class ws_m_1615742003_dobavlenie_svoystv_elementov_infobloka_katalog extends \WS\ReduceMigrations\Scenario\ScriptScenario
{

    /**
     * Scenario title
     **/
    public static function name()
    {
        return 'Добавление свойств элементов инфоблока Каталог';
    }

    /**
     * Priority of scenario
     **/
    public static function priority()
    {
        return self::PRIORITY_HIGH;
    }

    /**
     * @return string hash
     */
    public static function hash()
    {
        return 'ce64219f9f6c8b1fd4e2c75470b5298fc6e4830f';
    }

    /**
     * @return int approximately time in seconds
     */
    public static function approximatelyTime()
    {
        return 0;
    }

    /**
     * Writes action by apply scenario. Use method `setData` to save needed rollback data.
     * For printing info into console use object from $this->printer() method.
     **/
    public function commit()
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        $iblockId = getIblockIdByCode('catalog');
        //--- добавляю свойства
        $ids['prop'][0] = PropertyTable::add([
            'IBLOCK_ID' => $iblockId,
            'ACTIVE' => 'Y',
            'NAME' => 'Производитель',
            'CODE' => 'manufacturer',
            'PROPERTY_TYPE' => 'S',
        ])->getId();

        $ids['prop'][1] = PropertyTable::add([
            'IBLOCK_ID' => $iblockId,
            'ACTIVE' => 'Y',
            'NAME' => 'Цвет',
            'CODE' => 'color',
            'PROPERTY_TYPE' => 'L',
        ])->getId();

        $ids['prop'][2] = PropertyTable::add([
            'IBLOCK_ID' => $iblockId,
            'ACTIVE' => 'Y',
            'NAME' => 'Артикул',
            'CODE' => 'artikle',
            'PROPERTY_TYPE' => 'S',
        ])->getId();
        //--- добавляю свойства в умный фильтр
        foreach ($ids['prop'] as $key => $id) {
            if ($key <> 2) {
                SectionPropertyTable::add([
                    'IBLOCK_ID' => $iblockId,
                    'SECTION_ID' => 0,
                    'PROPERTY_ID' => $id,
                    'SMART_FILTER' => 'Y',
                    'DISPLAY_TYPE' => 'F',
                    'DISPLAY_EXPANDED' => 'N'
                ]);
            }
        }
        //--- заполняю свойство Цвет значениями
        $enumPropId = $ids['prop'][1];
        $ids['enum'][] = PropertyEnumerationTable::add([
            'PROPERTY_ID' => $enumPropId,
            "XML_ID" => "red",
            "VALUE" => "Красный",
            "DEF" => "N",
            "SORT" => "100"
        ])->getId();
        $ids['enum'][] = PropertyEnumerationTable::add([
            'PROPERTY_ID' => $enumPropId,
            "XML_ID" => "black",
            "VALUE" => "Черный",
            "DEF" => "Y",
            "SORT" => "200"
        ])->getId();
        $ids['enum'][] = PropertyEnumerationTable::add([
            'PROPERTY_ID' => $enumPropId,
            "XML_ID" => "blue",
            "VALUE" => "Синий",
            "DEF" => "N",
            "SORT" => "300"
        ])->getId();
        $ids['enum'][] = PropertyEnumerationTable::add([
            'PROPERTY_ID' => $enumPropId,
            "XML_ID" => "brown",
            "VALUE" => "Коричневый",
            "DEF" => "N",
            "SORT" => "400"
        ])->getId();
        $ids['enum'][] = PropertyEnumerationTable::add([
            'PROPERTY_ID' => $enumPropId,
            "XML_ID" => "white",
            "VALUE" => "Белый",
            "DEF" => "N",
            "SORT" => "500"
        ])->getId();
        $ids['enum'][] = PropertyEnumerationTable::add([
            'PROPERTY_ID' => $enumPropId,
            "XML_ID" => "grey",
            "VALUE" => "Серый",
            "DEF" => "N",
            "SORT" => "600"
        ])->getId();
        //--- для удаления значений из списка требуется id свойства
        $ids['enum_prop_id'] = $enumPropId;
        $this->setData($ids);
    }


    /**
     * Write action by rollback scenario. Use method `getData` for getting commit saved data.
     * For printing info into console use object from $this->printer() method.
     **/
    public function rollback()
    {
        \Bitrix\Main\Loader::includeModule('iblock');
        $data = $this->getData();
        $enumPropId = $data['enum_prop_id'];
        foreach ($data['prop'] as $propId) {
            PropertyTable::delete($propId);
        }
        foreach ($data['enum'] as $enumId) {
            PropertyEnumerationTable::delete(['ID'=>$enumId,'PROPERTY_ID'=>$enumPropId]);
        }
    }
}
