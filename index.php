<?php  include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icon/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="css/autorization_style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
    <title><?php echo $authorization ?></title>
</head>
<body>
    <div class="wrap border">
        <div class="text">
            <div class="logo_wrap" onselectstart="return false" onmousedown="return false">
                <img src="icon/logo.png" alt="alt">
            </div>
            <p class="none"></p>
            <input type="text" id='text' class="spacing font_14 border" placeholder="Введите логин">
            <input type="password" id='pass' class=" password spacing font_14 border" placeholder="Введите  пароль">
            <button class="button border font_18" onmousedown="return false">Войти</button>
        </div>
    </div>
    <script src="js/autorization.js"></script>
</body>
</html>