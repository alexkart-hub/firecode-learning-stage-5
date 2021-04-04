<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CMain $APPLICATION
 */
class KapLessFirst extends CBitrixComponent
{
    public function executeComponent()
    {
        global $APPLICATION;
        $this->prepareParams();
        $this->prepareArResult();
        $this->includeComponentTemplate();
    }

    protected function prepareParams()
    {
        $this->arParams['NAME'] = $this->arResult['NAME'];
    }

    protected function prepareArResult()
    {
        $iblockCode = $this->arParams['IBLOCK_CODE'];
        $iblockId = getIblockIdByCode($iblockCode);
        $this->arResult['IBLOCK_ID'] = $iblockId;

        $arUserFields = [];
        $userFields = \Bitrix\Main\UserFieldTable::getList([
            'select' => ['FIELD_NAME', 'ENTITY_ID'],
            'filter' => ['=ENTITY_ID' => 'IBLOCK_' . $iblockId . '_SECTION']
        ]);
        while ($field = $userFields->fetch()) {
            $arUserFields[] = $field['FIELD_NAME'];
        }
        if (!empty($arUserFields)) {
            $entity = \Bitrix\Iblock\Model\Section::compileEntityByIblock($iblockId);
            $userFieldsValue = $entity::getList([
                'select' => array_merge($arUserFields, ['ID']),
                'filter' => ['IBLOCK_ID' => $iblockId],
            ]);
            while ($values = $userFieldsValue->fetch()) {
                $sectionId = $values['ID'];
                foreach ($values as $key => $value) {
                    if ($key != "ID") {
                        if ($value != false) {
                            $arUserFields['VALUE'][$sectionId][$key] = $value;
                        }
                    }
                }
            }
            $this->arResult['USER_FIELDS']['SECTIONS'] = $arUserFields;
        }

        $iblock = \Bitrix\Iblock\Iblock::wakeUp($iblockId);
        $arProperties = [];
        $userProperties = \Bitrix\Iblock\PropertyTable::getList([
            'select' => ['NAME', 'CODE', 'ID'],
            'filter' => ['=IBLOCK_ID' => $iblockId],
        ]);
        while ($property = $userProperties->fetch()) {
            $arProperties['PROPERTIES'][] = $property['CODE'];
//            $arProperties[$property['ID']]['NAME'] = $property['NAME'];
//            $arProperties[$property['ID']]['CODE'] = $property['CODE'];
        }
        if (!empty($arProperties)) {
            $this->arResult['USER_FIELDS']['ELEMENTS'] = $arProperties;
            $elements = $iblock->getEntityDataClass()::getList([
                'select' => array_merge(['ID'], $arProperties['PROPERTIES']),
            ]);

            while ($element = $elements->fetch()) {
                foreach($arProperties['PROPERTIES'] as $property){
                    $arProperties['VALUE'][$element['ID']][$property] =
                        $element['IBLOCK_ELEMENTS_ELEMENT_'.strtoupper($iblockCode).'_'.$property.'_VALUE'];
                }

            }
            $this->arResult['USER_FIELDS']['ELEMENTS']['VALUE'] = $arProperties['VALUE'];
        }
    }
}

