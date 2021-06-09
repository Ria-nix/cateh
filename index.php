<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/autorization_style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
        <title>Авторизация</title>
    </head>
    <body>
        <div class="wrap border">
            <div class="text">
                <div class="logo_wrap" onselectstart="return false" onmousedown="return false">
                    <img src="icon/logo.png" alt="" class="user_none_select">
                </div>
                <p class="none"></p>
                <input type="text" class="spacing font_14 border user_none_select" placeholder="Введите логин">
                <input type="password" class="spacing font_14 border user_none_select" placeholder="Введите  пароль">
                <a href="#" class="button border user_none_select" onmousedown="return false">Войти</a>
            </div>
        </div>
        <script src="js/check_auto.js"></script>
    </body>
</html>