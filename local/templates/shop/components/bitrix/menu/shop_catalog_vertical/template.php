<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <aside>
        <? $showFilter = 0; ?>
        <? $previousLevel = 0;?>
        <? $currentId = "";?>
        <? foreach($arResult as $arItem) : ?>
            <?if($arItem['SELECTED'] == 1) $id0 = $arItem?>
            <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                <? if ($arItem['DEPTH_LEVEL'] == 1) : ?>
                    <?= str_repeat("</ul>", 1); ?>
                    <?//= "Впихиваю фильтр" ?>
                    <?if($showFilter == 1):?>
                        <?$showFilter = 0;?>
                        <?$APPLICATION->ShowViewContent('SmartFilter');?>
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
            <?$selected=$arItem['SELECTED'];?>
        <?endforeach?>
        <?if ($previousLevel > 1)://close last item tags?>
            <?= str_repeat("</ul>", ($previousLevel - 1)); ?>
        <?endif?>
        <?//= "Впихиваю фильтр" ?>
        <?if($showFilter == 1):?>
            <?$APPLICATION->ShowViewContent('SmartFilter');?>
        <?endif;?>
        <?// Впихнули фильтр ?>
        </div>
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