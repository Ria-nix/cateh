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
            
            <div class="main_fields">
                <label for="login">Логин</label>
                <input type="text" id="login" class="add_info">
            </div>

            <div class="main_fields">
                <label for="password">Пароль</label>
                <input type="text" id="password" class="add_info">
            </div>

            <div class="main_fields">
                <label for="name">Имя</label>
                <input type="text" id="name" class="add_info">
            </div>

            <div class="main_fields">
                <label for="surname">Фамилия</label>
                <input type="text" id="surname" class="add_info">
            </div>

            <div class="main_fields">
                <label for="tel_number">Номер телефона</label>
                <input type="text" id="tel_number" class="add_info">
            </div>

            <div class="field_choice main_fields">
                <label for="address" class="text_width">Добавьте компетенцию</label>

                <div class="searchable border">
                    <input type="text" class=" border font_18" id="list_competence" placeholder="Введите компетенцию">
                    <span class="polygon">
                        <img src="icon/Polygon.svg" alt="alt">
                    </span>
                    <ul class="border font_18 none" id="list">
                        <li>Algeria</li>
                        <li>Bulgaria</li>
                        <li>Canada</li>
                        <li>Egypt</li>
                        <li>Fiji</li>
                        <li>India</li>
                        <li>Japan</li>
                        <li>Iran (Islamic Republic of)</li>
                        <li>Lao People's Democratic Republic</li>
                        <li>Micronesia (Federated States of)</li>
                        <li>Nicaragua</li>
                        <li>Senegal</li>
                        <li>Tajikistan</li>
                        <li>Yemen</li>
                    </ul>
                </div>
            </div>
            <div class="list_competence border"></div>

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
    <script src="js/add_sysadmin.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script>
</body>
</html>



