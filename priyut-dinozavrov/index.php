<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Приют динозавров");
?>

<div class="row">
    <div class="col-lg-6">
        <a href="images/dino_at_home.jpg" data-fancybox data-caption="Приют динозавриков">
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "include_main_page",
                array(
                    "AREA_FILE_SHOW" => "file",    // Показывать включаемую область
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => SITE_TEMPLATE_PATH . "/include/priyut-dinozavrov/",    // Шаблон области по умолчанию
                    "PATH" => SITE_TEMPLATE_PATH . "/include/priyut-dinozavrov/foto.php",    // Путь к файлу области
                ),
                false
            ); ?>
        </a>
    </div>
    <div class="col-lg-6">
        <h2>
            <? $APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "include_main_page",
                array(
                    "AREA_FILE_SHOW" => "file",    // Показывать включаемую область
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => SITE_TEMPLATE_PATH . "/include/priyut-dinozavrov/",    // Шаблон области по умолчанию
                    "PATH" => SITE_TEMPLATE_PATH . "/include/priyut-dinozavrov/titel.php",    // Путь к файлу области
                ),
                false
            ); ?>
        </h2>
        <? $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "include_main_page",
            array(
                "AREA_FILE_SHOW" => "file",    // Показывать включаемую область
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => SITE_TEMPLATE_PATH . "/include/priyut-dinozavrov/",    // Шаблон области по умолчанию
                "PATH" => SITE_TEMPLATE_PATH . "/include/priyut-dinozavrov/text.php",    // Путь к файлу области
            ),
            false
        ); ?>
    </div>
</div>

<h2>Динозаврики ищут дом</h2>

<? $APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "priute_dino_list",
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
        "CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
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
        "IBLOCK_ID" => "3",    // Код информационного блока
        "IBLOCK_TYPE" => "content",    // Тип информационного блока (используется только для проверки)
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
        "INCLUDE_SUBSECTIONS" => "Y",    // Показывать элементы подразделов раздела
        "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
        "NEWS_COUNT" => "3",    // Количество новостей на странице
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
            0 => "CHARACTERISTICS_OF_DINOSAURS",
            1 => "",
        ),
        "SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
        "SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
        "SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
        "SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
        "SET_STATUS_404" => "Y",    // Устанавливать статус 404
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

<hr>

<?$APPLICATION->IncludeComponent(
	"myComponents:main.feedback",
	"feedback_duno_priute",
	Array(
		"EMAIL_TO" => "stalker.karnuhov@yandex.ru",
		"EVENT_MESSAGE_ID" => array("7"),
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"REQUIRED_FIELDS" => array("NAME","EMAIL","MESSAGE","PHONE"),
		"USE_CAPTCHA" => "N"
	)
);?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>