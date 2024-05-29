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
	<? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>
		<div class="card mb-4">
			<? if (!empty($arItem["PREVIEW_PICTURE"])) : ?>
				<img class="card-img-top" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="Велоцираптор Веган">
			<? endif ?>
			<div class="card-body">
				<h2 class="card-title"><?= $arItem["NAME"] ?? "" ?></h2>
				<h6 class="card-subtitle mb-2 text-muted">
					<?foreach($arItem["SECTIONS_NAMES"] as $keyNameItem => $arItemName):?>
						<?
							$sing  =  ($key !== count($arItem["SECTIONS_NAMES"])) ? "," : " ";?>
						<?= $arItemName . $sing  ?? ""?>
					<?endforeach?>
				</h6> 
				<p class="card-text"><?= $arItem["PREVIEW_TEXT"] ?? "" ?></p>
				<a href="<?= $arItem["DETAIL_PAGE_URL"]?>" class="btn btn-primary">Подробнее &rarr;</a>
			</div>
			<div class="card-footer text-muted">
				Опубликовано <?= $arItem["DATE_CREATE"] ?? "" ?>, автор: <a href="#"><?= $arItem["CREATED_USER_NAME"] ?? "Аноним"?></a>
			</div>
		</div>
	<? endforeach ?>
	<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
		<br /><?= $arResult["NAV_STRING"] ?>
	<? endif; ?>
<? endif ?>