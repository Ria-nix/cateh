<?php  include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="<?php $ru ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_edit_organ ?>">    
    <?php echo $favicon, $jquery ?>
    <title><?php echo $edit_organ ?></title>
</head>
<body>
    <?php  include_once('navigation.php');?> </nav>
    <?php  $question = 'Вы точно хотите изменить данную организацию?'; 
           $error = 'Не получилось добавить нового пользователя';
           $success = 'Успешно добавлен новый сис. администратор'; ?>
    <?php  include_once('modal windows/question_window.php'); ?>
    <?php  include_once('modal windows/success_window.php'); ?>
    <?php  include_once('modal windows/error_window.php'); ?>
    
     <!-- CONTENT -->
    <div class="content_wrap">
        <p class="font_24 bold"><?php echo $edit_organ ?></p>
        <div class="content_set">
            <div class="name_organisation">
                <label for="name">Название <br> организации</label>
                <input type="text" id="name" class="add_info json" value='ООО Название компании'>
            </div>
            <div class="password_organisation">
                <label for="password">Пароль</label>
                <button class="button_gray border font_16 pass">Сгенерировать новый пароль</button>
            </div>
            <section class="text_password">
                <p class=" success_item spacing">Пароль успешно сгенерирован</p>
                <p class="none error_item spacing">Не удалось сгенерировать пароль</p>
            </section>            
            <div class="adress_organisation">
                <label for="address">Адрес</label>
                <input type="text" id="address" class="text_address add_info" value="ул.Маркаса д.9">
                <div class="mobile_fields_address"></div>
                <span class="button border" id="add_address">
                    <img src="icon/plus-solid.svg" alt="plus_solid"> 
                </span>
            </div>
            <div class="fields_address"></div>
            <div class="img_organization">
                <div class="image border">
                    <img class="logo_second" src="" alt="logo">
                </div>                
                <div class="img_buttons">
                    <input name="file" type="file" id="input_file">
                    <label class="button_gray border font_16" for="input_file" id="download_file">Загрузить</label>
                    <button class="button_gray border font_16" id="delete_img">Удалить</button>
                </div>
            </div>
            <div class="save">
                <button class="button border font_16" id="check_button">Изменить</button>
            </div>
        </div>
    </div>
    <script src="js/modal_windows.js"></script>    
    <script src="js/edit_organiz.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script>
        
</body>
</html>