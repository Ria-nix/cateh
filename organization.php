<?php  include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_sysadmin ?>">
    <?php echo $favicon, $jquery  ?>
    <title><?php echo $organizations ?></title>
</head>
<body>
    <!-- HEADER -->
    <nav>           

        <!-- NAVIGATION PANEL      -->
        <div class="navigation">            
            <img src="icon/logo.png" class="logo" alt="logo">

            <!-- TOOGLE BUTTON -->
            <div class="toggle_bar">
                <div class="toggle_but border button">
                    <span></span>
                </div>
            </div>

            <!-- TOOGLE MENU -->
            <div class="toggle_menu_fon none">
                <div class="toggle_menu border">
                     <span class="button border main admin">
                        <img src="icon/Untitled.svg" alt="alt">
                        <p class="font_18">Системные администраторы</p>
                    </span>
                    <span class="button border plus admin_plus">
                        <img src="icon/plus-solid.svg" alt="alt">
                        <p class="font_18 icon_none none">Добавить нового сис. админа</p>
                    </span>
                    <span class="button border main organization">
                        <img src="icon/build.svg" alt="alt">
                        <p class="font_18">Организации</p>
                    </span>
                    <span class="button border plus organization_plus">
                        <img src="icon/plus-solid.svg" alt="alt">
                        <p class="font_18 icon_none none">Добавить новую организацию</p>
                    </span>
                    <span class="button border settings">
                        <img src="icon/settings.svg" alt="alt">
                        <p class="font_18 icon_none none">Настройки</p>
                    </span>
                    <span class="button border door exit">                    
                        <p class="font_18">Выйти</p>
                        <img src="icon/exitdoor_87195.svg" alt="alt">
                    </span>
                </div>                   
            </div>

            <!-- BUTTONS -->
            <div class="panel_buttons">
                <span class="button border main admin">
                    <img src="icon/Untitled.svg" alt="alt">
                    <p class="font_18">Системные администраторы</p>
                </span>
                <span class="button border plus admin_plus">
                    <img src="icon/plus-solid.svg" alt="alt">
                </span>
                <span class="button border main organization">
                    <img src="icon/build.svg" alt="alt">
                    <p class="font_18">Организации</p>
                </span>
                <span class="button border plus organization_plus">
                    <img src="icon/plus-solid.svg" alt="alt">
                </span>
                <span class="button border settings">
                    <img src="icon/settings.svg" alt="alt">
                    <p class="font_18"></p>
                </span>
                <span class="button border door exit">                    
                    <p class="font_18">Выйти</p>
                    <img src="icon/exitdoor_87195.svg" alt="alt">
                </span>
            </div>
        </div>


        <!-- THE END OF NAVIGATION PANEL -->        
        <div class="search">            
            <p class="font_18 bold">Системные администраторы</p>
            <input class="border" type="text" placeholder="Введите имя или фамилию">
            <button class="button border font_16">Найти</button>
        </div>
    </nav>

    <!-- CONTENT -->
    <div class="content_wrap">

        <!-- HEAD TABLE -->
        <div class="head_table">
            <div class="head_name spacing_special">
                <p>Название <span><img src="icon/up_arrow.svg" alt="arrow"></span></p>
                <p>Выполнено за месяц</p>
                <p>Текущих заказов </p>
            </div>
        </div>

         <!-- TABLE -->
         <div class="table_sysadmin" id="table"></div>  
    </div>




    <script src="js/organization.js"></script>
    <script src="js/navigation.js"></script>
</body>
</html>



