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
	"slam:easyform", 
	"shop_feedback_form_slam", 
	array(
		"CATEGORY_ACCEPT_TITLE" => "Согласие на обработку данных",
		"CATEGORY_ACCEPT_TYPE" => "accept",
		"CATEGORY_ACCEPT_VALIDATION_ADDITIONALLY_MESSAGE" => "",
		"CATEGORY_ACCEPT_VALIDATION_MESSAGE" => "Обязательное поле",
		"CATEGORY_ACCEPT_VALUE" => "Принимаю <a href=\"/soglasie.pdf\" target=\"_blank\">согласие на обработку персональныx данных</a>",
		"CATEGORY_EMAIL_PLACEHOLDER" => "Ваш E-mail",
		"CATEGORY_EMAIL_TITLE" => "Ваш E-mail",
		"CATEGORY_EMAIL_TYPE" => "email",
		"CATEGORY_EMAIL_VALIDATION_ADDITIONALLY_MESSAGE" => "data-bv-emailaddress-message=\"E-mail введен некорректно\"",
		"CATEGORY_EMAIL_VALIDATION_MESSAGE" => "Необходимо заполнить e-mail",
		"CATEGORY_EMAIL_VALUE" => "",
		"CATEGORY_MESSAGE_PLACEHOLDER" => "Текст сообщения",
		"CATEGORY_MESSAGE_TITLE" => "Текст сообщения",
		"CATEGORY_MESSAGE_TYPE" => "textarea",
		"CATEGORY_MESSAGE_VALIDATION_ADDITIONALLY_MESSAGE" => "",
		"CATEGORY_MESSAGE_VALIDATION_MESSAGE" => "Обязательное поле",
		"CATEGORY_MESSAGE_VALUE" => "",
		"CATEGORY_PHONE_INPUTMASK" => "N",
		"CATEGORY_PHONE_INPUTMASK_TEMP" => "+7 (999) 999-9999",
		"CATEGORY_PHONE_PLACEHOLDER" => "",
		"CATEGORY_PHONE_TITLE" => "Мобильный телефон",
		"CATEGORY_PHONE_TYPE" => "tel",
		"CATEGORY_PHONE_VALIDATION_ADDITIONALLY_MESSAGE" => "",
		"CATEGORY_PHONE_VALUE" => "",
		"CATEGORY_TITLE_PLACEHOLDER" => "Ваше имя",
		"CATEGORY_TITLE_TITLE" => "Ваше имя",
		"CATEGORY_TITLE_TYPE" => "text",
		"CATEGORY_TITLE_VALIDATION_ADDITIONALLY_MESSAGE" => "",
		"CATEGORY_TITLE_VALUE" => "",
		"CREATE_SEND_MAIL" => "",
		"DISPLAY_FIELDS" => array(
			0 => "TITLE",
			1 => "EMAIL",
			2 => "MESSAGE",
			3 => "ACCEPT",
			4 => "",
		),
		"EMAIL_BCC" => "",
		"EMAIL_FILE" => "N",
		"EMAIL_SEND_FROM" => "N",
		"EMAIL_TO" => "",
		"ENABLE_SEND_MAIL" => "Y",
		"ERROR_TEXT" => "Произошла ошибка. Сообщение не отправлено.",
		"EVENT_MESSAGE_ID" => array(
			0 => "49",
		),
		"FIELDS_ORDER" => "EMAIL,TITLE,MESSAGE,ACCEPT",
		"FORM_AUTOCOMPLETE" => "Y",
		"FORM_ID" => "FORM9",
		"FORM_NAME" => "Форма обратной связи",
		"FORM_SUBMIT_VALUE" => "Отправить",
		"FORM_SUBMIT_VARNING" => "Нажимая на кнопку \"#BUTTON#\", вы даете согласие на обработку <a target=\"_blank\" href=\"#\">персональных данных</a>",
		"HIDE_ASTERISK" => "Y",
		"HIDE_FIELD_NAME" => "Y",
		"HIDE_FORMVALIDATION_TEXT" => "N",
		"INCLUDE_BOOTSRAP_JS" => "Y",
		"MAIL_SUBJECT_ADMIN" => "#SITE_NAME#: Сообщение из формы обратной связи",
		"OK_TEXT" => "Ваше сообщение отправлено. Мы свяжемся с вами в течение 2х часов",
		"REQUIRED_FIELDS" => array(
			0 => "TITLE",
			1 => "EMAIL",
			2 => "MESSAGE",
			3 => "ACCEPT",
		),
		"SEND_AJAX" => "Y",
		"SHOW_MODAL" => "N",
		"TITLE_SHOW_MODAL" => "Спасибо!",
		"USE_BOOTSRAP_CSS" => "Y",
		"USE_BOOTSRAP_JS" => "N",
		"USE_CAPTCHA" => "Y",
		"USE_FORMVALIDATION_JS" => "N",
		"USE_IBLOCK_WRITE" => "Y",
		"USE_JQUERY" => "N",
		"USE_MODULE_VARNING" => "Y",
		"WIDTH_FORM" => "",
		"_CALLBACKS" => "saccess_send",
		"COMPONENT_TEMPLATE" => "shop_feedback_form_slam",
		"CUSTOM_FORM" => "",
		"CAPTCHA_TITLE" => "",
		"CREATE_IBLOCK" => "",
		"IBLOCK_TYPE" => "formresult",
		"IBLOCK_ID" => "10",
		"ACTIVE_ELEMENT" => "N",
		"CATEGORY_TITLE_IBLOCK_FIELD" => "FORM_TITLE",
		"CATEGORY_EMAIL_IBLOCK_FIELD" => "FORM_EMAIL",
		"CATEGORY_MESSAGE_IBLOCK_FIELD" => "PREVIEW_TEXT",
		"CATEGORY_ACCEPT_IBLOCK_FIELD" => "FORM_ACCEPT"
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