<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?><?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "auth", Array(
	"FORGOT_PASSWORD_URL" => "/auth/forget.php",	// Страница забытого пароля
		"PROFILE_URL" => "/auth/personal.php",	// Страница профиля
		"REGISTER_URL" => "/auth/registrashion.php",	// Страница регистрации
		"SHOW_ERRORS" => "N",	// Показывать ошибки
	),
	false
);?>
<!-- <?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.confirmation",
	"",
	Array(
		"CONFIRM_CODE" => "confirm_code",
		"LOGIN" => "login",
		"USER_ID" => "confirm_user_id"
	)
);?> Зачем это вообще нужно ? -->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>