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
                    <img src="icon/logo.png" alt="">
                </div>
                <p class="none"> </p>
                <input type="text" id='text' class="spacing font_14 border" placeholder="Введите логин">
                <input type="password" id='pass' class=" password spacing font_14 border" placeholder="Введите  пароль">
                <a class="button border" onmousedown="return false">Войти</a>
            </div>
        </div>
        <script src="js/check_auto.js"></script>
    </body>
</html>