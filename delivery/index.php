<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка");
?>
<section class="content_page">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<ul class="nav-tabs tab_left_menu">
					<li class="active">
						<a href="#panel1">Самовывоз</a>
					</li>
					<li>
						<a href="#panel2">Курьерская служба</a>
					</li>
					<li>
						<a href="#panel3">Почтовые компании</a>
					</li>
					<div class="clearfix"></div>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				<div class="tab-content tabs_delivery">
					<div id="panel1" class="tab-pane fade in active">
						<?$APPLICATION->IncludeComponent(
							"bitrix:map.yandex.view",
							"",
							Array(
								"API_KEY" => "",
								"CONTROLS" => array("ZOOM","MINIMAP","TYPECONTROL","SCALELINE"),
								"INIT_MAP_TYPE" => "MAP",
								"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:47.27143845931473;s:10:\"yandex_lon\";d:39.80636884500692;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:39.80636884500695;s:3:\"LAT\";d:47.27143845930177;s:4:\"TEXT\";s:13:\"Это тут\";}}}",
								"MAP_HEIGHT" => "340",
								"MAP_ID" => "",
								"MAP_WIDTH" => "100%",
								"OPTIONS" => array("ENABLE_SCROLL_ZOOM","ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING")
							)
						);?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							".default",
							array(
								"AREA_FILE_RECURSIVE" => "Y",
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"COMPONENT_TEMPLATE" => ".default",
								"PATH" => "/delivery/sect_inc.php"
							),
							false
						);?>
						<?/*
						<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A172bf64bf6435649006dc0435bf2d15fb5eefa7fc1a36c45ec539aed20d56a50&amp;width=100%25&amp;height=340&amp;lang=ru_RU&amp;scroll=true"></script>
						*/?>
					</div>
					<div id="panel2" class="tab-pane fade">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							".default",
							array(
								"AREA_FILE_RECURSIVE" => "Y",
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"COMPONENT_TEMPLATE" => ".default",
								"PATH" => "/delivery/delivery_price.php"
							),
							false
						);?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							".default",
							array(
								"AREA_FILE_RECURSIVE" => "Y",
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"COMPONENT_TEMPLATE" => ".default",
								"PATH" => "/delivery/delivery_time.php"
							),
							false
						);?>
					</div>
					<div id="panel3" class="tab-pane fade">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							".default",
							array(
								"AREA_FILE_RECURSIVE" => "Y",
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"COMPONENT_TEMPLATE" => ".default",
								"PATH" => "/delivery/delivery_company.php"
							),
							false
						);?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							".default",
							array(
								"AREA_FILE_RECURSIVE" => "Y",
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"COMPONENT_TEMPLATE" => ".default",
								"PATH" => "/delivery/delivery_rules.php"
							),
							false
						);?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>