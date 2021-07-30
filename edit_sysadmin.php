<?php include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_edit_sysadmin ?>">
    <?php echo $favicon, $jquery  ?>
    <title><?php echo $edit_sysadmin ?></title>
</head>

<body>
    <?php include_once('navigation.php'); ?></nav>
    <?php include_once('modal windows/question_window.php'); ?>
    <?php include_once('modal windows/error_window.php'); ?>
    <?php include_once('modal windows/success_window.php'); ?>

    <!-- CONTENT -->
    <div class="content_wrap">
        <p class="font_24 bold"><?php echo $edit_sysadmin ?></p>
        <div class="content_set">

            <div class="main_fields">
                <label for="login">Логин</label>
                <input type="text" id="login" class="add_info" value="email@gmail.com">
            </div>

            <div class="main_fields">
                <label for="password">Пароль</label>
                <input type="text" id="password" class="add_info" value="123*****89">
            </div>

            <div class="main_fields">
                <label for="name">Имя</label>
                <input type="text" id="name" class="add_info" value="Михаил">
            </div>

            <div class="main_fields">
                <label for="surname">Фамилия</label>
                <input type="text" id="surname" class="add_info" value="Куприн">
            </div>

            <div class="main_fields">
                <label for="tel_number">Номер телефона</label>
                <input type="number" id="tel_number" placeholder="+7(***)*** - ** - **">
            </div>

            <div class="main_fields">
                <label for="state">Статус</label>
                <input type="text" id="state" placeholder="Выберите статус">
                <span id="polygon">
                    <img src="icon/Polygon.svg" alt="polygon">
                </span>
                <ul class="font_18 spacing none" id="list_state"></ul>
            </div>

            <div class="field_choice main_fields">
                <label for="address" class="text_width">Добавьте компетенцию</label>
                <div class="searchable border">
                    <input type="text" class=" border_none font_18" id="id_search" placeholder="Введите компетенцию">
                    <span id="polygon">
                        <img src="icon/Polygon.svg" alt="polygon">
                    </span>
                    <ul class="font_18 spacing none" id="list"></ul>
                </div>
            </div>
            <div class="competences border"></div>
            <div class="img_organization">
                <div class="image border">
                    <img class="logo border" src="icon/michael.jpg" alt="logo">
                </div>
                <div class="img_buttons">
                    <input type="file" accept="img/*" id="input_file">
                    <label class="button_gray border font_16" for="input_file" id="download_file">Загрузить</label>
                    <button class="button_gray border font_16" id="delete_img">Удалить</button>
                </div>
            </div>
            <div class="save">
                <button class="button border font_16" id="check_button">Добавить</button>
            </div>
        </div>
    </div>

    <script src="js/modal_windows.js"></script>
    <script src="js/edit_sysadmin.js"></script>
    <script src="<?php echo $navigation_panel ?>"></script>
</body>

</html>