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
    <!-- <div class="header"> -->
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
                    <span class="item_info">
                        <p class="bold hidden">Название:</p>
                        <p class="opacity spacing">ООО "КРЕАТИВ ТЕКНОЛОДЖИС" </p>
                    </span>
                    <span class="item_info count">
                        <p class="bold">Выполнено за месяц:</p>
                        <p class="opacity font_18">50</p>
                    </span>
                    <span class="item_info count">
                        <p class="bold">Выполнено за все время:</p>
                        <p class="opacity font_18">50</p>
                    </span>
                    <div class="mobile_count">
                        <span class="item_info mobile_item">
                            <p class="opacity font_18f">50</p>
                            <p class="bold">Выполнено за месяц</p>
                        </span>
                        <span class="item_info mobile_item">
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
                <label for="orders">Заказы<input type="radio" id="orders" name="radiobox" checked></label>
                <label for="addresses">Адреса<input type="radio" id="addresses" name="radiobox"></label>
                <label for="clients">Клиенты<input type="radio" id="clients" name="radiobox"></label>
            </div>
        </div>

    <!-- </div> -->
    <!-- CONTENT -->
    <div class="content_wrap">
        <!-- HEAD TABLE -->
        <div class="orders">
            <div class="head_table">
                <div class="head_name spacing_special">
                    <p>ФИО <span class="ask_des_arrow"><img src="icon/up_arrow.svg" alt="arrow" id="arrow"></span></p>
                    <p>Выполнено за месяц</p>
                    <p>Текущих заказов </p>
                    <p>Статус</p>
                </div>
            </div>
            <!-- TABLE -->
            <div class="table_sysadmin" id="table">
                <div class="item_table font_18"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
                <div class="item_table font_18"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role">skdf;lskdfksdfksdlfkls</p></div><button class="click button border font_16">Просмотреть</button></div>
                <div class="item_table font_18"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
            </div> 
        </div>

        <div class="address"></div>

        <div class="clients"></div>

    </div>

    <script src="js/modal_windows.js"></script>
    <!-- <script src="js/add_sysadmin.js"></script> -->
    <script src="<?php echo $navigation_panel ?>"></script>
</body>

</html>


