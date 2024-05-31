<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

?>
<? if (!empty($arResult)) : ?>
	<div class="row">
		<? foreach ($arResult["ITEMS"] as $arItem) : ?>
			<div class="col-lg-4 mb-4">
				<div class="card h-100">
					<h4 class="card-header"><?= $arItem["NAME"] ?? "" ?>
						<p><?= $arItem["PROPERTIES"]["PRISE"]["VALUE"] ?? "" ?> руб.</p>
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
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
	<br /><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
</div>