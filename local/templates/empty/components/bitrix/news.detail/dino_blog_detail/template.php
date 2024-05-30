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

<? if (!empty($arResult['PREVIEW_PICTURE'])) : ?>
	<a href="<?= $arResult['PREVIEW_PICTURE']["SRC"] ?>" data-fancybox data-caption="Велоцираптор Веган">
		<img class="img-fluid rounded" src="<?= $arResult['PREVIEW_PICTURE']["SRC"] ?>" alt="Велоцираптор Веган">
	</a>
<? endif ?>
<hr>
<h6 class="card-subtitle mb-2 text-muted">
	<? foreach ($arResult["SECTIONS_NAMES"] as $arItemName) : ?>
		<?
		$sing  =  ($key !== count($arResult["SECTIONS_NAMES"])) ? "," : " "; ?>
		<?= $arItemName . $sing  ?? "" ?>
	<? endforeach ?>

</h6>
<p>Опубликовано <?= $arResult["DATE_CREATE"] ?? "" ?>, автор: <a href="#"><?= $arResult["CREATED_USER_NAME"] ?? "Аноним"?></a></p>

<hr>

<?= $arResult["DETAIL_TEXT"] ?? ""?>

<hr>
