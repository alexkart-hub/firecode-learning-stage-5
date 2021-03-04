<div class="search_form">
<?$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"mainsearch",
	Array(
		"COMPONENT_TEMPLATE" => "mainsearch",
		"PAGE" => "#SITE_DIR#search/index.php",
		"USE_SUGGEST" => "Y"
	)
);?>
</div>