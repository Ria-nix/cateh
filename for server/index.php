<?php  include(getRootPath() . "site/includes/dasha/v1/helper.php"); ?>
<!DOCTYPE html>
<html lang="<?php $ru ?>">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../edit/style.css">
    <?php echo $favicon, $jquery ?>
    <title><?php echo $edit_organ ?></title>
</head>
<body>
<?php  include_once(getRootPath() . "site/includes/dasha/v1/navigation/navigation.php");?> </nav>
    <?php  $question = 'Вы точно хотите изменить данную организацию?'; 
            $error = 'Не получилось добавить нового пользователя';
            $success = 'Успешно был добавлен новый системный администратор'; ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/question_window.php'); ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/success_window.php'); ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/error_window.php'); ?>
    
    
    <!-- CONTENT -->
    <div class="content_wrap">
        <p class="font_24 bold"><?php echo $edit_organ ?></p>
        <div class="content_set">
            <div class="name_organisation">
                <label for="name">Название <i class='red'>*</i><br> организации</label>
                <input type="text" id="name" class="add_info json" placeholder='ООО Название компании'>
            </div>
            <div class="password_organisation">
                <label for="password">Пароль <i class='red'>*</i></label>
                <button class="button_gray border font_16 pass">Сгенерировать новый пароль</button>
                <div class="none"><img src="" alt="mark about generatio a new password"></div>
            </div>         
            <div class="mobile_fields_address"></div>
            <div class="fields_address">
                <!-- <div class="cell">
                    <input type="text" class="text_address add_info " value="new something">
                    <img src="icon/close.svg" alt="close">
                </div>
                <div class="cell">
                    <input type="text" class="text_address add_info " value="new something">
                    <img src="icon/close.svg" alt="close">
                </div> -->
            </div>
            <div class="adress_organisation">
                <label for="address">Адрес <i class='red'>*</i></label>
                <input type="text" id="address" class="field_address" placeholder="ул.Маркаса д.9">
                <span class="button border none" id="add_address">
                    <img src="site/includes/dasha/icons/plus-solid.svg" alt="plus_solid">
                </span>
            </div>
            <div class="img_organization">
                <div class="image border">
                    <img class="logo_second" src="site/includes/dasha/icons/anonym_organization.svg" alt="logo">
                </div>                
                <div class="img_buttons">
                    <input name="file" type="file" id="input_file">
                    <label class="button_gray border font_16" for="input_file" id="download_file">Загрузить</label>
                    <button class="button_gray border font_16" id="delete_organ">Удалить</button>
                </div>
            </div>
            <div class="save">
                <button class="button border font_16" id="check_button">Изменить</button>
            </div>
        </div>
    </div>
<script src="site/includes/dasha/v1/modal_windows/modal_windows.js"></script>
<script src="site/pages/organisation/edit/script.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script>
        
</body>
</html>