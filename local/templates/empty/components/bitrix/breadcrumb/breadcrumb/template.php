<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if (empty($arResult))
	return "";

$strReturn = '';

$strReturn .= '<ol class="breadcrumb">';

$elCount = count($arResult);
foreach ($arResult as $index => $item) {
	$link = (!empty($item['LINK']) && $index < ($elCount - 1)) ? $item['LINK'] : '#';
	$title = $item['TITLE'] ?? '';
	if ($link != '#') {
		$strReturn .= '<li class="breadcrumb-item">
		<a href="' . $link . '">' . $title . '</a>
	</li>';
	}
	else
	{
		$strReturn .= '<li class="breadcrumb-item active">' . $title . ' </li>';
	}
}
$strReturn .= '</ol>';

return $strReturn;
