let log = $('#text'), pass = $("#pass");

$('.button').click(function() { 
    //проверка на пустоту полей   
    if(log.val() == '' || pass.val() == ''){

        $('input').addClass('red_auto');
        $('p').removeClass('none');
        $('p').text('! Введите логин и пароль');

    }else
    {
        $('input').removeClass('red_auto');
        $('p').addClass('none');
        
        //отправление данных 
        $.ajax({
            type: "POST",
            data: {
                email_OR_inn: log.val(), 
                password: pass.val()
            },
            url: "http://ithelpdeskdemo.xyz/login",
            success: (msg) => {
                // console.log(msg);

                let json = JSON.parse(msg);

                // проверка на правильно введенные данные
                if(json['action'] == 'success' && json['role'] == 'admin'){                    
                    $('input').removeClass('red_auto');
                    $('p').addClass('none');   
                    getTokenCookie(json);              
                    console.log('right');           
                }
                else{
                    $('input').addClass('red_auto');
                    $('p').removeClass('none');
                    $('p').text('! Неправильно введен логин или пароль');
                    console.log('wrong');
                }
            },
            //нет ответа от php файла
            error: (msg) => {
                console.log("error" + "/n"  + msg);
            }
        })
    }
})

function getTokenCookie(json){
    let data = [json['token'], json['DBname']];
    console.log(data);
}
