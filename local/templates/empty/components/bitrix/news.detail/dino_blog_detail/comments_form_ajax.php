<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$return = ["CODE" => false, "DATA" => ""];
if ($USER->IsAuthorized()) {
    if (CModule::IncludeModule("iblock")) {
        $el = new CIBlockElement;
        $PROP = array();
        $PROP[4] = $_POST["ID_BLOG"];
        $PROP[5] = $_POST["ID_USER"];
        $TEXT = $_POST["TEXT"];
        $arLoadProductArray = array(
            "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
            "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
            "IBLOCK_ID"      => 6,
            "IBLOCK_TYPE" => "blog",
            "NAME"           => time(),
            "CODE" => time(),
            "PROPERTY_VALUES" => $PROP,
            "PREVIEW_TEXT"   => $TEXT,
            "ACTIVE"         => "Y",            // активен

        );
        if ($PRODUCT_ID = $el->Add($arLoadProductArray))
        {
            $return["CODE"] = true;
            $return["DATA"] = $arLoadProductArray;
            die(json_encode($return));
        }
        else
        {
            $return["DATA"] = $el->LAST_ERROR;
            die(json_encode($return));
        }
    }
}
else
{
   
    die(json_encode($return));
}
