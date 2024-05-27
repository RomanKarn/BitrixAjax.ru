<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)) : ?>
	<? foreach ($arResult as $arItem) : ?>
		<li class="nav-item">
			<a class="nav-link" href='<?= $arItem["LINK"] ?? "/" ?>'><?= $arItem["TEXT"] ?? "Главная" ?></a>
		</li>
	<? endforeach ?>
<? endif ?>