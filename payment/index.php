<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оплата");
?><section class="content_page">
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			 <?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_RECURSIVE" => "Y",
					"AREA_FILE_SHOW" => "page",
					"AREA_FILE_SUFFIX" => "inc",
					"EDIT_TEMPLATE" => ""
				)
			);?>
			<div class="payment_wrapper">
				<img src="/local/templates/shop/img/payment_1.png" alt="">
				<img src="/local/templates/shop/img/payment_2.png" alt="">
				<img src="/local/templates/shop/img/payment_3.png" alt="">
				<img src="/local/templates/shop/img/payment_4.png" alt="">
				<img src="/local/templates/shop/img/payment_5.png" alt="">
				<img src="/local/templates/shop/img/payment_6.png" alt="">
				<img src="/local/templates/shop/img/payment_7.png" alt="">
			</div>
		</div>
	</div>
</div>
 </section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>