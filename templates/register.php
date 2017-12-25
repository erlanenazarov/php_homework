<html>
<head>
    <meta charset="utf8">
    <title>Заригистрируйтесь!</title>
    <link rel="stylesheet" type="text/css" href="/templates/assets/css/foundation.min.css">
    <link rel="stylesheet" type="text/css" href="/templates/assets/css/app.css">
</head>

<body>
<div class="grid-x grid-padding-x">
    <div class="large-offset-4 large-4 cell">
        <form class="card" style="margin-top: 100px;" method="POST" action="/?action=register">
            <fieldset class="card-section">
                <h3 class="text-center">Регистрация</h3>
                <div class="grid-x grid-padding-x">
                    <div class="small-3 cell">
                        <label for="login-input" class="text-right middle">Логин</label>
                    </div>
                    <div class="small-9 cell">
                        <input type="text" id="login-input" name="login" required>
                        <p class="help-text" style="display: none; color: red;">Бла бла</p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="small-3 cell">
                        <label for="email-input" class="text-right middle">E-Mail</label>
                    </div>
                    <div class="small-9 cell">
                        <input type="email" id="email-input" name="email" required>
                        <p class="help-text" style="display: none; color: red;"></p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="small-3 cell">
                        <label for="password1" class="text-right middle">Пароль</label>
                    </div>
                    <div class="small-9 cell">
                        <input type="password" id="password1" name="password1" required>
                        <p class="help-text" style="display: none; color: red;"></p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="small-3 cell">
                        <label for="password2" class="text-right middle">Повторите Пароль</label>
                    </div>
                    <div class="small-9 cell">
                        <input type="password" id="password2" name="password2" required>
                        <p class="help-text" style="display: none; color: red;"></p>
                    </div>
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="small-8 small-offset-3 cell">
                        <input type="submit" class="button disabled" value="Зарегистрироваться" id="register-button" disabled>
                    </div>
                </div>
                <div>
                    <p>Вы уже зарегистрированы? Тогда <a href="/?action=login">авторизуйтесь</a></p>
                </div>
                <?php if(isset($_REQUEST['error'])): ?>
                    <div>
                        <div class="callout warning">
                            <h5>Ошибка</h5>
                            <p><?php echo($_REQUEST['error']); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </fieldset>
        </form>
    </div>
</div>
</body>

<script src="/templates/assets/js/vendor/jquery.js"></script>
<script src="/templates/assets/js/vendor/foundation.min.js"></script>
<script src="/templates/assets/js/app.js"></script>
</html>