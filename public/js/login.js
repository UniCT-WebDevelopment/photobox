$( "#switch-form-login" ).click(function(e) {
    e.preventDefault();
    $('#signin-form').addClass('hide');
    $('#signin-form').removeClass('show');

    $('#login-form').addClass('show');
    $('#login-form').removeClass('hide');
});

$( "#switch-form-signin" ).click(function(e) {
    e.preventDefault();
    $('#signin-form').addClass('show');
    $('#signin-form').removeClass('hide');

    $('#login-form').addClass('hide');
    $('#login-form').removeClass('show');
});