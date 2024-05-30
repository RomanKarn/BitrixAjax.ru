<?
if (!empty($arResult)) {

    foreach($arResult["ITEMS"] as $key => $arItems)
    {
        $arFilter= ["ID"=>$arItems["PROPERTIES"]["ID_CRIATERS"]["VALUE"]];
        $userOb = CUser::GetList(array(),array(),$arFilter);
        if(!empty($userOb))
        {
            $user = $userOb->Fetch();
            $arSrc = CFile::GetFileArray($user["PERSONAL_PHOTO"]);
            $arResult["ITEMS"][$key]["PROPERTIES"]["ICON"] = $arSrc["SRC"];
            $arResult["ITEMS"][$key]["PROPERTIES"]["ID_CRIATERS"]["LOGIN"] = $user["LOGIN"];
        }
    }
}
