// $(document).ready(function () {

//     let log = $('#text'), pass = $("#pass");

//     $('.button').click(function () {

//         //проверка на пустоту полей   
        
//         if (log.val() == '' || pass.val() == '') {
//             $('.spacing').addClass('red_auto');
//             $('p').removeClass('none');
//             $('p').text('! Введите логин и пароль');
//         } 
//         else {
//             $('.spacing').removeClass('red_auto');
//             $('p').addClass('none');

//             //отправление данных 
//             $.ajax({
//                 type: "POST",
//                 url: "https://ithelpdeskdemo.xyz/site/api/authentication/check/login-or-token",
//                 data: {
//                     DBname: 'u1184374_hepdesk_2_0',
//                     token:  '12345artemy',
//                     email_OR_inn: log.val(),
//                     password: pass.val()
//                 },
//                 success: (msg) => {
//                     console.log(msg)
//                     let json = JSON.parse(msg);

//                     // проверка на правильно введенные данные
//                     if (json['action'] == 'success') {
//                         $('.spacing').removeClass('red_auto');
//                         $('p').addClass('none');
//                         window.location.href = 'site/web_ithelpdesk/organization.php';
//                     }
//                     else {
//                         $('.spacing').addClass('red_auto');
//                         $('p').removeClass('none');
//                         $('p').text('!!! Неправильно введен логин или пароль');
//                         console.log('wrong');
//                     }
//                 },
//                 //нет ответа от php файла
//                 error: (msg) => {
//                     console.log("error" + "/n" + msg);
//                 }
//             })
//         }
//     })
    
//     window.location.hash="no-back-button";
//     window.location.hash="Again-no-back-button";//for google chrome
//     window.onhashchange=function(){window.location.hash="no-back-button";}

// });






tryAuthWithToken();
let log = $('#text'), pass = $("#pass");
$('.button').click(function () {
    //проверка на пустоту полей
    if (log.val() === '' || pass.val() === '') {
        $('.spacing').addClass('red_auto');
        $('p').removeClass('none');
        $('p').text('!!! Введите логин и пароль');
        } else {
        $('.spacing').removeClass('red_auto');
        $('p').addClass('none');

        //отправление данных
        authWithCredentials();
    }
})

// $(document).on('keypress',function(event){
//     if(event.which == 13){
//         authWithCredentials();
//         // console.log(event + 'it"s something new')
//     }

// })

function authWithCredentials() {
    $.ajax({
        type: "POST",
        data: {
            email_OR_inn: log.val(),
            password: pass.val()
        },
        url: "https://ithelpdeskdemo.xyz/api/authentication/check/login-or-token",
        success: (msg) => {
            console.log(msg)
            let json = JSON.parse(msg);
// stop()
            // проверка на правильно введенные данные
            if (json['action'] === 'success' && json['role'] === 'superadmin') {
                //добавление куки
                document.cookie = "DBname=" + json["DBname"];
                document.cookie = "token=" + json["token"];
                document.cookie = "role=" + json["role"];

                $('.spacing').removeClass('red_auto');
                $('p').addClass('none');
                window.location.href = '/sysadmins';
            } else {
                $('.spacing').addClass('red_auto');
                $('p').removeClass('none');
                $('p').text('!!! Неправильно введен логин или пароль');
                console.log('wrong');
            }
        },
        //нет ответа от php файла
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
        url: "https://ithelpdeskdemo.xyz/api/authentication/check/login-or-token",
        success: (msg) => {
            let json = JSON.parse(msg);

            // проверка на правильно введенные данные
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