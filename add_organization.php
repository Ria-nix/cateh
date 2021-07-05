<?php  include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_add_organ ?>">        
    <?php echo $favicon, $jquery  ?>
    <title><?php echo $add_organ ?></title>
</head>
<body>
    <?php include_once('navigation.php');?> </nav>
    <?php include_once('modal windows/question_window.php'); ?>
    <div class="content_wrap">
        <p class="font_24 bold">Добавление организации</p>
        <div class="content_set">
            <div class="name_organization">
                <label for="name">Название <br> организации</label>
                <input type="text" id="name" class="add_info">
            </div>
            <div class="inn_organization">
                <label for="inn">ИНН</label>
                <input type="text" id="inn" class="add_info">
            </div>
            <div class="adress_organization">
                <label for="adress">Адрес</label>
                <input type="text" id="adress" class="text_adress add_info">
                <div class="mobile_fields_adress"></div>
                <span class="button border" id="add_adress">
                    <img src="icon/plus-solid.svg" alt="plus_solid"> 
                </span>
            </div>
            <div class="fields_adress"></div>
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
    <script src="js/add_organiz.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script>
        
</body>
</html>