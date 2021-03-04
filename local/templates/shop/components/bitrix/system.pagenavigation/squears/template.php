<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

$colorSchemes = array(
	"green" => "bx-green",
	"yellow" => "bx-yellow",
	"red" => "bx-red",
	"blue" => "bx-blue",
);
?>
<div class="pagination">
	<ul>
		<?if($arResult["bDescPageNumbering"] === true):?>

			<?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
				<?if($arResult["bSavePage"]):?>
					<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" class="pagination_icon arrow_left"></a></li>
					<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">1</a></li>
				<?else:?>
					<?if (($arResult["NavPageNomer"]+1) == $arResult["NavPageCount"]):?>
						<li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="pagination_icon arrow_left"></a></li>
					<?else:?>
						<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>" class="pagination_icon arrow_left"></a></li>
					<?endif?>
					<li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a></li>
				<?endif?>
			<?else:?>
					<li><span class="pagination_icon arrow_left"></span></li>
					<li><span class="active">1</span></li>
			<?endif?>

			<?
			$arResult["nStartPage"]--;
			while($arResult["nStartPage"] >= $arResult["nEndPage"]+1):
			?>
				<?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>

				<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
					<li><span class="active"><?=$NavRecordGroupPrint?></span></li>
				<?else:?>
					<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$NavRecordGroupPrint?></a></li>
				<?endif?>

				<?$arResult["nStartPage"]--?>
			<?endwhile?>

			<?if ($arResult["NavPageNomer"] > 1):?>
				<?if($arResult["NavPageCount"] > 1):?>
					<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=$arResult["NavPageCount"]?></a></li>
				<?endif?>
					<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>" class="pagination_icon arrow_right"></a></li>
			<?else:?>
				<?if($arResult["NavPageCount"] > 1):?>
					<li><span class="active"><?=$arResult["NavPageCount"]?></span></li>
				<?endif?>
					<li><span class="pagination_icon arrow_right"></span></li>
			<?endif?>

		<?else:?>

			<?if ($arResult["NavPageNomer"] > 1):?>
				<?if($arResult["bSavePage"]):?>
					<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"  class="pagination_icon arrow_left"></a></li>
					<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a></li>
				<?else:?>
					<?if ($arResult["NavPageNomer"] > 2):?>
						<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"  class="pagination_icon arrow_left"></a></li>
					<?else:?>
						<li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"class="pagination_icon arrow_left"></a></li>
					<?endif?>
					<li><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a></li>
				<?endif?>
			<?else:?>
					<li><span  class="pagination_icon arrow_left"></span></li>
					<li><span class="active">1</span></li>
			<?endif?>

			<?
			$arResult["nStartPage"]++;
			while($arResult["nStartPage"] <= $arResult["nEndPage"]-1):
			?>
				<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
					<li><span class="active"><?=$arResult["nStartPage"]?></span></li>
				<?else:?>
					<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a></li>
				<?endif?>
				<?$arResult["nStartPage"]++?>
			<?endwhile?>

			<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
				<?if($arResult["NavPageCount"] > 1):?>
					<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a></li>
				<?endif?>
					<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"  class="pagination_icon arrow_right" ></a></li>
			<?else:?>
				<?if($arResult["NavPageCount"] > 1):?>
					<li><span class="active"><?=$arResult["NavPageCount"]?></span></li>
				<?endif?>
					<li><span class="pagination_icon arrow_right"></span></li>
			<?endif?>
		<?endif?>

		<?if ($arResult["bShowAll"]):?>
			<?if ($arResult["NavShowAll"]):?>
					<li style="width:auto;"><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0" rel="nofollow" style="padding: 0 5px;"><?echo GetMessage("round_nav_pages")?></a></li>
			<?else:?>
					<li><a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1" rel="nofollow"><?echo GetMessage("round_nav_all")?></a></li>
			<?endif?>
		<?endif?>
	</ul>
</div>
