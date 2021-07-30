<?php

use function artemy_helper\getLink;

include('head_code.php'); ?>
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
    <?php include_once('navigation.php'); ?></nav>
    <?php  $question = 'Вы точно хотите добавить новую организацию?'; 
           $error = 'Не получилось добавить нового пользователя';
           $success = 'Успешно добавлен новый сис. администратор'; ?>
    <?php include_once('modal windows/question_window.php'); ?>
    <?php include_once('modal windows/error_window.php'); ?>
    <?php include_once('modal windows/success_window.php'); ?>

    <!-- CONTENT -->
    <div class="content_wrap">
        <p class="font_24 bold">Добавление системного администратора</p>
        <div class="content_set">

            <div class="main_fields">
                <label for="email">Email <span class='red'>*</span></label>
                <input type="text" id="email" class="add_info" value="email@gmail.com">
            </div>

            <div class="main_fields">
                <label for="password">Пароль <span class='red'>*</span></label>
                <input type="text" id="password" class="add_info" value="123*****89">
            </div>

            <div class="main_fields">
                <label for="name">Имя <span class='red'>*</span></label>
                <input type="text" id="name" class="add_info" value="Михаил">
            </div>

            <div class="main_fields">
                <label for="surname">Фамилия <span class='red'>*</span></label>
                <input type="text" id="surname" class="add_info" value="Куприн">
            </div>

            <div class="main_fields">
                <label for="tel_number">Номер телефона</label>
                <input type="number" id="tel_number" placeholder="+7(***)*** - ** - **">
            </div>

            <div class="main_fields">
                <label for="state">Статус <span class='red'>*</span></label>
                <input type="text" id="state" placeholder="Выберите статус">
                <select name="state" id="state" class='none'>
                    <option value="sys_admin" >Системный администратор</option>
                    <option value="admin">Админ</option>
                </select>
            </div>

            <div class="field_choice main_fields">
                <label for="address" class="text_width">Добавьте компетенцию</label>
                <div class="searchable border">
                    <input type="text" class=" border_none font_18" id="id_search" placeholder="Введите компетенцию">
                    <span class="" id="polygon">
                        <img src="icon/Polygon.svg" alt="polygon">
                    </span>
                    <ul class="font_18 spacing none" id="list">
                        <?php
                            include_once('test/cooler_helpers.php');
                            include_once('test/MySQL.php');
                            include_once('test/CategoriesInfo.php');

                            $link = getLink("u1184374_second_company_bd");

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

            <div class="img_organization">
                <div class="image border">
                    <img class="logo_second border" src="icon/michael.jpg" alt="logo">
                </div>

                <div class="img_buttons">
                    <input type="file" id="input_file">
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
    <script src="js/add_sysadmin.js"></script>
    <script src="<?php echo $navigation_panel ?>"></script>
</body>

</html>

<?php

//let text_begin = `<li class="competence" id=${elem.id}>${elem.name}</li>`;
