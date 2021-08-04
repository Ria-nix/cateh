<?php  include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="<?php $ru ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_order ?>">    
    <?php echo $favicon, $jquery ?>
    <title><?php echo $order ?></title>
</head>
<body>
    <?php  include_once('navigation.php');?> </nav>
    <?php  $question = 'Вы точно хотите добавить новую организацию?'; 
           $error = 'Не получилось добавить нового пользователя';
           $success = 'Успешно добавлен новый сис. администратор'; ?>
    <?php  include_once('modal windows/question_window.php'); ?>
    <?php  include_once('modal windows/success_window.php'); ?>
    <?php  include_once('modal windows/error_window.php'); ?>
    
    <!-- CONTENT -->
    <div class="content_wrap">
        <div class="head_order">
            <div class="back_button">
                <button class="button border"><span><img src="icon/restore.svg" alt="restore"></span>Назад</button>
            </div>
            <div class="text">
                <p class="bold font_24">Заказ №102544589</p>
            </div>
            <div class="empty"></div>
        </div>
        <div class="content_set">
            <div class="border main_fields button_gray">
                <div class="fist_block"></div>
                <div class="second_block"></div>
            </div>
            <div class="border main_fields button_gray">
                <p>Описание проблемы:</p><br>
                <div class="textarea_full border"></div>
            </div>
            <div class="border main_fields button_gray">
                <p>Комментарий к заказу:</p><br>
                <div class="textarea border"></div>
            </div>
            <div class="border main_fields button_gray">
                <p>Заключение:</p><br>
                <div class="textarea_full border"></div>
                <div class="date_end">
                    <p>Создание<br>комментария</p>
                    <p class="date">25.05.2021</p>
                </div>
            </div>
            <article class="save">
                <button class="button border"><span><img src="icon/edit.svg" alt="edit"></span>Редактировать</button>
                <button class="button border"><span><img src="icon/trash 1.svg" alt="trash"></span>Удалить</button>
            </article>
        </div>
    </div>
    <script src="js/modal_windows.js"></script>    
    <!-- <script src="js/order.js"></script> -->
    <script src="<?php  echo $navigation_panel ?>"></script>
        
</body>
</html>