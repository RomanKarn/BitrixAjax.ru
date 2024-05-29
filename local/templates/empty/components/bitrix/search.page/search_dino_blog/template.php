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
?>
<div class="search-page">

<? if (isset($arResult["REQUEST"]["ORIGINAL_QUERY"])) :
	?>
		<div class="search-language-guess">
			<? echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#" => '<a href="' . $arResult["ORIGINAL_QUERY_URL"] . '">' . $arResult["REQUEST"]["ORIGINAL_QUERY"] . '</a>')) ?>
		</div><br /><?
				endif;
					?>

	<? if ($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false) : ?>
	<? elseif ($arResult["ERROR_CODE"] != 0) : ?>
		<? ShowError($arResult["ERROR_TEXT"]); ?>
	<? elseif (count($arResult["SEARCH"]) > 0) : ?>
		<p>
			<? if ($arResult["REQUEST"]["HOW"] == "d") : ?>
				<a href="<?= $arResult["URL"] ?>&amp;how=r<? echo $arResult["REQUEST"]["FROM"] ? '&amp;from=' . $arResult["REQUEST"]["FROM"] : '' ?><? echo $arResult["REQUEST"]["TO"] ? '&amp;to=' . $arResult["REQUEST"]["TO"] : '' ?>"><?= GetMessage("SEARCH_SORT_BY_RANK") ?></a>&nbsp;|&nbsp;<b><?= GetMessage("SEARCH_SORTED_BY_DATE") ?></b>
			<? else : ?>
				<b><?= GetMessage("SEARCH_SORTED_BY_RANK") ?></b>&nbsp;|&nbsp;<a href="<?= $arResult["URL"] ?>&amp;how=d<? echo $arResult["REQUEST"]["FROM"] ? '&amp;from=' . $arResult["REQUEST"]["FROM"] : '' ?><? echo $arResult["REQUEST"]["TO"] ? '&amp;to=' . $arResult["REQUEST"]["TO"] : '' ?>"><?= GetMessage("SEARCH_SORT_BY_DATE") ?></a>
			<? endif; ?>
		</p>
		<div class="row">
			<? foreach ($arResult["SEARCH"] as $arItem) : ?>
				<div class="col-lg-6 portfolio-item">
					<div class="card h-100">
						<div class="card-body">
							<a href="<? echo $arItem["URL"] ?>"><? echo $arItem["TITLE_FORMATED"] ?></a>
							<p class="card-text"><? echo $arItem["BODY_FORMATED"] ?></p>
						</div>
					</div>
				</div>
			<? endforeach; ?>
		</div>
		<? if ($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"] ?>
		<br />
	<? else : ?>
		<? ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND")); ?>
	<? endif; ?>
</div>