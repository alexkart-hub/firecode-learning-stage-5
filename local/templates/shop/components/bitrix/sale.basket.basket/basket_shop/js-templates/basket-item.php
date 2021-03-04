<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $mobileColumns
 * @var array $arParams
 * @var string $templateFolder
 */

$usePriceInAdditionalColumn = in_array('PRICE', $arParams['COLUMNS_LIST']) && $arParams['PRICE_DISPLAY_MODE'] === 'Y';
$useSumColumn = in_array('SUM', $arParams['COLUMNS_LIST']);
$useActionColumn = in_array('DELETE', $arParams['COLUMNS_LIST']);

$restoreColSpan = 2 + $usePriceInAdditionalColumn + $useSumColumn + $useActionColumn;

$positionClassMap = array(
	'left' => 'basket-item-label-left',
	'center' => 'basket-item-label-center',
	'right' => 'basket-item-label-right',
	'bottom' => 'basket-item-label-bottom',
	'middle' => 'basket-item-label-middle',
	'top' => 'basket-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}
?>

<script id="basket-item-template" type="text/html">
	<tr id="basket-item-{{ID}}" data-entity="basket-item" data-id="{{ID}}">
		{{^SHOW_RESTORE}}
			<td data-label="№">
				{{CODE}}
				<?//$key=array_search("{{ID}}", array_column($arResult['BASKET_ITEM_RENDER_DATA'],'ID'));?>
			</td>
			<td data-label="Артикул" data-column-property-code="{{CODE}}" data-entity="basket-item-property-column-value">
			<?
			if (!empty($arParams['PRODUCT_BLOCKS_ORDER']))
			{
				foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName)
				{
					switch (trim((string)$blockName))
					{
						case 'columns':
							?>
							{{#COLUMN_LIST}}
								{{#IS_TEXT}}
									{{VALUE}}
								{{/IS_TEXT}}
							{{/COLUMN_LIST}}
							<?
							break;
					}
				}
			}
			?>
			</td>
			<td>
				<img src="{{{IMAGE_URL}}}{{^IMAGE_URL}}<?=$templateFolder?>/images/no_photo.png{{/IMAGE_URL}}" alt="{{NAME}}"	>
			</td>
			<td>
				{{#DETAIL_PAGE_URL}}
					<a href="{{DETAIL_PAGE_URL}}" target="_blank">
				{{/DETAIL_PAGE_URL}}

					{{NAME}}

				{{#DETAIL_PAGE_URL}}
					</a>
				{{/DETAIL_PAGE_URL}}
			</td>

			<?
			if ($usePriceInAdditionalColumn)
			{
				?>
				<td  data-label="Цена" id="basket-item-price-{{ID}}">
					{{{PRICE_FORMATED}}}
				</td>
				<?
			}
			?>
			<td>
				<div class="counter" data-entity="basket-item-quantity-block">
					<div class="minus" data-entity="basket-item-quantity-minus">&minus;</div>

						<input type="text" class="value" value="{{QUANTITY}}"
							{{#NOT_AVAILABLE}} disabled="disabled"{{/NOT_AVAILABLE}}
							data-value="{{QUANTITY}}" data-entity="basket-item-quantity-field"
							id="basket-item-quantity-{{ID}}" style="border:none;">

					<div class="plus" data-entity="basket-item-quantity-plus">&plus;</div>
				</div>
			</td>
			<?
			if ($useSumColumn)
			{
				?>
				<td  data-label="Сумма" id="basket-item-sum-price-{{ID}}">
					{{{SUM_PRICE_FORMATED}}}
				</td>
				<?
			}

			if ($useActionColumn)
			{
				?>
				<td>
						<span class="basket-item-actions-remove" data-entity="basket-item-delete"></span>
						{{#SHOW_LOADING}}
						<div class="remove_cart"></div>
						{{/SHOW_LOADING}}
				</td>
				<?
			}
			?>
		{{/SHOW_RESTORE}}
	</tr>
</script>