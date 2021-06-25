<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/settings.css">    
    <link rel="shortcut icon" href="icon/favicon-16x16.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
    <title>Настройки</title>
</head>
<body>
    <?php 
        include_once('main_menu.php');
    ?>

    </nav>
    <div class="content_wrap">
        <p class="font_24">Настройки</p>
        <div class="content_set">
            <div class="name_organization">
                <label for="name">Название организации</label><input type="text" id="name">
            </div>
            <div class="img_organization">
                <img src="icon/logo.png" alt="logo">
                <button>Загрузить</button>
            </div>
            <div class="save">
                <button class="button border font_16">Сохранить</button>
            </div>
        </div>
    </div>









    <script src="js/settings.js"></script>
    <script src="js/navigation.js"></script>
</body>
</html>