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
$titel = 'Динозавр:' . "<small>" .  ($arResult["NAME"] ?? "") . "</small>";
$APPLICATION->SetTitle($titel);
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
		<h3 class="my-3">Особенности динозавра</h3>
		<ul>
			<? if (!empty($arResult["PROPERTIES"]["DINOSAUR_FEATURES"]["VALUE"])) : ?>
				<? foreach ($arResult["PROPERTIES"]["DINOSAUR_FEATURES"]["VALUE"] as $key => $value) : ?>
					<li><b><?= $value ?? "" ?></b>: <?= $arResult["PROPERTIES"]["DINOSAUR_FEATURES"]["DESCRIPTION"][$key] ?? "" ?></li>
				<? endforeach ?>
			<? endif ?>
		</ul>
	</div>


</div>

<hr>

<h3 class="my-4">О динозавре</h3>

<div class="row">
	<div class="col-md-12">
		<?= $arResult["DETAIL_TEXT"] ?? "" ?>
	</div>
</div>

<hr>

<h3 class="my-4">Галерея</h3>

<div class="row">
	<? if (!empty($arResult["PROPERTIES"]["GALLERY"]["PHOTOS"])) : ?>
		<? foreach ($arResult["PROPERTIES"]["GALLERY"]["PHOTOS"] as $arItem) : ?>
			<div class="col-md-3 col-sm-6 mb-4">
				<a href="<?= $arItem["SRC"] ?? "" ?>" data-fancybox="gallery" data-caption="Большой Тираннозавр">
					<img class="img-fluid" src="<?= $arItem["SRC"] ?? "" ?>" alt="Большой Тираннозавр">
				</a>
			</div>
		<? endforeach ?>
	<? endif ?>
</div>