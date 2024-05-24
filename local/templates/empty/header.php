<?
use Bitrix\Main\Page\Asset;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html>

<head>
	<title><? $APPLICATION->ShowTitle(); ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	<? Asset::getInstance()->addJs('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');?>

	<? Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/main.css");?>
	<? Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/main.js");?>
	<? $APPLICATION->ShowHead(); ?>
</head>

<body>
	<div id="panel">
		<? $APPLICATION->ShowPanel(); ?>
	</div>
	<header>
	<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"catalog_horizontal",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "top",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(""),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_THEME" => "blue",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N"
	)
);?>
	</header>