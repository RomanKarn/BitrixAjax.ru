<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)) : ?>

	<div class="container text-center mb-4">
		<div class="row">
			<? foreach ($arResult as $arItem) : ?>
				<div class="col-md-4">
					<a href='<?= $arItem["LINK"] ?? "/" ?>' class="text-white"><?= $arItem["TEXT"] ?? "Главная" ?></a>
				</div>
			<? endforeach ?>
		</div>
	</div>
<? endif ?>