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
<div class="row">
	<? foreach ($arResult["ITEMS"] as $arItems) : ?>
		<div class="col-lg-4 mb-4">
			<div class="card h-100 text-center">
				<a href="<?= $arItems["PREVIEW_PICTURE"]["SRC"] ?? "" ?>" data-fancybox data-caption="Маруся">
					<img class="card-img-top p-2" src="<?= $arItems["PREVIEW_PICTURE"]["SRC"] ?? "" ?>" alt="Маруся">
				</a>
				<div class="card-body">
					<h4 class="card-title"><?= $arItems["NAME"] ?? "" ?></h4>
					<h6 class="card-subtitle mb-2 text-muted"><?= $arItems["PREVIEW_TEXT"] ?? "" ?></h6>
					<p class="card-text"><?= $arItems["DETAIL_TEXT"] ?? "" ?></p>
				</div>
				<div class="card-footer">
					<? if (!empty($arItems["PROPERTIES"]["CHARACTERISTICS_OF_DINOSAURS"]["VALUE"])) : ?>
						<? foreach ($arItems["PROPERTIES"]["CHARACTERISTICS_OF_DINOSAURS"]["VALUE"] as $key => $value) : ?>
							<span class="badge <?= $arItems["PROPERTIES"]["CHARACTERISTICS_OF_DINOSAURS"]["DESCRIPTION"][$key] ?? "" ?>"><?= $value ?? "" ?></span>
						<? endforeach ?>
					<? endif ?>
				</div>
			</div>
		</div>
	<? endforeach ?>
</div>