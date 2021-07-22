<?php  include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_settings ?>">        
    <?php echo $favicon, $jquery  ?>
    <title><?php echo $settings ?></title>
</head>
<body>
    <?php include('navigation.php');?></nav>
    <?php include_once('modal windows/question_window.php'); ?>
    <?php include_once('modal windows/error_window.php'); ?>
    <?php include_once('modal windows/success_window.php'); ?>

    <div class="content_wrap">
        <p class="font_24 bold">Настройки</p>
        <div class="content_set">
            <div class="name_organization">
                <label for="name">Название <br> организации</label>
                <input type="text" id="name" class="border add_info">
            </div>
            <div class="img_organization">
                <div class="image border">
                    <img src="icon/logo.png" alt="logo">
                </div>                
                <div class="img_buttons">
                    <button class="button_gray border font_16" id="download_img">Загрузить</button>
                    <button class="button_gray border font_16" id="delete_img">Удалить</button>
                </div>
            </div>
            <div class="save">
                <button class="button border font_16" id="check_button">Сохранить</button>
            </div>
        </div>
    </div>
    <script src="js/settings.js"></script>
    <script src="js/modal_windows.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script> 
</body>
</html>