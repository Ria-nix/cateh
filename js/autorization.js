$(document).ready(function () {

    let log = $('#text'), pass = $("#pass");

    $('.button').click(function () {

        //проверка на пустоту полей   
        if (log.val() == '' || pass.val() == '') {
            $('.spacing').addClass('red_auto');
            $('p').removeClass('none');
            $('p').text('! Введите логин и пароль');
        } 
        else {
            $('.spacing').removeClass('red_auto');
            $('p').addClass('none');

            //отправление данных 
            $.ajax({
                type: "POST",
                url: "https://ithelpdeskdemo.xyz/site/api/authentication/check/login-or-token",
                data: {
                    DBname: 'u1184374_hepdesk_2_0',
                    token:  '12345artemy',
                    email_OR_inn: log.val(),
                    password: pass.val()
                },
                success: (msg) => {
                    console.log(msg)
                    let json = JSON.parse(msg);

                    // проверка на правильно введенные данные
                    if (json['action'] == 'success') {
                        $('.spacing').removeClass('red_auto');
                        $('p').addClass('none');
                        window.location.href = 'site/web_ithelpdesk/organization.php';
                    }
                    else {
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



            // formData.append('DBname', 'u1184374_hepdesk_2_0');
            // formData.append("token", '12345artemy');
            // formData.append("name", log.val());
            // formData.append("inn", pass.val());

            // let request = new XMLHttpRequest();
            // request.open("POST", "https://ithelpdeskdemo.xyz/site/api/authentication/checck/login-or-token");
            // request.send(formData);
            // request.onload = function () {
            //     console.log(request.responseText);
            // }
        }
    })

});