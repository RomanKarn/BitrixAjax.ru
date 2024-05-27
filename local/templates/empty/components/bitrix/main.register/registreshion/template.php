<?

/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

if ($arResult["SHOW_SMS_FIELD"] == true) {
	CJSCore::Init('phone_auth');
}
?>

<div class="container">
	<? if ($USER->IsAuthorized()) : ?>

		<p><? echo GetMessage("MAIN_REGISTER_AUTH") ?></p>

	<? else : ?>
		<div class="card my-4 mx-auto px-0 col-lg-6 col-sm-12">
			<div class="card-body">
				<h4 class="card-title mb-4 text-center">Регистрация</h4>
				<? if (!empty($arResult["ERRORS"])) : ?>
					<?
					foreach ($arResult["ERRORS"] as $key => $error)
						if (intval($key) == 0 && $key !== 0)
							$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;" . GetMessage("REGISTER_FIELD_" . $key) . "&quot;", $error);
					?>
					<div class="alert alert-danger" role="alert">
						При попытке регистрации возникла ошибка
					</div>
				<? elseif ($arResult["USE_EMAIL_CONFIRMATION"] === "Y") : ?>
					<p><? echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT") ?></p>
				<? endif ?>

				<form method="post" action="<?= POST_FORM_ACTION_URI ?>" name="regform" enctype="multipart/form-data">
					<? foreach ($arResult["SHOW_FIELDS"] as $FIELD) : ?>
						<div class="form-group input-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div>
								<? switch ($FIELD):
									case "PASSWORD": ?>
										<input name='REGISTER[<?= $FIELD ?>]' value="<?= $arResult["VALUES"][$FIELD] ?>" class="form-control <?= !empty($arResult["ERRORS"][$FIELD]) ? " is-invalid" : "" ?>" placeholder="<?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>" type="password" />
										<div class="invalid-feedback"><?= $arResult["ERRORS"][$FIELD] ?></div>
										<? break; ?>
									<?
									case "CONFIRM_PASSWORD": ?>
										<input name='REGISTER[<?= $FIELD ?>]' value="<?= $arResult["VALUES"][$FIELD] ?>" class="form-control <?= !empty($arResult["ERRORS"][$FIELD]) ? " is-invalid" : "" ?>" placeholder="<?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>" type="password" />
										<div class="invalid-feedback"><?= $arResult["ERRORS"][$FIELD] ?></div>
										<? break; ?>
									<?
									default: ?>
										<input name='REGISTER[<?= $FIELD ?>]' value="<?= $arResult["VALUES"][$FIELD] ?>" class="form-control <?= !empty($arResult["ERRORS"][$FIELD]) ? " is-invalid" : "" ?>" placeholder="<?= GetMessage("REGISTER_FIELD_" . $FIELD) ?>" type="text" />
										<div class="invalid-feedback"><?= $arResult["ERRORS"][$FIELD] ?></div>
										<? break; ?>
								<? endswitch; ?>
							</div>
							<? if ($FIELD === "PASSWORD") : ?>
								<div class="form-text text-muted"> <?= $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]; ?> </div>
							<? endif ?>
						</div>
					<? endforeach ?>

					<div class="form-group">
						<label class="label" for="captchaWordField">Введите слово с картинки</label>
						<div class="mb-2">
							<input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>" />
							<img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA" />
						</div>
						<input name="captcha_word" class="form-control <?= !empty($arResult["ERRORS"][0]) ? " is-invalid" : "" ?>" type="text" id="captchaWordField" placeholder="...">
						<div class="invalid-feedback"><?= $arResult["ERRORS"][0] ?></div>
					</div>

					<div class="form-group">
						<input type="submit" name="register_submit_button" class="btn btn-primary btn-block" value="<?= GetMessage("AUTH_REGISTER") ?>" />
					</div>

					<p class="text-center">Уже зарегистрированы? <a href="/auth/index.php">Авторизоваться</a></p>
				</form>
			</div>
		</div>
	<? endif ?>
</div>