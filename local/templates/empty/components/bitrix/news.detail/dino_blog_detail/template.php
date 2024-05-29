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

<? if (!empty($arResult['PREVIEW_PICTURE'])) : ?>
	<a href="<?= $arResult['PREVIEW_PICTURE']["SRC"] ?>" data-fancybox data-caption="Велоцираптор Веган">
		<img class="img-fluid rounded" src="<?= $arResult['PREVIEW_PICTURE']["SRC"] ?>" alt="Велоцираптор Веган">
	</a>
<? endif ?>
<hr>
<h6 class="card-subtitle mb-2 text-muted">
	<? foreach ($arResult["SECTIONS_NAMES"] as $arItemName) : ?>
		<?
		$sing  =  ($key !== count($arResult["SECTIONS_NAMES"])) ? "," : " "; ?>
		<?= $arItemName . $sing  ?? "" ?>
	<? endforeach ?>

</h6>
<p>Опубликовано <?= $arResult["DATE_CREATE"] ?? "" ?>, автор: <a href="#"><?= $arResult["CREATED_USER_NAME"] ?? "Аноним"?></a></p>

<hr>

<?= $arResult["DETAIL_TEXT"] ?? ""?>

<hr>

<div class="card my-4">
	<h5 class="card-header">Комментировать</h5>
	<div class="card-body">
		<form>
			<div class="form-group">
				<textarea class="form-control" rows="3" placeholder="Ваш комментарий..."></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Отправить</button>
		</form>
	</div>
</div>

<div class="media mb-4">
	<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
	<div class="media-body">
		<h5 class="mt-0">Commenter Name</h5>
		Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
	</div>
</div>

<div class="media mb-4">
	<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
	<div class="media-body">
		<h5 class="mt-0">Commenter Name</h5>
		Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
	</div>
</div>

<div class="media mb-4">
	<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
	<div class="media-body">
		<h5 class="mt-0">Commenter Name</h5>
		Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
	</div>
</div>

<div class="media mb-4">
	<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
	<div class="media-body">
		<h5 class="mt-0">Commenter Name</h5>
		Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
	</div>
</div>