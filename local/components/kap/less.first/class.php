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
        $iblockId = $this->arParams['IBLOCK_ID'];
        $this->arResult['IBLOCK_ID'] = $iblockId;

        $userFields = \Bitrix\Main\UserFieldTable::getList([
            'select' => ['FIELD_NAME', 'ENTITY_ID'],
            'filter' => ['=ENTITY_ID' => 'IBLOCK_' . $iblockId . '_SECTION']
        ]);
        while ($field = $userFields->fetch()) {
            $this->arResult['USER_FIELDS'][] = $field['FIELD_NAME'];
        }
        if (!empty($this->arResult['USER_FIELDS'])) {
            $entity = \Bitrix\Iblock\Model\Section::compileEntityByIblock($iblockId);
            $userFieldsValue = $entity::getList([
                'select' => array_merge($this->arResult['USER_FIELDS'], ['ID']),
                'filter' => ['IBLOCK_ID' => $iblockId],
            ]);
            while ($values = $userFieldsValue->fetch()) {
                $sectionId = $values['ID'];
                foreach ($values as $key => $value) {
                    if ($key != "ID") {
                        if ($value != false) {
                            $this->arResult['USER_FIELDS']['VALUE'][$sectionId][$key] = $value;
                        }
                    }
                }
            }
        }
    }
}

