<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
	</div> <!--нужен для закрытия дива, который идет из хедера контейнера на всех страницах -->
</div>
<footer class="py-5 bg-dark">
	<? $APPLICATION->IncludeComponent(
		"bitrix:menu",
		"buttom_menu",
		array(
			"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
			"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
			"DELAY" => "N",	// Откладывать выполнение шаблона меню
			"MAX_LEVEL" => "1",	// Уровень вложенности меню
			"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
				0 => "",
			),
			"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
			"MENU_CACHE_TYPE" => "N",	// Тип кеширования
			"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
			"ROOT_MENU_TYPE" => "left",	// Тип меню для первого уровня
			"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		),
		false
	); ?>
	<div class="container">
		<p class="m-0 text-center text-white">
			Copyright &copy; Обжорозаврик 2020.
			Создано для проекта <a href="https://bitrixcasts.ru" rel="nofollow" target="_blank">BitrixCasts</a>.
			Автор <a href="https://mvsvolkov.ru" rel="nofollow" target="_blank">Волков Михаил</a> <i class="fas fa-heart text-danger"></i>
		</p>
	</div>
</footer>
</body>

</html>