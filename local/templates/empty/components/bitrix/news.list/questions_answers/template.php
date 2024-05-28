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

<div class="mb-4" id="accordion" role="tablist" aria-multiselectable="true">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="card">
		<div class="card-header" role="tab" id="<?= !empty($arItem["ID"]) ? "heading" . $arItem["ID"] : "" ?>">
			<h5 class="mb-0">
				<a data-toggle="collapse" data-parent="#accordion" href="<?= !empty($arItem["ID"]) ? "#collapse" . $arItem["ID"] : "" ?>" aria-expanded="false" aria-controls="<?= !empty($arItem["ID"]) ? "collapse" . $arItem["ID"] : "" ?>"><?= $arItem["NAME"] ?? ""?></a>
			</h5>
		</div>
		<div id="<?= !empty($arItem["ID"]) ? "collapse" . $arItem["ID"] : "" ?>" class="collapse" role="tabpanel" aria-labelledby="<?= !empty($arItem["ID"]) ? "heading" . $arItem["ID"] : "" ?>">
			<div class="card-body">
				<?= $arItem["PREVIEW_TEXT"]?>
			</div>
		</div>
	</div>
	<?endforeach?>
</div>