<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
?>
<section class="content_page">
	<div class="container">
		<div class="row">

			<?$APPLICATION->IncludeComponent(
				"bitrix:main.profile",
				"shop_personal",
				Array(
					"CHECK_RIGHTS" => "Y",
					"SEND_INFO" => "Y",
					"SET_TITLE" => "Y",
					"USER_PROPERTY" => array(),
					"USER_PROPERTY_NAME" => ""
				)
			);?>

		</div>
	</div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>