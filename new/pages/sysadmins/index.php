<?php  include(getRootPath() . "site/includes/dasha/v1/helper.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site/pages/sysadmins/style.css">
    <link rel="stylesheet" href="site/includes/artemy/v3/css/arrows.css">
    <link rel="stylesheet" href="site/includes/artemy/v3/css/skeleton-loader.css">
    <?php echo $favicon, $jquery?>
    <title>Главная: Системные администраторы</title>
</head>
<body>
    <div class="header">
        <?php  include_once(getRootPath() . "site/includes/dasha/v1/navigation/navigation.php");?>
        <!-- THE END OF NAVIGATION PANEL -->
            <div class="search">            
                <p class="font_18 bold">Cистемные администраторы</p>
                <input class="border" type="search" placeholder="Введите ФИО" id="search">
                <button class="button border font_16" onclick="findByNameAndRender($('#search').val())">Найти</button>
            </div>
        </nav>
    </div>
    <!-- CONTENT -->
    <div class="content_wrap">
        <!-- HEAD TABLE -->
        <div class="head_table">
            <div class="head_name spacing_special">
                <p>ФИО
                    <span class="sort-arrow none">
                        <img class="sort-arrow-down" id="arrow" src="site/includes/dasha/icons/up_arrow.svg" alt="arrow" onclick="sortByFIO(arrayOfEmployees)">
                    </span>
                </p>
                <p>Выполнено за месяц</p>
                <p>Активные заказы</p>
                <p>Статус</p>
            </div>
        </div>
        <!-- TABLE -->
        <div class="table_sysadmin" id="table">
            <div class="item_table font_18 skeleton-loader"><div class="item_info border"><p class="main_fio">⠀</p><div class="mobile_version"><div class="mobile_title"><p>⠀</p><p>⠀</p><p class="role">⠀</p></div><div class="mobile_info"><p class="complete_order"></p><p class="current_order"></p><p class="role"></p></div></div><p class="mobile_none complete_order"></p><p class="mobile_none current_order"></p><p class="mobile_none role"></p></div></div>
            <div class="item_table font_18 skeleton-loader"><div class="item_info border"><p class="main_fio">⠀</p><div class="mobile_version"><div class="mobile_title"><p>⠀</p><p>⠀</p><p class="role">⠀</p></div><div class="mobile_info"><p class="complete_order"></p><p class="current_order"></p><p class="role"></p></div></div><p class="mobile_none complete_order"></p><p class="mobile_none current_order"></p><p class="mobile_none role"></p></div></div>
            <div class="item_table font_18 skeleton-loader"><div class="item_info border"><p class="main_fio">⠀</p><div class="mobile_version"><div class="mobile_title"><p>⠀</p><p>⠀</p><p class="role">⠀</p></div><div class="mobile_info"><p class="complete_order"></p><p class="current_order"></p><p class="role"></p></div></div><p class="mobile_none complete_order"></p><p class="mobile_none current_order"></p><p class="mobile_none role"></p></div></div>
            <div class="item_table font_18 skeleton-loader"><div class="item_info border"><p class="main_fio">⠀</p><div class="mobile_version"><div class="mobile_title"><p>⠀</p><p>⠀</p><p class="role">⠀</p></div><div class="mobile_info"><p class="complete_order"></p><p class="current_order"></p><p class="role"></p></div></div><p class="mobile_none complete_order"></p><p class="mobile_none current_order"></p><p class="mobile_none role"></p></div></div>
            <div class="item_table font_18 skeleton-loader"><div class="item_info border"><p class="main_fio">⠀</p><div class="mobile_version"><div class="mobile_title"><p>⠀</p><p>⠀</p><p class="role">⠀</p></div><div class="mobile_info"><p class="complete_order"></p><p class="current_order"></p><p class="role"></p></div></div><p class="mobile_none complete_order"></p><p class="mobile_none current_order"></p><p class="mobile_none role"></p></div></div>
            <div class="item_table font_18 skeleton-loader"><div class="item_info border"><p class="main_fio">⠀</p><div class="mobile_version"><div class="mobile_title"><p>⠀</p><p>⠀</p><p class="role">⠀</p></div><div class="mobile_info"><p class="complete_order"></p><p class="current_order"></p><p class="role"></p></div></div><p class="mobile_none complete_order"></p><p class="mobile_none current_order"></p><p class="mobile_none role"></p></div></div>
            <div class="item_table font_18 skeleton-loader"><div class="item_info border"><p class="main_fio">⠀</p><div class="mobile_version"><div class="mobile_title"><p>⠀</p><p>⠀</p><p class="role">⠀</p></div><div class="mobile_info"><p class="complete_order"></p><p class="current_order"></p><p class="role"></p></div></div><p class="mobile_none complete_order"></p><p class="mobile_none current_order"></p><p class="mobile_none role"></p></div></div>
            <div class="item_table font_18 skeleton-loader"><div class="item_info border"><p class="main_fio">⠀</p><div class="mobile_version"><div class="mobile_title"><p>⠀</p><p>⠀</p><p class="role">⠀</p></div><div class="mobile_info"><p class="complete_order"></p><p class="current_order"></p><p class="role"></p></div></div><p class="mobile_none complete_order"></p><p class="mobile_none current_order"></p><p class="mobile_none role"></p></div></div>
        </div>
    </div>
    <?php include_once(getRootPath() . "site/includes/dasha/v1/footer/footer.php");?>
    <script src="site/pages/sysadmins/script.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script>
</body>
</html>