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

<section>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<? for ($i = 0; $i < count($arResult["ITEMS"]); $i++) : ?>
				<li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" <?= ($i == 0) ? 'class="active"' : "" ?>></li>
			<? endfor ?>
		</ol>
		<div class="carousel-inner" role="listbox">
			<? foreach ($arResult["ITEMS"] as $arItem) : ?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="carousel-item <?= ($arItem == $arResult["ITEMS"][0]) ? "active" : "" ?>" style="background-image: url('<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>')">
					<div class="carousel-caption d-none d-md-block">
						<h3><?= $arItem["NAME"] ?></h3>
						<hr class="border-light">
						<div>
							<p><?= $arItem["PREVIEW_TEXT"] ?></p>

							<hr class="border-light">
							<? if (!empty($arItem["DETAIL_TEXT"])) : ?>
								<p><a class="btn btn-info" href="<?= $arItem["DETAIL_TEXT"] ?>">Подробнее</a></p>
							<? endif ?>
						</div>
					</div>
				</div>
			<? endforeach ?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</section>