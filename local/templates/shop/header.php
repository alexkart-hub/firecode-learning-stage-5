<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE HTML>
<html>

<head>
	<?$APPLICATION->ShowHead();?>
	<title>
		<?$APPLICATION->ShowTitle();?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	<link href="<?= SITE_TEMPLATE_PATH ?>/favicon.ico" rel="shortcut icon" type="image/x-icon">

	<link href="<?= SITE_TEMPLATE_PATH ?>/css/reset.min.css" type="text/css" rel="stylesheet">
	<link href="<?= SITE_TEMPLATE_PATH ?>/css/bootstrap.min.css" type="text/css" rel="stylesheet">
	<link href="<?= SITE_TEMPLATE_PATH ?>/css/slick.css" type="text/css" rel="stylesheet">
	<link href="<?= SITE_TEMPLATE_PATH ?>/css/style.css" type="text/css" rel="stylesheet">
	<link href="<?= SITE_TEMPLATE_PATH ?>/css/adaptive.css" type="text/css" rel="stylesheet">

	<link href="<?= SITE_TEMPLATE_PATH ?>/fancybox/dist/jquery.fancybox.min.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body>
	<div id="panel">
		<?$APPLICATION->ShowPanel();?>
	</div>
	<div class="wrapper_site">
		<header>
			<div class="header_top hidden-xs">
				<div class="container">
					<div class="row">
						<div class="hidden-xs col-sm-12 col-md-5 col-lg-5">
							<?$APPLICATION->IncludeComponent(
								"bitrix:menu",
								"top_left",
								array(
									"ALLOW_MULTI_SELECT" => "N",
									"CHILD_MENU_TYPE" => "left",
									"DELAY" => "N",
									"MAX_LEVEL" => "1",
									"MENU_CACHE_GET_VARS" => array(
									),
									"MENU_CACHE_TIME" => "3600",
									"MENU_CACHE_TYPE" => "N",
									"MENU_CACHE_USE_GROUPS" => "Y",
									"ROOT_MENU_TYPE" => "top",
									"USE_EXT" => "N",
									"COMPONENT_TEMPLATE" => "top_left"
								),
								false
							);?>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 text-right">

							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/local/templates/shop/footer_inc_search.php"
								)
							);?>

							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/local/templates/shop/header_inc_phone.php"
								)
							);?>

							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/local/templates/shop/header_inc_email.php"
								)
							);?>

							<?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.line",
	"basket_line",
	array(
		"HIDE_ON_BASKET_PAGES" => "N",
		"PATH_TO_AUTHORIZE" => "",
		"PATH_TO_BASKET" => SITE_DIR."personal/basket.php",
		"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",
		"PATH_TO_PROFILE" => SITE_DIR."personal/",
		"PATH_TO_REGISTER" => SITE_DIR."login/",
		"POSITION_FIXED" => "N",
		"SHOW_AUTHOR" => "N",
		"SHOW_EMPTY_VALUES" => "Y",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_PERSONAL_LINK" => "Y",
		"SHOW_PRODUCTS" => "N",
		"SHOW_REGISTRATION" => "Y",
		"SHOW_TOTAL_PRICE" => "Y",
		"COMPONENT_TEMPLATE" => "basket_line"
	),
	false
);?>
						</div>
					</div>
				</div>
			</div>
			<div class="header_bottom">
				<div class="container with_relative">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
						<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/local/templates/shop/header_inc_logo.php"
								)
							);?>

						</div>
						<div class="hidden-xs col-sm-12 col-md-7 col-lg-8 text-right no_relative">
							<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"top_right",
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "4",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top_second",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => "top_right",
		"MENU_THEME" => "site"
	),
	false
);?>
						</div>
					</div>
				</div>
			</div>
		</header>
		<?
		$route = explode('/', $_SERVER['REQUEST_URI']);
		if (($route[1] != "") && (substr($route[1],0,1) != "?" )) :
		?>
		<section class="under_header">
			<div class="img_bg_wrapper">
				<img src="<?= SITE_TEMPLATE_PATH ?>/img/first_screen.jpg" alt="" class="img_bg">
				<div class="dark"></div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="head_h1"><?= $APPLICATION->ShowTitle(); ?></div>
					</div>
				</div>
			</div>
		</section>

		<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"shop",
	array(
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0",
		"COMPONENT_TEMPLATE" => "shop"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>

		<? endif; ?>