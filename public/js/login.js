
var state = 'register'


var login = '<form action="login.php" method="POST">\n' +
    '<input class="text" type="email" name="email" placeholder="Email" required>\n' +
    '<input class="text" type="password" name="password" placeholder="Password" required>\n' +
    '<input type="submit" value="Accedi">\n' +
    '</form>\n' +
    '<p>Non hai un Account? <a href id="switch-form"> Registrati</a></p>'

var register = '<form action="register.php" method="POST">\n' +
    '<input class="text" type="text" name="nome" placeholder="Nome" required>\n' +
    '<input class="text" type="text" name="cognome" placeholder="Cognome" required>\n' +
    '<input class="text" type="text" name="username" placeholder="Username" required>\n' +
    '<input class="text email" type="email" name="email" placeholder="Email" required>\n' +
    '<input class="text" type="password" name="password" placeholder="Password" required>\n' +
    '<input type="submit" value="Registrati">\n' +
    '</form>\n' +
    '<p>Hai gi&agrave; un Account? <a href id="switch-form"> Accedi</a></p>'


function switchToLogin(e) {
    e.preventDefault()
    $('form').fadeOut(300, function(){
        $(this).remove();
        var form = $('#login-form')
        if(state === 'register'){
            form.html(login)
            state = 'login'
        } else {
            form.html(register)
            state = 'register'
        }
        $('#switch-form').click(switchToLogin)

    });
    }


$('#switch-form').click(switchToLogin)