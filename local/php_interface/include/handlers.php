<?
class Handlers
{
    public function OnBeforeIBlockElementSectionUpdateHandler(&$arFields)
    {
        if(strlen($arFields["CODE"])<=0)
        {
            $arFields["CODE"] = CUtil::translit(
                $arFields['NAME'],
                'ru',
                [
                    'max_len' => 100,
                    'change_case' => 'L',
                    'replace_space' => '-',
                ]
            );
        }

    }
 }
