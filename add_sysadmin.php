<?php  include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_add_sysadmin ?>">
    <?php echo $favicon, $jquery  ?>
    <title><?php echo $add_sysadmin ?></title>
</head>
<body>
<?php include_once('navigation.php');?></nav>
<?php include_once('modal windows/question_window.php'); ?>

    <!-- CONTENT -->
    <div class="content_wrap">

        <p class="font_24 bold">Добавление системного администратора</p>
        <div class="content_set">

            <div class="name_organization">
                <label for="login">Логин</label>
                <input type="text" id="login" class="add_info">
            </div>

            <div class="name_organization">
                <label for="password">Пароль</label>
                <input type="text" id="password" class="add_info">
            </div>

            <div class="name_organization">
                <label for="name">Имя</label>
                <input type="text" id="name" class="add_info">
            </div>

            <div class="name_organization">
                <label for="surname">Фамилия</label>
                <input type="text" id="surname" class="add_info">
            </div>

            <div class="inn_organization">
                <label for="tel_number">Номер телефона</label>
                <input type="text" id="tel_number" class="add_info">
            </div>

            <div class="adress_organization">
                <label for="address">Добавьте компетенцию</label>
                <input type="text" id="address" class="text_address add_info">
            </div>

            <div class="fields_address"></div>

            <div class="img_organization">

                <div class="image border">
                    <img class="logo" src="icon/logo.png" alt="logo">
                </div>                

                <div class="img_buttons">
                    <input type="file" id="input_file">
                    <label class="button_gray border font_16" for="download_file">Загрузить</label>
                    <button class="button_gray border font_16" id="delete_img">Удалить</button>
                </div>

            </div>

            <div class="save">
                <button class="button border font_16" id="add_button">Добавить</button>
            </div>

        </div>

    </div>

    <script src="js/modal_windows.js"></script>    
    <script src="js/add_sysadmin.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script>
</body>
</html>



