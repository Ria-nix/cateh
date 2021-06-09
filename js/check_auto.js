let log = $('#text');
let pass = $("#pass");

$('.button').click(function() { 
    //проверка на пустоту полей   
    if(log.val() == '' || pass.val() == ''){
        $('input').addClass('red_auto');
        $('p').removeClass('none');
        $('p').text('! Введите логин и пароль');
    }
    else{
        $('input').removeClass('red_auto');
        $('p').addClass('none');
        
        //отправление данных 
        $.ajax({
            type: "POST",
            data: {
                email_OR_inn: log.val(), 
                password: pass.val()
            },
            url: "login.php",
            success: (msg) => {
                let json = JSON.parse(msg);
                // проверка на правильно введенные данные
                if(json['action'] == 'success'){
                    console.log('right'); 
                    $('input').removeClass('red_auto');
                    $('p').addClass('none');                           
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
                alert("error");
            }
        })
    }
})
