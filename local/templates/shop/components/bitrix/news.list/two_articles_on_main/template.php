<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?//print_r($arResult)?>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="head_h2">Статьи</div>
		</div>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="item_article">
							<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
								<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" />
							<?endif?>
							<div class="left">
								<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
									<div class="name"><?echo $arItem["NAME"]?></div>
								<?endif;?>
								<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
									<div class="text"><?echo $arItem["PREVIEW_TEXT"];?></div>
								<?endif;?>
							</div>
							<div class="right">
								<div class="dark"></div>
								<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="btn_site btn_white">Подробнее</a>
							</div>
						</div>
					</div>
		<?endforeach;?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			<a href="/articles/" class="btn_site btn_red">Смотреть все</a>
		</div>
	</div>
</div>
