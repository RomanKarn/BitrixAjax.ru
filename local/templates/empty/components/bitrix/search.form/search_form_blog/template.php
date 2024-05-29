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
$this->setFrameMode(true); ?>

<form action="<?= $arResult["FORM_ACTION"] ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="q" value="" placeholder="Поиск..." />
		<div class="input-group-append">
			<input class="btn btn-outline-secondary" name="s" type="submit" value="<?= GetMessage("BSF_T_SEARCH_BUTTON"); ?>" />
		</div>
	</div>
</form>
