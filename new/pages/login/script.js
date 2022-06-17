tryAuthWithToken();
var log = $('#login'), pass = $("#pass");
$('.button').click(function () {
    //field blank check
    if (log.val() === '' || pass.val() === '') {
        $('.spacing').addClass('red_auto');
        $('p').removeClass('none');
        $('p').text('! Введите логин или пароль');
        } else {
        $('.spacing').removeClass('red_auto');
        $('p').addClass('none');

        //data transmission
        authWithCredentials();
    }
})

$(document).on('keypress',function(event){
    if(event.which === 13){authWithCredentials(); }
})

function authWithCredentials() {
    $.ajax({
        type: "POST",
        data: {
            email_OR_inn: log.val(),
            password: pass.val()
        },
        url: "https://covidlist.online/api/authentication/check/login-or-token",
        success: (msg) => {
            console.log(msg)
            var json = JSON.parse(msg);
            stop();
            // check on the right data
            if (json['action'] === 'success' && json['role'] === 'superadmin') {
                //add cookies
                document.cookie = "DBname=" + json["DBname"];
                document.cookie = "token=" + json["token"];
                document.cookie = "role=" + json["role"];

                $('.spacing').removeClass('red_auto');
                $('p').addClass('none');
                window.location.href = '/sysadmins';
            } else {
                $('.spacing').addClass('red_auto');
                $('p').removeClass('none');
                $('p').text('! Неправильно введены данные');
                console.log('wrong');
            }
        },
        //no response from php file
        error: (msg) => {
            console.log("error" + "/n" + msg);
        }
    })
}

function tryAuthWithToken() {
    $.ajax({
        type: "POST",
        data: {
            DBname: getCookie("DBname"),
            token: getCookie("token"),
        },
        url: "https://covidlist.online/api/authentication/check/login-or-token",
        success: (msg) => {
            var json = JSON.parse(msg);

            // Checking for correct data entry
            if (json['action'] === 'success') {
                window.location.href = '/sysadmins';
            } else if (json['action'] === 'error-Token-Not-Found') {
                console.log("error-Token-Not-Found");
                deleteCookie("DBname");
                deleteCookie("token");
                deleteCookie("role");
                console.log("cookie has been deleted");
            }
        },
    })
}

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

function deleteCookie(name) {
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}