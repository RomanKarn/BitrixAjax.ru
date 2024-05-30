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
<? foreach ($arResult["ITEMS"] as $arItem) : ?>
	<div class="media mb-4">
		<img class="d-flex mr-3 rounded-circle" src="<?= $arItem["PROPERTIES"]["ICON"]?>" width="50" alt="">
		<div class="media-body">
			<h5 class="mt-0"><?=$arItem["PROPERTIES"]["ID_CRIATERS"]["LOGIN"]?></h5>
			<?=$arItem["PREVIEW_TEXT"]?>
		</div>
	</div>
<? endforeach ?>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
	<br /><?= $arResult["NAV_STRING"] ?>
<? endif; ?>