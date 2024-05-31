<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Catalog\ProductTable;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath

 */

$this->setFrameMode(true);

?>
<script>
	$(document).ready(function() {
		$('.cardbascet').on('click', '.bascet', function() {
			let id = $(this).parent().data('id');
			if ($(this).hasClass('addnew')) {
				activeBasket('add', id);
				$(this).parent().children(".plusminus").children(".coll").text(1);
				$(this).addClass('d-none');
				$(this).parent().children(".delall").removeClass('d-none');
				$(this).parent().children(".plusminus").removeClass('d-none');
			}
			if ($(this).hasClass('delall')) {
				activeBasket('del', id);
				$(this).addClass('d-none');
				$(this).parent().children(".plusminus").addClass('d-none');
				$(this).parent().children(".addnew").removeClass('d-none');
			}
			if ($(this).hasClass('minus')) {
				let bascet = activeBasket('minus', id);
				let inArr = false;
				for (i = 0; i < bascet.length; i++) {
					if (bascet[i][0] == id) {
						inArr = true;
						$(this).parent().children(".coll").text(bascet[i][1]);
						break;
					}
				}
				if (!inArr) {
					$(this).parent().parent().children(".delall").addClass('d-none');
					$(this).parent().parent().children(".plusminus").addClass('d-none');
					$(this).parent().parent().children(".addnew").removeClass('d-none');
				}
			}
			if ($(this).hasClass('plus')) {
				let bascet = activeBasket('add', id);
				for (i = 0; i < bascet.length; i++) {
					if (bascet[i][0] == id) {
						$(this).parent().children(".coll").text(bascet[i][1]);
						break;
					}
				}

			}
			console.log(id);
			return false;
		});
	});

	function activeBasket(action, id) {

		var basket = JSON.parse(getCookie('basket'));
		if (basket === null || !(basket instanceof Array))
			basket = [];
		var inArr = false;
		if (action == 'del' && !inArr) {
			for (i = 0; i < basket.length; i++) {
				if (basket[i][0] == id) {
					basket.splice(i, 1);
					inArr = true;
					break;
				}
			}
		}
		if (action == 'add' && !inArr) {
			for (i = 0; i < basket.length; i++) {
				if (basket[i][0] == id) {
					basket[i][1]++;
					inArr = true;
					break;
				}
			}
			if (!inArr) {
				let newItem = [id, 1]
				basket.push(newItem);
			}
		}

		if (action == 'minus' && !inArr) {
			for (i = 0; i < basket.length; i++) {
				if (basket[i][0] == id) {
					basket[i][1]--;
					if (basket[i][1] <= 0)
						basket.splice(i, 1);
					inArr = true;
					break;
				}
			}
		}
		var d = new Date();
		d.setMonth(d.getMonth() + 1);
		setCookie('basket', JSON.stringify(basket), d.toUTCString(), '/');

		$('.top_head_favor span').text(basket.length);

		return basket;
	}

	function setCookie(name, value, time, path) {
		document.cookie = name + "=" + value +
			((time) ? "; time=" + time : "") +
			((path) ? "; path=" + path : "");
	}

	function getCookie(name) {

		var cookie = " " + document.cookie;
		var search = " " + name + "=";
		var setStr = null;
		var offset = 0;
		var end = 0;
		if (cookie.length > 0) {
			offset = cookie.indexOf(search);
			if (offset != -1) {
				offset += search.length;
				end = cookie.indexOf(";", offset);
				if (end == -1) {
					end = cookie.length;
				}
				setStr = cookie.substring(offset, end);

			}
		}
		return (setStr);
	}
</script>

<? if (!empty($arResult)) : ?>
	<div class="row">
		<? foreach ($arResult["ITEMS"] as $arItem) : ?>
			<div class="col-lg-4 mb-4">
				<div class="card h-100">
					<h4 class="card-header"><?= $arItem["NAME"] ?? "" ?>
						<p><?= $arItem["PRICES"]["PRISE"]["VALUE"] ?? "" ?> руб.</p>
					</h4>

					<a href="<?= $arItem["DETAIL_PAGE_URL"] ?? "" ?>" data-caption="Маруся">
						<img class="card-img-top p-2" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?? "" ?>" alt="Маруся">
					</a>
					<div data-id="<?= $arItem["ID"] ?? "" ?>" class="card-footer cardbascet">
						<a href="javascript:;" class="btn btn-primary bascet addnew <?= !empty($arParams["BASKET"]) ? ((array_search($arItem["ID"], array_column($arParams["BASKET"], 0)) !== false) ? "d-none" : "") : ""  ?>">Добавить в корзину</a>
						<a href="javascript:;" class="btn btn-primary  bascet delall <?= !empty($arParams["BASKET"]) ? ((array_search($arItem["ID"], array_column($arParams["BASKET"], 0)) !== false) ? "" : "d-none") : "d-none"  ?>">Убрать все</a>
						<div data-id="<?= $arItem["ID"] ?? "" ?>" class="plusminus my-3 <?= !empty($arParams["BASKET"]) ? ((array_search($arItem["ID"], array_column($arParams["BASKET"], 0)) !== false) ? "" : "d-none") : "d-none"  ?>">
							<a href="javascript:;" class="btn btn-primary bascet minus">-</a>
							<samp class="btn btn-primary bascet coll">
								<?
								if (!empty($arParams["BASKET"])) {
									$idItemBasket = array_search($arItem["ID"], array_column($arParams["BASKET"], 0));
									if ($idItemBasket !== false)
										echo $countItemsProductInBasket = $arParams["BASKET"][$idItemBasket][1];
								}
								?>
							</samp>
							<a href="javascript:;" class="btn btn-primary bascet plus">+</a>
						</div>
					</div>
				</div>
			</div>
		<? endforeach ?>
	</div>
<? endif ?>
<?
if (!empty($arResult['NAV_RESULT'])) {
	$navParams =  array(
		'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
		'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
		'NavNum' => $arResult['NAV_RESULT']->NavNum
	);
} else {
	$navParams = array(
		'NavPageCount' => 1,
		'NavPageNomer' => 1,
		'NavNum' => $this->randString()
	);
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1) {
	$showTopPager = $arParams['DISPLAY_TOP_PAGER'];
	$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
	$showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

if ($showBottomPager) {
?>
	<div data-pagination-num="<?= $navParams['NavNum'] ?>">
		<!-- pagination-container -->
		<?= $arResult['NAV_STRING'] ?>
		<!-- pagination-container -->
	</div>
<?
}
