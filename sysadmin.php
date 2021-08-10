<?php  include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_sysadmin ?>">
    <?php echo $favicon, $jquery  ?>
    <title><?php echo $sysadmin ?></title>
</head>
<body>
    <div class="header">
        <?php include_once('navigation.php');?> 
        <!-- THE END OF NAVIGATION PANEL -->        
        <div class="search">            
            <p class="font_18 bold">Системные администраторы</p>
            <input class="border" type="text" placeholder="Введите имя или фамилию">
            <button class="button border font_16">Найти</button>
        </div>
    </div>
    <!-- CONTENT -->
    <div class="content_wrap">
        <!-- HEAD TABLE -->
        <div class="head_table">
            <div class="head_name spacing_special">
                <p>ФИО <span class="ask_des_arrow"><img src="icon/up_arrow.svg" alt="arrow" id="arrow"></span></p>
                <p>Выполнено за месяц</p>
                <p>Текущих заказов </p>
                <p>Статус</p>
            </div>
        </div>
        <!-- TABLE -->
        <div class="table_sysadmin" id="table"></div>  
    </div>
    <script src="js/sysadmin.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script>
</body>
</html>