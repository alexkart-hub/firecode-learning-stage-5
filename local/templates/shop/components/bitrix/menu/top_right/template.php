<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

	<?/* foreach($arResult as $arItem) : ?>
		<? if ($arItem['DEPTH_LEVEL'] == 1) : ?>
<pre>
	<? print_r($arItem) ?>
</pre>
		<? endif; ?>
	<? endforeach;*/?>
<nav class="header_bottom_menu">
	<?//print_r($arResult)?>
	<? $previousLevel = 0; $count = 0;?>
	<? $parent = ""; ?>
	<? foreach($arResult as $arItem) : ?>
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<? if ($arItem['DEPTH_LEVEL'] == 1) : ?>
			<?// if ($parent != "services") : ?>
				<?= str_repeat("</div></div></div>", 1); ?>
			<?/* else : ?>
				<? $parent = ""; ?>
				<?= str_repeat("</ul></div></div>", 1); ?>
			<? endif; */?>
		<? elseif ( $arItem['DEPTH_LEVEL'] == 2 ) : ?>
			<?// if ($arItem["LINK"] != "/services/") : ?>
				<?= str_repeat("</ul>", 1); ?>
			<?// else : ?>
				<?//= str_repeat("</ul></div></div>", 1); ?>
			<?// endif; ?>
		<? elseif ( $arItem['DEPTH_LEVEL'] > 2 ) : ?>
			<?= str_repeat("</ul></li>", 1); ?>
		<?endif?>
	<?endif?>
	<? if ($arItem['DEPTH_LEVEL'] == 2) : ?>
		<? if ($count >= 9) : ?>
			<? $count = 0; ?>
			<?= str_repeat("</div><div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>", 1); ?>
		<? endif; ?>
	<? endif; ?>
	<?if ($arItem["IS_PARENT"]) : ?>
		<?if ($arItem["DEPTH_LEVEL"] == 1) : ?>
			<?// if (($arItem["LINK"] != "/services/") && ($parent != "services")): ?>
			<a href="<?= $arItem["LINK"] ?>" class="with_child arrow_bottom"><?= $arItem["TEXT"] ?></a>
			<div class="katalog_ul hidden_menu">
				<div class="row">
					<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			<?/* else : ?>
				<? $parent = "services"; $count = 0;?>
				<div class="with_menu">
				<a href="<?= $arItem['LINK'] ?>" class="with_child arrow_bottom"><?= $arItem["TEXT"] ?></a>
					<div class="small_menu hidden_menu">
						<ul>
			<? endif; */?>
		<? elseif($arItem["DEPTH_LEVEL"] == 2) : ?>
			<? $count++; ?>
			<a href="<?= $arItem["LINK"] ?>" class="head"><?= $arItem["TEXT"] ?></a>
				<ul>
		<? elseif($arItem["DEPTH_LEVEL"] > 2) : ?>
			<? (($arItem["DEPTH_LEVEL"] == 3) && ($parent == "")) ? $count++ : "" ?>
				<? if ($arItem["PERMISSION"] > "D") : ?>
					<li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
				<? else : ?>
					<li><?= $arItem["TEXT"] ?>
				<? endif; ?>
			<div class="arrow_bottom with_child"></div>
				<ul class="hidden_ul">
		<? endif; ?>
		<!-- DEPTH_LEVEL -->
	<? else : ?>
		<?if ($arItem["DEPTH_LEVEL"] == 1) : ?>
			<a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
		<? elseif ($arItem["DEPTH_LEVEL"] == 2): ?>
			<?// if ($parent != "services") : ?>
				<? $count++; ?>
				<a href="<?= $arItem["LINK"] ?>" class="head"><?= $arItem["TEXT"] ?></a><br>
			<?/* else : ?>
				<? $count = 0; ?>
				<li><a href="<?= $arItem["LINK"] ?>" class="head"><?= $arItem["TEXT"] ?></a></li>
			<? endif; */?>
		<? elseif ($arItem["DEPTH_LEVEL"] > 2) : ?>
			<? ($arItem["DEPTH_LEVEL"] == 3) ? $count++ : "" ?>
			<li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
		<? endif; ?>
	<? endif; ?>
	<!-- IS_PARENT -->
	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>
	<?endforeach?>
	<?if ($previousLevel > 1)://close last item tags?>
	<?//= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
	<?= str_repeat("", ($previousLevel - 1)); ?>
	<?endif?>
</nav>


<?endif?>