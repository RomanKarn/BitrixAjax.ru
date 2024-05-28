<?

use Bitrix\Main\Page\Asset;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html>

<head>

	<title>Обжорозаврик - Приюти и покорми динозаврика</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Волков Михаил">

	<link rel="apple-touch-icon" sizes="180x180" href="<?= SITE_TEMPLATE_PATH ?>  /assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= SITE_TEMPLATE_PATH ?>  /assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= SITE_TEMPLATE_PATH ?>  /assets/favicon/favicon-16x16.png">

	<?
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/vendor/bootstrap/css/bootstrap.min.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/vendor/jquery.fancybox/jquery.fancybox.min.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/vendor/fontawesome-free/css/all.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/css/styles.css");
	?>
	<?
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/vendor/jquery/jquery.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/vendor/bootstrap/js/bootstrap.bundle.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/vendor/jquery.fancybox/jquery.fancybox.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/assets/js/script.js");
	?>

	<? $APPLICATION->ShowHead(); ?>
</head>

<body>


	<div class="main-wrapper" id="app">

		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
			<div id="panel">
				<? $APPLICATION->ShowPanel(); ?>
			</div>
			<div class="container">
				<a class="navbar-brand" href="/index.php">Обжорозаврик <i class="fas fa-dragon"></i></a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<? $APPLICATION->IncludeComponent(
							"bitrix:menu",
							"top_menu",
							array(
								"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
								"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
								"DELAY" => "N",	// Откладывать выполнение шаблона меню
								"MAX_LEVEL" => "1",	// Уровень вложенности меню
								"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
									0 => "",
								),
								"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
								"MENU_CACHE_TYPE" => "N",	// Тип кеширования
								"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
								"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
								"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							),
							false
						); ?>
						<? if (!($USER->IsAuthorized())) : ?>
							<li class="nav-item">
								<a class="btn btn-secondary" href="/auth/index.php">Войти</a>
								<a class="btn btn-outline-secondary" href="/auth/registrashion.php">Зарегистрироваться</a>
							</li>
						<? else : ?>
							<li class="nav-item">
								<a class="btn btn-secondary" href="/auth/personal.php"><?= $USER->GetLogin() ?></a>
							</li>

						<? endif ?>
						<? if ($USER->IsAuthorized()) : ?>
							<li class="nav-item dropdown">
								<a class="avatar-link nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img src="<?= CFile::GetPath($USER->GetParam("PERSONAL_PHOTO")) ?? SITE_TEMPLATE_PATH . "/assets/images/avartar-dinosaur-100.png" ?>" class="rounded-circle bg-white avatar-img" alt="Аватар">
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
									<a class="dropdown-item" href="/auth/personal.php">Личный кабинет</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="/?logout=yes&<?= bitrix_sessid_get() ?>">Выйти</a> <!-- почему это работет -->
								</div>
							</li>
						<? endif ?>
					</ul>
				</div>
			</div>
		</nav>

		<? if ($APPLICATION->GetCurPageParam() !== "/") : ?>
			<div class="container">

				<h1 class="mt-4 mb-3"><?= $APPLICATION->ShowTitle(false, false) ?></h1>

				<? $APPLICATION->IncludeComponent(
					"bitrix:breadcrumb",
					"breadcrumb",
					array(
						"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
						"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
						"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
					),
					false
				); ?>
			<? else : ?>

				<? $APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"slider_main_page",
					array(
						"ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
						"ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
						"AJAX_MODE" => "N",    // Включить режим AJAX
						"AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
						"AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
						"AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
						"AJAX_OPTION_STYLE" => "N",    // Включить подгрузку стилей
						"CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
						"CACHE_GROUPS" => "N",    // Учитывать права доступа
						"CACHE_TIME" => "36000000",    // Время кеширования (сек.)
						"CACHE_TYPE" => "N",    // Тип кеширования
						"CHECK_DATES" => "N",    // Показывать только активные на данный момент элементы
						"DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
						"DISPLAY_BOTTOM_PAGER" => "N",    // Выводить под списком
						"DISPLAY_DATE" => "N",    // Выводить дату элемента
						"DISPLAY_NAME" => "Y",    // Выводить название элемента
						"DISPLAY_PICTURE" => "Y",    // Выводить изображение для анонса
						"DISPLAY_PREVIEW_TEXT" => "Y",    // Выводить текст анонса
						"DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
						"FIELD_CODE" => array(    // Поля
							0 => "NAME",
							1 => "PREVIEW_TEXT",
							2 => "PREVIEW_PICTURE",
							3 => "DETAIL_TEXT",
							4 => "",
						),
						"FILTER_NAME" => "",    // Фильтр
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
						"IBLOCK_ID" => "1",    // Код информационного блока
						"IBLOCK_TYPE" => "content",    // Тип информационного блока (используется только для проверки)
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
						"INCLUDE_SUBSECTIONS" => "N",    // Показывать элементы подразделов раздела
						"MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
						"NEWS_COUNT" => "4",    // Количество новостей на странице
						"PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
						"PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
						"PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
						"PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
						"PAGER_TEMPLATE" => ".default",    // Шаблон постраничной навигации
						"PAGER_TITLE" => "Новости",    // Название категорий
						"PARENT_SECTION" => "",    // ID раздела
						"PARENT_SECTION_CODE" => "",    // Код раздела
						"PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
						"PROPERTY_CODE" => array(    // Свойства
							0 => "",
							1 => "",
						),
						"SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
						"SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
						"SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
						"SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
						"SET_STATUS_404" => "N",    // Устанавливать статус 404
						"SET_TITLE" => "N",    // Устанавливать заголовок страницы
						"SHOW_404" => "N",    // Показ специальной страницы
						"SORT_BY1" => "SORT",    // Поле для первой сортировки новостей
						"SORT_BY2" => "SORT",    // Поле для второй сортировки новостей
						"SORT_ORDER1" => "ASC",    // Направление для первой сортировки новостей
						"SORT_ORDER2" => "ASC",    // Направление для второй сортировки новостей
						"STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа списка
					),
					false
				); ?>
				<div class="container">
					<h1 class="mt-4 mb-3"><?= $APPLICATION->ShowTitle(false, false) ?></h1>

				<? endif ?>