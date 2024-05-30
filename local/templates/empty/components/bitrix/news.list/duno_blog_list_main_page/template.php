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
					<h4 class="card-header"><?= $arItem["NAME"] ?? "" ?></h4>
					<div class="card-body">
						<h6 class="card-subtitle mb-2 text-muted">
							<? foreach ($arItem["SECTIONS_NAMES"] as $keyNameItem => $arItemName) : ?>
								<? $sing  =  ($key !== count($arItem["SECTIONS_NAMES"])) ? "," : " "; ?>
								<?= $arItemName . $sing  ?? "" ?>
							<? endforeach ?></h6>
						<p class="card-text"><?= $arItem["PREVIEW_TEXT"] ?? "" ?></p>
						<small class="mt-2 text-muted"><?= $arItem["DATE_CREATE"] ?? "" ?></small>
					</div>
					<div class="card-footer">
						<a href="<?= $arItem["DETAIL_PAGE_URL"] ?? "" ?>" class="btn btn-primary">Подробнее</a>
					</div>
				</div>
			</div>
		<? endforeach ?>
	</div>
<? endif ?>