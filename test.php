<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("test");
?><?$APPLICATION->IncludeComponent("bitrix:search.title", "search_bar_dino", Array(
	"CATEGORY_0" => array(	// Ограничение области поиска
			0 => "iblock_content",
		),
		"CATEGORY_0_TITLE" => "",	// Название категории
		"CATEGORY_0_iblock_content" => array(	// Искать в информационных блоках типа "iblock_content"
			0 => "2",
		),
		"CHECK_DATES" => "N",	// Искать только в активных по дате документах
		"CONTAINER_ID" => "title-search",	// ID контейнера, по ширине которого будут выводиться результаты
		"INPUT_ID" => "title-search-input",	// ID строки ввода поискового запроса
		"NUM_CATEGORIES" => "1",	// Количество категорий поиска
		"ORDER" => "date",	// Сортировка результатов
		"PAGE" => "#SITE_DIR#search-dino/index.php",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
		"SHOW_INPUT" => "Y",	// Показывать форму ввода поискового запроса
		"SHOW_OTHERS" => "N",	// Показывать категорию "прочее"
		"TOP_COUNT" => "5",	// Количество результатов в каждой категории
		"USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
	),
	false
);?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>