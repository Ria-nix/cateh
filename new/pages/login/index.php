<?php include(getRootPath() . "site/includes/dasha/v1/helper.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="site/pages/login/style.css">
    <?php echo $favicon, $jquery  ?>
    <title>Авторизация</title>
</head>
<body>
    <div class="wrap_auth">
        <div class="content_auth">            
            <div class="logo_wrap" onselectstart="return false" onmousedown="return false">
                <img src="site/includes/dasha/icons/logo_server.svg" alt="alt">
            </div>
            <h2>Помощник системного администратора</h2>    
            <p class="none" id="wrong_log"></p>        
            <input type="text" id='login' placeholder="Введите почту" name="email_OR_inn">
            <input type="password" id='pass' placeholder="Введите пароль" name="password">
            <button class="button" onmousedown="return false">Войти</button>
        </div>
    </div>
    <script src="site/pages/login/script.js"></script>
</body>
</html>