<?php  include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="<?php echo $css_index ?>">
    <?php echo $favicon, $jquery ?>
    <title><?php echo $index ?></title>
</head>
<body>
    <div class="wrap border">
        <div class="text">
            <div class="logo_wrap" onselectstart="return false" onmousedown="return false">
                <img src="icon/logo.png" alt="logo_new">
            </div>
            <p class="none"></p>
            <input type="text" id='text' class="spacing font_14 border" placeholder="Введите логин" value="artemy@dewfill.com">
            <input type="password" id='pass' class=" password spacing font_14 border" placeholder="Введите  пароль" value="123">
            <button class="button border font_18" onmousedown="return false">Войти</button>
        </div>
    </div>
    <script defer src="js/autorization.js"></script>
</body>
</html>