<?
if (!empty($arResult['ITEMS'])) {
    $arElementsIds = [];
    foreach ($arResult['ITEMS'] as  $arItem) {
        if (isset($arItem['ID'])) {
            $arElementsIds[] = $arItem['ID'];
        }
    }

    $dbSections = CIBlockElement::GetElementGroups($arElementsIds);
    $arSections = [];
    while ($el = $dbSections->Fetch()) {
        $arSections[] = $el;
    }


    foreach ($arResult['ITEMS'] as $itemKey => $arItem) {
        // Получение имя разделов для элемента
        if (isset($arItem['ID'])) {
            $arElementSectionsCodes = [];
            foreach ($arSections as $section) {
                if ($arItem['ID'] == $section['IBLOCK_ELEMENT_ID']) {
                    $arElementSectionsCodes[] = $section['NAME'];
                }
            }

            $arResult['ITEMS'][$itemKey]['SECTIONS_NAMES'] = $arElementSectionsCodes;
        } else {
            $arResult['ITEMS'][$itemKey]['SECTIONS_NAMES'] = '';
        }
    }
}