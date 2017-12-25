<html>
    <head>
        <meta charset="utf8">
        <title>Авторизуйтесь!</title>
        <link rel="stylesheet" type="text/css" href="/templates/assets/css/foundation.min.css">
        <link rel="stylesheet" type="text/css" href="/templates/assets/css/app.css">
    </head>

    <body>
        <div class="grid-x grid-padding-x">
            <div class="large-offset-4 large-4 cell">
                <form class="card" style="margin-top: 100px;" method="POST" action="/?action=login">
                    <fieldset class="card-section">
                        <h3 class="text-center">Авторизуйтесь пожалуйста</h3>
                        <div class="grid-x grid-padding-x">
                            <div class="small-3 cell">
                                <label for="middle-label" class="text-right middle">Логин</label>
                            </div>
                            <div class="small-9 cell">
                                <input type="text" id="middle-label" name="login">
                            </div>
                        </div>
                        <div class="grid-x grid-padding-x">
                            <div class="small-3 cell">
                                <label for="middle-label" class="text-right middle">Пароль</label>
                            </div>
                            <div class="small-9 cell">
                                <input type="password" id="middle-label" name="password">
                            </div>
                        </div>
                        <div class="grid-x grid-padding-x">
                            <div class="small-8 small-offset-3 cell">
                                <input type="submit" class="button" value="Войти">
                            </div>
                        </div>
                        <div>
                            <p>У вас нет профиля? Тогда <a href="/?action=register">Зарегистрируйтесь</a></p>
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