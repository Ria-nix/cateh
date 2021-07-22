<?php  include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="<?php $ru ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_add_organ ?>">    
    <?php echo $favicon, $jquery ?>
    <title><?php echo $add_organ ?></title>
</head>
<body>
    <?php include_once('navigation.php');?></nav>
    <?php include_once('modal windows/question_window.php'); ?>
    
     <!-- CONTENT -->
    <div class="content_wrap">
        <p class="font_24 bold">Добавление организации</p>
        <div class="content_set">
            <div class="name_organization">
                <label for="name">Название <br> организации</label>
                <input type="text" id="name" class="add_info json " value="something">
            </div>
            <div class="inn_organization">
                <label for="inn">ИНН</label>
                <input type="text" id="inn" class="add_info json" value="4587596332545">
            </div>
            <div class="adress_organization">
                <label for="address">Адрес</label>
                <input type="text" id="address" class="text_address add_info address" value="something">
                <div class="mobile_fields_address"></div>
                <span class="button border" id="add_address">
                    <img src="icon/plus-solid.svg" alt="plus_solid"> 
                </span>
            </div>
            <div class="fields_address"></div>
            <div class="img_organization">
                <div class="image border">
                    <img class="logo_second" src="" accept="image/*" data-type='image' alt="logo">
                </div>                
                <div class="img_buttons">
                    <input type="file" accept="image/*" id="input_file" >
                    <input type="hidden" name="MAX_FILE_SIZE" value="6291456"/>
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
    <script src="js/add_organiz.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script>
        
</body>
</html>