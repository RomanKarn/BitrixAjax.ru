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
<div class="col-lg-3 mb-4">
	<div class="list-group">
		<? foreach ($arResult["SECTIONS"] as $arItem) : ?>
			<a href="<?=$arItem["SECTION_PAGE_URL"] ?? "" ?>" class="list-group-item"><?=$arItem["NAME"] ?? "" ?></a>
		<? endforeach ?>
	</div>
</div>