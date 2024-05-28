<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
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
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>