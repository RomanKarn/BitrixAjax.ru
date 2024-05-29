<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Блог");
?><div class="row">
	<div class="col-md-8">
		<? $APPLICATION->IncludeComponent(
			"bitrix:news",
			"dino_blog",
			array(
				"ADD_ELEMENT_CHAIN" => "Y",
				"ADD_SECTIONS_CHAIN" => "Y",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"BROWSER_TITLE" => "-",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "N",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "N",
				"CHECK_DATES" => "Y",
				"DETAIL_ACTIVE_DATE_FORMAT" => "j F Y",
				"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
				"DETAIL_DISPLAY_TOP_PAGER" => "N",
				"DETAIL_FIELD_CODE" => array("NAME", "PREVIEW_PICTURE", "DETAIL_TEXT", "DATE_CREATE", "CREATED_USER_NAME", ""),
				"DETAIL_PAGER_SHOW_ALL" => "Y",
				"DETAIL_PAGER_TEMPLATE" => "",
				"DETAIL_PAGER_TITLE" => "Страница",
				"DETAIL_PROPERTY_CODE" => array("", ""),
				"DETAIL_SET_CANONICAL_URL" => "N",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_ID" => "5",
				"IBLOCK_TYPE" => "blog",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"LIST_ACTIVE_DATE_FORMAT" => "j F Y",
				"LIST_FIELD_CODE" => array("NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", "DATE_CREATE", "CREATED_USER_NAME", ""),
				"LIST_PROPERTY_CODE" => array("", ""),
				"MESSAGE_404" => "",
				"META_DESCRIPTION" => "-",
				"META_KEYWORDS" => "-",
				"NEWS_COUNT" => "2",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => "nav_page_dino",
				"PAGER_TITLE" => "Новости",
				"PREVIEW_TRUNCATE_LEN" => "",
				"SEF_FOLDER" => "/blog/",
				"SEF_MODE" => "Y",
				"SEF_URL_TEMPLATES" => array("detail" => "#SECTION_CODE#/#ELEMENT_CODE#/", "news" => "", "section" => "#SECTION_CODE#/"),
				"SET_LAST_MODIFIED" => "N",
				"SET_STATUS_404" => "Y",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SORT_BY1" => "ACTIVE_FROM",
				"SORT_BY2" => "SORT",
				"SORT_ORDER1" => "DESC",
				"SORT_ORDER2" => "ASC",
				"STRICT_SECTION_CHECK" => "N",
				"USE_CATEGORIES" => "N",
				"USE_FILTER" => "N",
				"USE_PERMISSIONS" => "N",
				"USE_RATING" => "N",
				"USE_REVIEW" => "N",
				"USE_RSS" => "N",
				"USE_SEARCH" => "N",
				"USE_SHARE" => "N"
			)
		); ?>
	</div>
	<div class="col-md-4">
		<div class="card mb-4">
			<h5 class="card-header">Найти в блоге</h5>
			<div class="card-body">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Поиск...">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</div>
		</div>
		<div class="card my-4">
			<h5 class="card-header">Темы</h5>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-6">
						<? $APPLICATION->IncludeComponent(
							"bitrix:catalog.section.list",
							"dino_blog_section",
							array(
								"ADDITIONAL_COUNT_ELEMENTS_FILTER" => "additionalCountFilter",
								"ADD_SECTIONS_CHAIN" => "N",
								"CACHE_FILTER" => "N",
								"CACHE_GROUPS" => "N",
								"CACHE_TIME" => "36000000",
								"CACHE_TYPE" => "N",
								"COUNT_ELEMENTS" => "Y",
								"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
								"FILTER_NAME" => "sectionsFilter",
								"HIDE_SECTIONS_WITH_ZERO_COUNT_ELEMENTS" => "N",
								"IBLOCK_ID" => "5",
								"IBLOCK_TYPE" => "blog",
								"SECTION_CODE" => "",
								"SECTION_FIELDS" => array(0 => "NAME", 1 => "",),
								"SECTION_ID" => $_REQUEST["SECTION_ID"],
								"SECTION_URL" => "",
								"SECTION_USER_FIELDS" => array(0 => "", 1 => "",),
								"SHOW_PARENT_NAME" => "Y",
								"TOP_DEPTH" => "2",
								"VIEW_MODE" => "LINE"
							)
						); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>