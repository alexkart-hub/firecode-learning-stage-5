<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 */
?>
<script id="basket-total-template" type="text/html">
	<div class="cart_sum_block text-right">
		<div class="cart_sum">
			Итого:
			<span class="cart_sum_number" data-entity="basket-total-price">
				{{{PRICE_FORMATED}}}
			</span>
		</div>
		<button class="btn_site btn_red"
			data-entity="basket-checkout-button">
			<?=Loc::getMessage('SBB_ORDER')?>
		</button>
	</div>
</script>