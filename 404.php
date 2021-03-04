<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>

<section class="content_page">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<img src="<?=SITE_TEMPLATE_PATH?>/img/404.png" alt="404 ошибка" class="img-responsive img_404">
				<p>Это могло случиться по следующим причинам:
					<br>- был изменен URL;
					<br>- страница была удалена;
					<br>- ошибка в написании ссылки,
				</p>
				<p>Вы можете перейти на <a href="/">Главную страницу</a> или в <a href="/catalog/">Каталог</a>.</p>
			</div>
		</div>
	</div>
</section>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>