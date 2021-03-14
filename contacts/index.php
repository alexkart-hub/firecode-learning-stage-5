<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

<section class="content_page">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="item_contacts">
							<div class="head">Информация</div>
							<p>Основная деятельность нашей организации, это продажа качественных автосигнализаций, ксенона, и другой автомобильной электроники в Ростове-на-Дону. Так же у нас есть установочный центр, в котором мы с удовольствием установим автосигнализацию, ксенон, иммобилайзер и другие автомобильные гаджеты.</p>
							<address>
								<div class="item_addess">
									<strong>Адрес:</strong> г. Ростов-на-Дону, ул. Зои Космодемьянской 28
								</div>
								<div class="item_addess">
									<strong>Время работы:</strong> без выходных с 10:00 до 18:00
								</div>
								<div class="item_addess">
									<div class="item_col"><strong>Телефоны:</strong></div>
									<div class="item_col">
										<a href="tel:+78002224832">+7 (800) 222-48-32</a><br>
										<a href="tel:+78632704832">+7 (863) 270-48-32</a><br>
										<a href="tel:+79286154832">+7 (928) 615-48-32</a><br>
										<a href="tel:+79286009982">+7 (928) 600 99 82</a><br>
										<a href="tel:+79508650879">+7 (950) 865 08 79</a>
									</div>
								</div>
								<div class="item_addess">
									<strong>E-mail:</strong> <a href="mailto:garage_12v@mail.ru ">garage_12v@mail.ru </a>
								</div>
								<div class="item_addess">
									<strong>Схема проезда:</strong> <a href="img/scheme.jpg" data-fancybox>посмотреть</a>
								</div>
							</address>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <?$APPLICATION->IncludeComponent(
                        "legen:main.feedback",
                        "shop_feedback_form",
                        array(
                            "EMAIL_TO" => COption::GetOptionString("main", "email_from"),
                            "EVENT_MESSAGE_ID" => array(
                                0 => "7",
                            ),
                            "OK_TEXT" => "Спасибо, ваше сообщение принято.",
                            "REQUIRED_FIELDS" => array(
                                0 => "NAME",
                                1 => "EMAIL",
                                2 => "MESSAGE",
                            ),
                            "USE_CAPTCHA" => "N",
                            "COMPONENT_TEMPLATE" => "shop_feedback_form"
                        ),
                        false
                    );?>

					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="map">
						<?$APPLICATION->IncludeComponent(
							"bitrix:map.yandex.view",
							".default",
							Array(
								"API_KEY" => "",
								"COMPONENT_TEMPLATE" => ".default",
								"CONTROLS" => array(0=>"ZOOM",1=>"MINIMAP",2=>"TYPECONTROL",3=>"SCALELINE",),
								"INIT_MAP_TYPE" => "MAP",
								"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:47.27142583403795;s:10:\"yandex_lon\";d:39.80632897677901;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:39.806328976779;s:3:\"LAT\";d:47.271425834012;s:4:\"TEXT\";s:244:\"<a href=\"/\" class=\"header_logo\"> <img alt=\"Legen Auto\" src=\"/local/templates/shop/img/header_logo.png\"> <span class=\"text\"> <span class=\"top\">Legen Auto</span> <span class=\"bottom\">студия автоэлектроники</span> </span> </a>\";}}}",
								"MAP_HEIGHT" => "350",
								"MAP_ID" => "",
								"MAP_WIDTH" => "100%",
								"OPTIONS" => array(0=>"ENABLE_SCROLL_ZOOM",1=>"ENABLE_DBLCLICK_ZOOM",2=>"ENABLE_DRAGGING",)
							)
						);?>
						</div>
					</div>
				</div>
			</div>
		</section>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>