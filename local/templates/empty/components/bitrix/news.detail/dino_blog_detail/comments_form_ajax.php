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
            $arFilter= ["ID"=>$_POST["ID_USER"]];
            $userOb = CUser::GetList(array(),array(),$arFilter);
            $user = $userOb->Fetch();

            $arSrc = CFile::GetFileArray($user["PERSONAL_PHOTO"]);
            
            $icon["ICON"] = $arSrc["SRC"];
            $login["LOGIN"] = $user["LOGIN"];
            $return["CODE"] = true;
            $return["DATA"] = array_merge($arLoadProductArray,$login, $icon);
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
    $return["DATA"] = "Вы не авторизованы";
    die(json_encode($return));
}
