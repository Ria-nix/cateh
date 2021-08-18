<?php
include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_profile_organization ?>">
    <?php echo $favicon, $jquery  ?>
    <title><?php echo $profile_organ ?></title>
</head>

<body>
    <?php include_once('navigation.php'); ?></nav>
    <?php   $question = 'Вы точно хотите добавить новую организацию?'; ?>
    <?php include_once('modal windows/question_window.php'); ?>

    <div class="profile_buttons">
        <div class="profile">
            <div class="image"> 
                <div class="logo_organization border">
                    <img src="icon/logo_server.svg" alt="main logo">
                </div>
            </div>
            <div class="text"> 
                <span class="text_info">
                    <p class="bold hidden">Название:</p>
                    <p class="opacity spacing">ООО "КРЕАТИВ ТЕКНОЛОДЖИС" </p>
                </span>
                <span class="text_info count">
                    <p class="bold">Выполнено за месяц:</p>
                    <p class="opacity font_18">50</p>
                </span>
                <span class="text_info count">
                    <p class="bold">Выполнено за все время:</p>
                    <p class="opacity font_18">50</p>
                </span>
                <div class="mobile_count">
                    <span class="text_info mobile_item">
                        <p class="opacityf font_18">50</p>
                        <p class="bold">Выполнено за месяц</p>
                    </span>
                    <span class="text_info mobile_item">
                        <p class="opacity font_18">50</p>
                        <p class="bold">Выполнено за все время</p>
                    </span>
                </div>
            </div>
            <div class="buttons">
                <button class="button border"><span class="edit"><img src="icon/edit.svg" alt=""></span><p class="hidden">Редактировать</p></button>
                <button class="button border"><span class="delete"><img src="icon//trash 1.svg" alt=""></span><p class="hidden">Удалить</p></button>
            </div>
        </div>

        <div class="tabs">
            <label id="orders">Заказы</label>
            <label id="addresses">Адреса</label>
            <label id="clients">Клиенты</label>
        </div>
    </div>
    <!-- CONTENT -->
    <div class="content_wrap font_16">
        <!-- HEAD TABLE -->
        <div class="orders_item">
            <div class="head_table">
                <div class="head_name spacing_special">
                    <p>Номер заказа</p>
                    <p>Клиент</p>
                    <p>Статус </p>
                    <p>Системный администратор</p>
                </div>
            </div>
            <!-- TABLE -->
            <div class="table_sysadmin" id="table">
                <div class="item_table"><div class="item_info border"><p class="main_fio">заказа</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
                <div class="item_table"><div class="item_info border"><p class="main_fio">заказа</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role">skdf;lskdfksdfksdlfkls</p></div><button class="click button border font_16">Просмотреть</button></div>
                <div class="item_table"><div class="item_info border"><p class="main_fio">заказа</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
                
            </div> 
        </div>

        <div class="addresses_item none_label">
            <div class="head_table">
                <div class="head_name spacing_special">
                    <p>Адрес</p>
                    <p>Выполнено заказов</p>
                    <p>Текущих заказов</p>
                </div>
            </div>
            <!-- TABLE -->
            <div class="table_sysadmin" id="table">
                <div class="item_table">
                    <div class="item_info border">
                        <p class="main_fio">Адрес</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div></div>
                <div class="item_table">
                    <div class="item_info border">
                        <p class="main_fio">Адрес</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role">skdf;lskdfksdfksdlfkls</p></div></div>
                <div class="item_table">
                    <div class="item_info border">
                        <p class="main_fio">Адрес</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div></div>
            </div> 
        </div>

        <div class="clients_item none_label">
            <div class="head_table">
                <div class="head_name spacing_special">
                    <p>Клиент</p>
                    <p>Номер телефона</p>
                    <p>Адрес</p>
                    <p>Роль</p>
                </div>
            </div>
            <!-- TABLE -->

            <!-- //******************************************* */ -->
            <div class="table_sysadmin" id="table">
                <div class="item_table">
                    <div class="item_info border">
                        <p class="main_fio">Клиент</p>
                        <div class="mobile_version">
                            <div class="mobile_title">
                                <p>Клиент</p>
                                <p>Номер телефона</p>
                                <p>Адрес</p>
                                <p class="role">Роль</p>
                            </div>
                            <div class="mobile_info">
                                <p class="complete_order">something new client</p>
                                <p class="current_order">something new client</p>
                                <p class="role">something new client</p>
                            </div>
                        </div>
                        <p class="mobile_none complete_order">something new client</p>
                        <p class="mobile_none current_order">something new client</p>
                        <p class="mobile_none role">skdf;something new client</p>
                    </div>
                    <button class="click button border font_16">Просмотреть</button>
                </div>
                <!-- //******************************************* */ -->
                <div class="item_table">
                    <div class="item_info border">
                        <p class="main_fio">Клиент</p>
                        <div class="mobile_version">
                            <div class="mobile_title">
                                <p>Клиент</p>
                                <p>Номер телефона</p>
                                <p>Адрес</p>
                                <p>Роль</p>
                            </div>
                            <div class="mobile_info">
                                <p class="complete_order">something new client</p>
                                <p class="current_order">something new client</p>
                                <p class="role">something new client</p>
                            </div>
                        </div>
                        <p class="mobile_none complete_order">something new client</p>
                        <p class="mobile_none current_order">something new client</p>
                        <p class="mobile_none role">kdf;something new client</p>
                    </div>
                    <button class="click button border font_16">Просмотреть</button>
                </div>
                <!-- //******************************************* */ -->
                <div class="item_table">
                    <div class="item_info border">
                        <p class="main_fio">Клиент</p>
                        <div class="mobile_version">
                            <div class="mobile_title">
                                <p>Клиент</p>
                                <p>Номер телефона</p>
                                <p>Адрес</p>
                                <p>Роль</p>
                            </div>
                            <div class="mobile_info">
                                <p class="complete_order">something new client</p>
                                <p class="current_order">something new client</p>
                                <p class="role">something new client</p>
                            </div>
                        </div>
                        <p class="mobile_none complete_order">something new client</p>
                        <p class="mobile_none current_order">something new client</p>
                        <p class="mobile_none role">skdf;something new client</p>
                    </div>
                    <button class="click button border font_16">Просмотреть</button>
                </div>
                <!-- //******************************************* */ -->
            </div> 
        </div>

    </div>

    <script src="js/modal_windows.js"></script>
    <script src="js/profile_organization.js"></script>
    <script src="<?php echo $navigation_panel ?>"></script>
</body>

</html>


