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
    <?php include('navigation.php');?>

    </nav>
    <div class="content_wrap">
        <p class="font_24 bold">Настройки</p>
        <div class="content_set">
            <div class="name_organization">
                <label for="name">Название <br> организации</label>
                <input type="text" id="name" class="border">
            </div>
            <div class="img_organization">
                <div class="image border">
                    <img src="icon/logo.png" alt="logo">
                </div>                
                <button class="button_gray border font_16">Загрузить</button>
            </div>
            <div class="save">
                <button class="button border font_16">Сохранить</button>
            </div>
        </div>
    </div>









    <script src="js/navigation.js"></script> 
</body>
</html>