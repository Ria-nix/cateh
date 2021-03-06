<?php
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
    <?php   $question = 'Вы точно хотите добавить новую организацию?'; 
            $error = 'Не получилось добавить нового пользователя';
            $success = 'Успешно добавлен новый сис. администратор'; ?>
    <?php include_once('modal windows/question_window.php'); ?>
    <?php include_once('modal windows/error_window.php'); ?>
    <?php include_once('modal windows/success_window.php'); ?>

    <!-- CONTENT -->
    <div class="content_wrap">
        <p class="font_22 bold"><?php echo $add_sysadmin ?></p>
        <div class="content_set">

            <div class="main_fields">
                <label for="email">Email<i class='red'>*</i></label>
                <input type="text" id="email" class="add_info" placeholder="email@gmail.com">
            </div>

            <div class="main_fields">
                <label for="password">Пароль<i class='red'>*</i></label>
                <input type="text" id="password" class="add_info" placeholder="123*****89">
            </div>

            <div class="main_fields">
                <label for="name">Имя<i class='red'>*</i></label>
                <input type="text" id="name" class="add_info" placeholder="Михаил">
            </div>

            <div class="main_fields">
                <label for="surname">Фамилия<i class='red'>*</i></label>
                <input type="text" id="surname" class="add_info" placeholder="Куприн">
            </div>

            <div class="main_fields">
                <label for="tel_number">Номер телефона</label>
                <input type="tel" id="tel_number" placeholder="+7 950 *** 22 01">
            </div>

            <div class="main_fields">
                <label for="state" class="text_width">Статус</label>
                <div class="searchable border">
                    <input type="text" class="border_none state_value" value="Системный администратор" readonly>
                    <span id="polygon_state">
                        <img src="icon/Polygon.svg" alt="polygon">
                    </span>
                    <ul class="spacing none" id="list_state">
                        <li class="states">Системный администратор</li>
                        <li class="states">Администратор</li>
                    </ul>                    
                </div>
            </div>

            <div class="field_choice main_fields">
                <label for="address" class="text_width">Добавьте компетенцию</label>
                <div class="searchable border">
                    <input type="text" class=" border_none" id="id_search" placeholder="Введите компетенцию">
                    <span id="polygon">
                        <img src="icon/Polygon.svg" alt="polygon">
                    </span>
                    <ul class="spacing none" id="list">
                        <?php
                            include_once('test/cooler_helpers.php');
                            include_once('test/MySQL.php');
                            include_once('test/CategoriesInfo.php');

                            $link = artemy_helper\getLink("u1184374_second_company_bd");

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
                    <img class="logo_second border" src="icon/anonym_user.svg" alt="logo">
                </div>

                <div class="img_buttons">
                    <input type="file" id="input_file">
                    <label class="button_gray border " for="input_file" id="download_file">Выбрать</label>
                    <button class="button_gray border" id="delete_admin">Удалить</button>
                </div>
            </div>
            <div class="save">
                <button class="button border" id="check_button">Добавить</button>
            </div>

        </div>
    </div>

    <script src="js/modal_windows.js"></script>
    <script src="js/add_sysadmin.js"></script>
    <script src="<?php echo $navigation_panel ?>"></script>
</body>

</html>


