<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init();

?>


<div class="container">
	<div class="card my-4 mx-auto px-0 col-lg-6 col-sm-12">
		<? if ($arResult["FORM_TYPE"] == "login") : ?>
			<div class="card-body">
				<h4 class="card-title mb-4 text-center">Авторизация</h4>

				<? if (!empty($arResult["ERROR_MESSAGE"])) : ?>
					<div class="alert alert-danger" role="alert">
						Неверный логин или пароль.
					</div>
				<? endif ?>

				<form name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>">
					<? foreach ($arResult["POST"] as $key => $value) : ?>
						<input type="hidden" name="<?= $key ?>" value="<?= $value ?>" />
					<? endforeach ?>
					<input type="hidden" name="AUTH_FORM" value="Y" />
					<input type="hidden" name="TYPE" value="AUTH" />
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-fingerprint"></i> </span>
							</div>
							<input name="USER_LOGIN" class="form-control" placeholder="<?= GetMessage("AUTH_LOGIN") ?>" type="text">
							<script>
								BX.ready(function() {
									var loginCookie = BX.getCookie("<?= CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"]) ?>");
									if (loginCookie) {
										var form = document.forms["system_auth_form<?= $arResult["RND"] ?>"];
										var loginInput = form.elements["USER_LOGIN"];
										loginInput.value = loginCookie;
									}
								});
							</script>
						</div>
					</div>
					<div class="form-group">
						<div class=" input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-lock"></i></span>
							</div>
							<input class="form-control" name="USER_PASSWORD" placeholder="<?= GetMessage("AUTH_PASSWORD") ?>" type="password">
						</div>
					</div>
					<div class="form-group">
						<div class="form-check">
							<input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y" />
							<label class="form-check-label" for="USER_REMEMBER_frm"><?= GetMessage("AUTH_REMEMBER_SHORT") ?></label>
						</div>
					</div>

					<div class="form-group">
						<input type="submit" name="Login" class="btn btn-primary btn-block" value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>" />
					</div>

					<p class="text-center"><a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></a></p>
					<p class="text-center">Впервые на сайте? <a href="<?= $arResult["AUTH_REGISTER_URL"] ?>"><?= GetMessage("AUTH_REGISTER") ?></a></p>
				</form>
			</div>
		<? else : ?>
			Вы уже в матрице.
		<? endif ?>
	</div>
</div>
</div>