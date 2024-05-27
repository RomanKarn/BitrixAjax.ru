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

	<? Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/main.css");?>
	<? Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/main.js");?>
	<? CJSCore::Init(array("jquery"));?>
	<? $APPLICATION->ShowHead(); ?>
</head>

<body>
	<div id="panel">
		<? $APPLICATION->ShowPanel(); ?>
	</div>
	<header>

	</header>