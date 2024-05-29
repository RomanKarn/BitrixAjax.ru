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

<ul class="list-unstyled mb-0">
	<?foreach($arResult["SECTIONS"] as $arItems):?>
		<li> <a href="<?= $arItems["SECTION_PAGE_URL"] ?? ""?>"><?= $arItems["NAME"] ?? ""?></a> </li> 
	<?endforeach?>
</ul>