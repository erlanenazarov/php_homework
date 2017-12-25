$(document).foundation();


$(document).ready(function () {
    var loginInput = $('#login-input');
    var emailInput = $('#email-input');
    var password1 = $('#password1');
    var password2 = $('#password2');
    var button = $('#register-button');

    function checkForRegistrationAccessibility() {
        if(
            loginInput.val() !== "" && loginInput.attr('data-valid') === 'true' &&
                emailInput.val() !== "" && loginInput.attr('data-valid') === 'true' &&
                password1.val() !== "" && password2.val() !== "" &&
                password1.val() === password2.val()
        ) {
            button.removeAttr('disabled').removeClass('disabled');
        }
    }

    loginInput.on('input', function (e) {
        $.ajax({
            url: '/?action=check_login&login=' + loginInput.val(),
            method: 'POST',
            dataType: 'JSON',
            success: function (response) {
                if(response.result) {
                    $(loginInput).siblings('p').html('Такой логин уже занят!').fadeIn('medium');
                    $(loginInput).attr('data-valid', 'false');
                } else {
                    $(loginInput).siblings('p').fadeOut('fast');
                    $(loginInput).attr('data-valid', 'true');
                }
                checkForRegistrationAccessibility();
            }
        });
    });

    emailInput.on('input', function (e) {
        $.ajax({
            url: '/?action=check_email&email=' + emailInput.val(),
            method: 'POST',
            dataType: 'JSON',
            success: function (response) {
                if(response.result) {
                    $(emailInput).siblings('p').html('Такой e-mail уже используется!').fadeIn('medium');
                    $(emailInput).attr('data-valid', 'false');
                } else {
                    $(emailInput).siblings('p').fadeOut('fast');
                    $(emailInput).attr('data-valid', 'true');
                }
                checkForRegistrationAccessibility();
            },
            error: function () {
                console.error('Ошибка при отправки запроса на Почту');
            }
        });
    });

    password2.on('input', function (e) {
        if(password1.val() !== password2.val()) {
            password2.siblings('p').html('Пароли не совпадают').fadeIn('medium');
        } else {
            password2.siblings('p').fadeOut('fast');
        }
        checkForRegistrationAccessibility();
    });
});