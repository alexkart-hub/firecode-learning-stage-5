<?
foreach($arResult as $key=>$item)
{
	if(substr($item['LINK'],0,9) == "/catalog/"){
		$arResult[$key]['LINK'] = $item['LINK']."?clear_cache=Y";
	}
}
