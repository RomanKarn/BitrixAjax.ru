<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?><? if (!empty($arResult)) : ?>
	<div class="row">
		<? foreach ($arResult["ITEMS"] as $arItem) : ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div id="<?= $this->GetEditAreaId($arItem['ID']); ?>"  class="col-lg-4 col-sm-6 portfolio-item">
				<div class="card h-100">
					<a href="<?= $arItem["DETAIL_PAGE_URL"] ?? "" ?>"><img class="card-img-top" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?? "" ?>" alt="Тираннозавр"></a>
					<div class="card-body">
						<h4 class="card-title">
							<a href="dinosaur-item.html"><?= $arItem["NAME"] ?? "" ?></a>
						</h4>
						<p class="card-text"><?= $arItem["PREVIEW_TEXT"] ?? "" ?></p>
					</div>
				</div>
			</div>
		<? endforeach ?>
	</div>
<? endif ?>