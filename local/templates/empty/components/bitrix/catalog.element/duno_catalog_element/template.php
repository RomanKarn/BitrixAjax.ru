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
 * @var string $templateFolder
 */

$this->setFrameMode(true);


?>

<div class="row">

	<div class="col-md-8 text-center">
		<a href="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?? "" ?>" data-fancybox data-caption="Тираннозавр">
			<img class="img-fluid" src="<?= $arResult["PREVIEW_PICTURE"]["SRC"] ?? "" ?>" alt="Тираннозавр">
		</a>
	</div>

	<div class="col-md-4">
		<h3 class="my-3"><?= $arResult["NAME"] ?? "" ?></h3>
		<p><?= $arResult["PREVIEW_TEXT"] ?? "" ?></p>
		<h4 >Цена:<?= $arResult["PRICES"]["PRISE"]["VALUE"]  ?? "" ?> руб.</h4>
		<a  href="<?= $arItem["DETAIL_PAGE_URL"] ?? "" ?>" class="btn btn-primary center my-4">В корзину</a>
	</div>
	<hr>

	<h3 class="my-4">О продукте</h3>

	<div class="row">
		<div class="col-md-12">
			<?= $arResult["DETAIL_TEXT"] ?? "" ?>
		</div>
	</div>

	<hr>

</div>