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
	<form action="" method="get">
		<div class="input-group mb-3">
			<? if ($arParams["USE_SUGGEST"] === "Y") :
				if (mb_strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"])) {
					$arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
					$obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
					$obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
				}
			?>
				<? $APPLICATION->IncludeComponent(
					"bitrix:search.suggest.input",
					"",
					array(
						"NAME" => "q",
						"VALUE" => $arResult["REQUEST"]["~QUERY"],
						"INPUT_SIZE" => 40,
						"DROPDOWN_SIZE" => 10,
						"FILTER_MD5" => $arResult["FILTER_MD5"],
					),
					$component,
					array("HIDE_ICONS" => "Y")
				); ?>
			<? else : ?>
				<input class="form-control" type="text" name="q" value="<?= $arResult["REQUEST"]["QUERY"] ?>" />
			<? endif; ?>
			<input class="btn btn-outline-secondary" type="submit" value="<?= GetMessage("SEARCH_GO") ?>" />
			<input type="hidden" name="how" value="<? echo $arResult["REQUEST"]["HOW"] == "d" ? "d" : "r" ?>" />
			<? if ($arParams["SHOW_WHEN"]) : ?>
				<script>
					var switch_search_params = function() {
						var sp = document.getElementById('search_params');
						var flag;
						var i;

						if (sp.style.display == 'none') {
							flag = false;
							sp.style.display = 'block'
						} else {
							flag = true;
							sp.style.display = 'none';
						}

						var from = document.getElementsByName('from');
						for (i = 0; i < from.length; i++)
							if (from[i].type.toLowerCase() == 'text')
								from[i].disabled = flag;

						var to = document.getElementsByName('to');
						for (i = 0; i < to.length; i++)
							if (to[i].type.toLowerCase() == 'text')
								to[i].disabled = flag;

						return false;
					}
				</script>
				<br /><a class="search-page-params" href="#" onclick="return switch_search_params()"><? echo GetMessage('CT_BSP_ADDITIONAL_PARAMS') ?></a>
				<div id="search_params" class="search-page-params" style="display:<? echo $arResult["REQUEST"]["FROM"] || $arResult["REQUEST"]["TO"] ? 'block' : 'none' ?>">
					<? $APPLICATION->IncludeComponent(
						'bitrix:main.calendar',
						'',
						array(
							'SHOW_INPUT' => 'Y',
							'INPUT_NAME' => 'from',
							'INPUT_VALUE' => $arResult["REQUEST"]["~FROM"],
							'INPUT_NAME_FINISH' => 'to',
							'INPUT_VALUE_FINISH' => $arResult["REQUEST"]["~TO"],
							'INPUT_ADDITIONAL_ATTR' => 'size="10"',
						),
						null,
						array('HIDE_ICONS' => 'Y')
					); ?>
				</div>
			<? endif ?>
		</div>
	</form>

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
		<? if ($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"] ?>
		<br />
		<hr />
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