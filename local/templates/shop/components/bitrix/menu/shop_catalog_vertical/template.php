<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<?//print_r($arParams)?>
<?//print_r($arResult)?>
<aside>
	<? $showFilter = 0; ?>
	<? $previousLevel = 0;?>
	<? $currentId = "";?>
	<? foreach($arResult as $arItem) : ?>
		<?if($arItem['SELECTED'] == 1) $id0 = $arItem?>
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<? if ($arItem['DEPTH_LEVEL'] == 1) : ?>
			<?= str_repeat("</ul>", 1); ?>
			<?// Впихиваю фильтр ?>
			<?if($showFilter == 1):?>
				<?//print_r($id0)?>
				<?$showFilter = 0;?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:catalog.smart.filter",
					"shop_catalog_filter",
					array(
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"SECTION_ID" => $currentId,
						"FILTER_NAME" => $arParams["FILTER_NAME"],
						"PRICE_CODE" => $arParams["PRICE_CODE"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"SAVE_IN_SESSION" => "N",
						"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
						"XML_EXPORT" => "Y",
						"SECTION_TITLE" => "NAME",
						"SECTION_DESCRIPTION" => "DESCRIPTION",
						'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
						"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
						'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
						'CURRENCY_ID' => $arParams['CURRENCY_ID'],
						"SEF_MODE" => $arParams["SEF_MODE"],
						"SEF_RULE" => $arParams["SEF_RULE"],
						"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
						"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
						"SHOW_TEMPLATE" => "Y",
					),
					$component,
					array('HIDE_ICONS' => 'Y')
				);?>
			<?endif;?>
			<?// Впихнули фильтр ?>
			<?= str_repeat("</div>", 1); ?>
		<? elseif ( $arItem['DEPTH_LEVEL'] > 1 ) : ?>
				<?= str_repeat("</ul>", $previousLevel - $arItem["DEPTH_LEVEL"]); ?>
		<?endif?>
	<?endif?>
	<?if($arItem['SELECTED'] == 1) $currentId = $arItem['ID']?>
	<?if ($arItem["IS_PARENT"]) : ?>
		<?if ($arItem["DEPTH_LEVEL"] == 1) : ?>
			<?if($arItem['SELECTED'] == 1) $showFilter = 1;?>
			<div class="menu_left <?=($arItem['SELECTED']==1)?"active":""?>">
				<a href="<?= $arItem["LINK"] ?>" class="head">
					<div class="img_wrapper">
						<? if($arItem['icon']) : ?>
							<img src="<?= $arItem["icon"] ?>" alt="<?= $arItem["TEXT"] ?>">
						<? endif; ?>
					</div><div class="text"><?= $arItem["TEXT"] ?></div>
				</a>
				<div class="arrow_menu arrow_bottom"></div>
				<ul>
		<? elseif($arItem["DEPTH_LEVEL"] > 1) : ?>
			<li class="with_child">
				<a href="<?= $arItem["LINK"] ?>" <?=($arItem['SELECTED'] == 1)?'class="active"':""?>><?= $arItem["TEXT"] ?></a>
				<div class="arrow_menu arrow_bottom"></div>
					<ul>
		<? endif; ?>
	<? else : ?>
		<?if ($arItem["DEPTH_LEVEL"] == 1) : ?>
			<?if($arItem['SELECTED'] == 1) $showFilter = 1;?>
			<div class="menu_left <?=($arItem['SELECTED']==1)?"active":""?>">
				<a href="<?= $arItem["LINK"] ?>" class="head">
					<div class="img_wrapper">
						<? if($arItem['icon']) : ?>
							<img src="<?= $arItem["icon"] ?>" alt="<?= $arItem["TEXT"] ?>">
						<? endif; ?>
					</div><div class="text"><?= $arItem["TEXT"] ?></div>
				</a>
				<?/*if($showFilter == 1):?>
					<?=$showFilter;?>
					<?$showFilter = 0;?>
				<?endif;*/?>
			</div>
		<? elseif ($arItem["DEPTH_LEVEL"] > 1): ?>
			<li><a href="<?= $arItem["LINK"] ?>" <?=($arItem['SELECTED'] == 1)?'class="active"':""?>><?= $arItem["TEXT"] ?></a></li>
		<? endif; ?>
	<? endif; ?>
	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
	<?endforeach?>
	<?if ($previousLevel > 1)://close last item tags?>
	<?//= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
	<?= str_repeat("</ul>", ($previousLevel - 1)); ?>
	<?endif?>
	<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	array(
		"AREA_FILE_SHOW" => "sect",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/catalog/index_inc.php",
		"COMPONENT_TEMPLATE" => ".default",
		"AREA_FILE_RECURSIVE" => "Y"
	),
	false
);?>
	</aside>
<?endif?>