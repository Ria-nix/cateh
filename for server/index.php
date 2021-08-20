<?php  include(getRootPath() . "site/includes/dasha/v1/helper.php"); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_settings ?>">
    <?php echo $favicon, $jquery  ?>
    <title><?php echo $settings ?></title>
</head>
<body>
<?php  include_once(getRootPath() . "site/includes/dasha/v1/navigation/navigation.php");?> </nav>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/question_window.php'); ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/success_window.php'); ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/error_window.php'); ?>

    <div class="content_wrap">
        <p class="font_24 bold">Настройки</p>
        <div class="content_set">
            <div class="name_organization">
                <label for="name">Название <br> организации</label>
                <input type="text" id="name" class="border add_info" placeholder='ООО"Название организации"'>
            </div>
            <div class="img_organization">
                <div class="image border">
                    <img src="site/includes/dasha/icons/logo_server.svg" class='logo_second' alt="logo">
                </div>                
                <div class="img_buttons">
                <input type="file" id="input_file">
                    <label class="button_gray border " for="input_file" id="download_file">Выбрать</label>
                    <button class="button_gray border font_16" id="delete_settings">Удалить</button>
                </div>
            </div>
            <div class="save">
                <button class="button border font_16" id="check_button">Сохранить</button>
            </div>
        </div>
    </div>
    <script src="site/pages/settings/script.js"></script>
    <script src="site/includes/dasha/v1/modal_windows/modal_windows.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script> 
</body>
</html>