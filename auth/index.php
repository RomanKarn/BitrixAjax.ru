<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?><?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"",
	Array(
		"FORGOT_PASSWORD_URL" => "/auth/forget.php",
		"PROFILE_URL" => "/auth/personal.php",
		"REGISTER_URL" => "/auth/registrashion.php",
		"SHOW_ERRORS" => "N"
	)
);?><?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.confirmation",
	"",
	Array(
		"CONFIRM_CODE" => "confirm_code",
		"LOGIN" => "login",
		"USER_ID" => "confirm_user_id"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>