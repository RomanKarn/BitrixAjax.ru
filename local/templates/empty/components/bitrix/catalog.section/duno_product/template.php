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
					<div class="card-footer">
						<a href="<?= $arItem["DETAIL_PAGE_URL"] ?? "" ?>" class="btn btn-primary">В корзину</a>
						<a href="<?= $arItem["DETAIL_PAGE_URL"] ?? "" ?>" class="btn btn-primary">Убрать из корзны все товары</a>
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
