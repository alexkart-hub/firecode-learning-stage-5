<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav>
<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
		continue;
?>
	<a href="<?=$arItem["LINK"]?>" rel="nofollow"><i class="fa <?= $arItem['PARAMS']['icon'];?>" aria-hidden="true"></i> <?=$arItem["TEXT"]?></a>
<?endforeach?>
	</nav>
<?endif?>