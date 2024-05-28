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

if (!$arResult["NavShowAlways"]) {
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
?>



<ul class="pagination justify-content-center">
	<li class="page-item">
		<a class="page-link" href="<?= $arResult["sUrlPath"] ?>?PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageNomer"] - 1 ?>" aria-label="Назад">
			<span aria-hidden="true">&laquo;</span>
			<span class="sr-only">Назад</span>
		</a>
	</li>
	<? do { ?>
		<li class="page-item">
			<a class='page-link <?= $arResult["NavPageNomer"] == $arResult["nStartPage"]  ? "active" : "" ?>' href="<?= $arResult["sUrlPath"] ?>?PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>">
				<?= $arResult["nStartPage"] ?>
			</a>
		</li>
		<?
		$ferstEnter = false;
		$arResult["nStartPage"]++;
		?>
	<? } while ($arResult["nStartPage"] <= $arResult["nEndPage"]); ?>
	<li class="page-item">
		<a class="page-link" href="<?= $arResult["sUrlPath"] ?>?PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageNomer"] + 1 ?>" aria-label="Вперед">
			<span aria-hidden="true">&raquo;</span>
			<span class="sr-only">Вперед</span>
		</a>
	</li>
</ul>