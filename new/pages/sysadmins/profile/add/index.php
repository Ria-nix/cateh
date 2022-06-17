<?php
use v2artemy\CategoriesInfo;
include(getRootPath() . "site/includes/dasha/v1/helper.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site/pages/sysadmins/profile/add/style.css">
    <?php echo $favicon, $jquery ?>
    <title>Добавить системного администратора</title>
</head>
<body>
<?php include_once(getRootPath() . "site/includes/dasha/v1/navigation/navigation.php"); ?> </nav>
<?php $question = 'Вы точно хотите добавить нового системного администратора?';
$success = 'Добавление прошло успешно!'; ?>
<?php include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/question_window.php'); ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/success_window.php'); ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/error_window.php'); ?>

<!-- CONTENT -->
<div class="content_wrap">
    <p class="font_22 bold">Добавить системного администратора</p>
    <div class="content_set">
        <div class="main_fields">
            <label for="email">Email <span class='red'>*</span></label>
            <input type="text" id="email" class="add_info" placeholder="email@gmail.com" required>
        </div>
        <div class="main_fields">
            <label for="password">Пароль <span class='red'>*</span></label>
            <input type="text" id="password" class="add_info" placeholder="123*****89" required>
        </div>
        <div class="main_fields">
            <label for="name">Имя <span class='red'>*</span></label>
            <input type="text" id="name" class="add_info" placeholder="Михаил" required>
        </div>
        <div class="main_fields">
            <label for="surname">Фамилия <span class='red'>*</span></label>
            <input type="text" id="surname" class="add_info" placeholder="Куприн" required>
        </div>
        <div class="main_fields">
            <label for="tel_number">Номер телефона <span class='red'>*</span></label>
            <input type="number" id="tel_number" class="add_info" placeholder="+7 950 *** 22 01" required>
        </div>
        <div class="main_fields">
            <label for="state" class="text_width">Статус</label>
            <div class="searchable border">
                <input type="text" class="border_none state_value" value="Выберите статус" readonly>
                <span id="polygon_state">
                    <img src="site/includes/dasha/icons/Polygon.svg" alt="polygon">
                </span> 
                <ul class="spacing none" id="list_state">
                    <li class="states" id="access">Системный администратор</li>
                    <li class="states" id="not_access">Главный администратор</li>
                </ul>                    
            </div>
        </div>

        <div class="field_choice main_fields">
            <label for="address" class="text_width">Добавьте компетенцию</label>
            <div class="searchable border">
                <input type="text" class=" border_none" id="id_search" placeholder="Введите компетенцию">
                <span id="polygon">
                    <img src="site/includes/dasha/icons/Polygon.svg" alt="polygon">
                </span>
                <ul class="spacing none" id="list">
                    <?php
                    include_once(getRootPath() . "site/includes/artemy/v2/cooler_helpers.php");
                    include_once(getRootPath() . "site/includes/artemy/v2/MySQL.php");
                    include_once(getRootPath() . "site/includes/artemy/v2/CategoriesInfo.php");

                    $link = \v2artemy\getLink($_COOKIE["DBname"]);
                    $categories = new CategoriesInfo($link);
                        $all_categories = $categories->fetch();
                        
                        foreach($all_categories as $category) {
                            echo "<li class=\"competence\" id={$category['id']}>{$category['name']}</li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="competences border"></div>
        <div class="img_admin">
            <div class="image border">
                <img class="wrap_admin border" src="site/includes/dasha/icons/anonym_user.svg" alt="logo">
            </div>
            <div class="img_buttons">
                <input type="file" class="choose_file" id="input_file">
                <label class="button_gray border " for="input_file" id="download_file">Выбрать</label>
                <button class="button_gray border" id="delete_admin" class="delete_img">Удалить</button>
            </div>
        </div>
        <div class="save">
            <button class="button border" id="check_button">Добавить</button>
        </div>
    </fo>
</div>

<script src="site/includes/dasha/v1/modal_windows/modal_windows.js"></script>
<script src="site/pages/sysadmins/profile/add/script.js"></script>
<script src="site/includes/dasha/v1/navigation/navigation.js"></script>
</body>
</html>


