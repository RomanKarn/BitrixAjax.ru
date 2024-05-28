<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="row">
	<div class="col-lg-8 mb-4">
		<h3>Хочу динозаврика</h3>
		<? if (!empty($arResult["ERROR_MESSAGE"])) {
			foreach ($arResult["ERROR_MESSAGE"] as $v)
				ShowError($v);
		}
		if ($arResult["OK_MESSAGE"] <> '') {
		?>
			<div id="success" class="mf-ok-text"><?= $arResult["OK_MESSAGE"] ?></div>
		<? } ?>
		<form id="contact-form" class="default-form" action="<?= POST_FORM_ACTION_URI ?>" method="post">
			<?= bitrix_sessid_post() ?>
			<div class="control-group form-group">
				<div class="controls">
					<label for="name">Ваше имя:</label>
					<input name="user_name"  type="text" class="form-control" placeholder="Введите ваше имя..." value="<?= $arResult["AUTHOR_NAME"] ?>" />
					<p class="help-block"></p>
				</div>
			</div>
			<div class="control-group form-group">
				<div class="controls">
					<label for="phone">Телефон:</label>
					<input name="user_phone" type="tel" class="form-control" required placeholder="+7(000)000-00-00" value="<?= $arResult["AUTHOR_PHONE"] ?>" />
				</div>
			</div>
			<div class="control-group form-group">
				<div class="controls">
					<label for="email">Email:</label>
					<input name="user_email"  type="email" class="form-control" required placeholder="email@example.com" value="<?= $arResult["AUTHOR_EMAIL"] ?>" />
				</div>
			</div>
			<div class="control-group form-group">
				<div class="controls">
					<label for="message">Комментарий:</label>
					<textarea name="MESSAGE" rows="10" cols="100" class="form-control" required style="resize:none" placeholder="Введите какого обжорозаврика вы хотите и почему..."><?= $arResult["MESSAGE"] ?></textarea>
				</div>
			</div>
			<div class="col-md-12 col-sm-12">
				<input type="hidden" name="PARAMS_HASH" value="<?= $arResult["PARAMS_HASH"] ?>">
				<input type="submit" class="btn btn-primary" name="submit" value="<?= GetMessage("MFT_SUBMIT") ?>">
			</div>
		</form>
		<p class="form-messege"></p>
	</div>
</div>