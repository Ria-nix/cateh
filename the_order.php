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
            <div class="border main_fields main_info">
                <div class="fist_block">
                    <span class="item_info">
                        <p class="main_text">ФИО клиента:</p>
                        <p class="opacity">43 кабинет</p>
                    </span>
                    <span class="item_info">
                        <p class="main_text">Организация:</p>
                        <p class="opacity">ООО”Креатив Текнолоджис”</p>
                    </span>
                    <span class="item_info">
                        <p class="main_text">Номер телефона:</p>
                        <p class="opacity">+7(***)*** - 00 - 00</p>
                    </span>
                    <span class="item_info">
                        <p class="main_text">Адрес:</p>
                        <p class="opacity">ул. Портовая</p>
                    </span>
                </div>

                <div class="second_block">
                    <span class="item_info">
                        <p class="main_text">Сис. администратор:</p>
                        <p class="opacity">Михаил Reghby</p>
                    </span>
                    <span class="item_info">
                        <p class="main_text">Статус:</p>
                        <p class="opacity">Завершено</p>
                    </span>
                    <span class="item_info">
                        <p class="main_text">Дата принятия заказа:</p>
                        <p class="opacity">25.05.2021</p>
                    </span>
                    <span class="item_info">
                        <p class="main_text">Дата завершения заказа:</p>
                        <p class="opacity">25.05.2021</p>
                    </span>
                </div>
            </div>
            <div class="border main_fields">
                <p>Описание проблемы:</p><br>
                <input class="textarea_full border"></input>
            </div>
            <div class="border main_fields">
                <p>Комментарий к заказу:</p><br>                
                <div class="date_end">
                    <input class="textarea border"></input>
                    <span>
                        <p>Создание<br>комментария</p>
                        <p class="date">-- -- ----</p>
                    </span>
                </div>
            </div>
            <div class="border main_fields">
                <p>Заключение:</p><br>
                <input class="textarea_full border"></input>
                
            </div>
            <article class="save">
                <button class="button border"><span><img src="icon/edit.svg" alt="edit"></span>Редактировать</button>
                <button class="button border"><span><img src="icon/trash 1.svg" alt="trash"></span>Удалить</button>
            </article>
        </div>
    </div>
    <script src="js/modal_windows.js"></script>    
    <script src="js/order.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script>
        
</body>
</html>