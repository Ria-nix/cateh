<?php
include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_profile_sysadmin ?>">
    <?php echo $favicon, $jquery  ?>
    <title><?php echo $profile_sysadmin ?></title>
</head>

<body>
    <?php include_once('navigation.php'); ?></nav>
    <?php   $question = 'Вы точно хотите добавить новую организацию?'; ?>
    <?php include_once('modal windows/question_window.php'); ?>

    <div class="profile_buttons">
        <div class="profile">          
        <p class="role spacing">Администратор</p> 
            <div class="image"> 
                <div class="logo_organization">
                    <img src="icon/michael.jpg" alt="main logo">
                </div>
            </div>
            <div class="text"> 
                <span class="text_info">
                    <p class="spacing font_22">Михаил Куприн</p>
                </span>
                <span class="text_info count">
                    <p>Выполнено за месяц:</p>
                    <p class="opacity font_18">50</p>
                </span>
                <span class="text_info count">
                    <p>Выполнено за все время:</p>
                    <p class="opacity font_18">50</p>
                </span>
                <span class="text_info count">
                    <p>Текущие заказы:</p>
                    <p class="opacity font_18">50</p>
                </span>

                <div class="mobile_count">

                    <span class="text_info mobile_item">
                        <p class="opacityf font_18">50</p>
                        <p class="bold">Выполнено за месяц</p>
                    </span>
                    <span class="text_info mobile_item">
                        <p class="font_18">50</p>
                        <p class="bold">Выполнено за все время</p>
                    </span>
                    <span class="text_info count">
                        <p class="font_18">50</p>
                        <p class="bold">Текущие заказы</p>
                    </span>

                </div>

            </div>
            <div class="buttons">
                <button class="button border"><span class="edit"><img src="icon/edit.svg" alt=""></span><p class="hidden">Редактировать</p></button>
                <button class="button border"><span class="delete"><img src="icon//trash 1.svg" alt=""></span><p class="hidden">Удалить</p></button>
            </div>

            <div class="number">
                <p class="spacing">Номер телефона:<br><span class="b"> +7(***)*** - 00 - 00</span> </p> 
            </div>
            <div class="rating">
                <div class="item_rating" id="red"></div>
                <div class="item_rating" id="orange"></div>
                <div class="item_rating" id="yellow"></div>
                <div class="item_rating" id="light_green"></div>
                <div class="item_rating" id="dark_green"></div>
            </div>
        </div>

        <div class="competence_list">
            <p class="name">Компетенция:</p>
            <div class=" border competences">
            <span class="border cell competence_item register">something  something something something something something something something something something something something something something something something something somethingsomething something<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>
            <span class="border cell competence_item register">something new<img src="icon/close.svg" alt="close"></span>

            </div>
        </div>
    </div>
    <!-- CONTENT -->
    <div class="content_wrap font_16">
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
        <div class="table_sysadmin" id="table">
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role">skdf;lskdfksdfksdlfkls</p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role">skdf;lskdfksdfksdlfkls</p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role">skdf;lskdfksdfksdlfkls</p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role">skdf;lskdfksdfksdlfkls</p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role">skdf;lskdfksdfksdlfkls</p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role">skdf;lskdfksdfksdlfkls</p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role">skdf;lskdfksdfksdlfkls</p></div><button class="click button border font_16">Просмотреть</button></div>
            <div class="item_table"><div class="item_info border"><p class="main_fio">milaninn</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p><p class="role">Роль</p></div><div class="mobile_info"><p class="complete_order">reorewkjlkfs</p><p class="current_order">sdkjflskjfkksjkd</p><p class="role">newksjfksdf</p></div></div><p class="mobile_none complete_order">kjkjsdfjfjkkljdsfk</p><p class="mobile_none current_order">jdslfjsdkjfskd</p><p class="mobile_none role"><skdf;lskdfksdfksdlfkls/p></div><button class="click button border font_16">Просмотреть</button></div>
        </div>  

    </div>

    <!-- <script src="js/modal_windows.js"></script> -->
    <!-- <script src="js/profile_sysadmin.js"></script> -->
    <script src="<?php echo $navigation_panel ?>"></script>
</body>

</html>


