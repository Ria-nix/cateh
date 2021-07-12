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
               <!-- <input type="text" id="address" class="text_address add_info"> -->
               <input type="text" class="select border spacing" list="competence" placeholder="Введите компетенцию">
               <datalist name="select_name" id="competence">
                   <option value="vanilla" selected disaibled hidden></option>
                <!-- <span class="polygon">
                    <img src="icon/Polygon.svg" alt="alt">
                </span> -->
                    <option class="item_options" value="new"></option>
                    <option class="item_options" value="chocolate"></option>
                    <option class="item_options" value="mint"></option>
                    <option class="item_options" value="latte"></option>
                    <option class="item_options" value="spain"></option>
                    <option class="item_options" value="rock"></option>
                    <option class="item_options" value="letter"></option>
                    <option class="item_options" value="nroll"></option>
                    <option value="Добавить" id="add_competence">
                        <img src="icon/plus-solid.svg" alt="alt">
                    </option>
               </datalist>
                
                <!-- <div class="options border"> -->
                    <!-- <option class="item_options">spain spain spain spain spain spain spain spain spain</option>
                    <option class="item_options">spain</option>
                    <option class="item_options">spain</option>
                    <option class="item_options">spain</option>
                    <option class="item_options">spain</option>
                    <option class="item_options">spain</option>
                    <option class="item_options">spain</option>
                    <option class="item_options">spain</option>
                    <option value="add_competence" id="add_competence">
                        <img src="icon/plus-solid.svg" alt="alt">Добавить
                    </option> -->
                <!-- </div> -->
                
                    
            </div>

            <div class="list_competence border">
              
            </div>

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



