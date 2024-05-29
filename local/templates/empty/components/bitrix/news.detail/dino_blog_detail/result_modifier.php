<?
if (!empty($arResult)) {

    $dbSections = CIBlockElement::GetElementGroups($arResult["ID"]);
    $arSections = [];
    while ($el = $dbSections->Fetch()) {
        $arSections[] = $el;
    }

    // Получение имя разделов для элемента
    if (isset($arResult['ID'])) {
        $arElementSectionsCodes = [];
        foreach ($arSections as $section) {
            if ($arResult['ID'] == $section['IBLOCK_ELEMENT_ID']) {
                $arElementSectionsCodes[] = $section['NAME'];
            }
        }

        $arResult['SECTIONS_NAMES'] = $arElementSectionsCodes;
    } else {
        $arResult['SECTIONS_NAMES'] = '';
    }
}
