<?php use v2artemy\CategoriesInfo;
use v3artemy\MySql;
use v3artemy\Sysadmin;

include(getRootPath() . "site/includes/dasha/v1/helper.php");
if (empty($_GET["id"])) {
    die("empty GET \"id\"");
}
MySql::setLastUsedDBname($_COOKIE["DBname"]);
$sysadmin = Sysadmin::getById($_GET["id"]);

if ($sysadmin === false) {
    die("invalid id");
}

$image_src = $sysadmin->getLogo() !== null ? 'data:' . $sysadmin->getLogoMimeType() . ';base64,' . base64_encode($sysadmin->getLogo()) : "site/includes/dasha/icons/michael.jpg";

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site/pages/sysadmins/profile/edit/style.css">
    <?php echo $favicon, $jquery ?>
    <title>Редактирование системного администратора</title>
</head>

<body>
<?php  include_once(getRootPath() . "site/includes/dasha/v1/navigation/navigation.php");?></nav>
    <?php  $question = 'Вы точно хотите изменить данного администратора?'; 
            $success = 'Успешно добавлен новый сис. администратор'; ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/question_window.php'); ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/success_window.php'); ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/error_window.php'); ?>

    <!-- CONTENT -->
    <div class="content_wrap">
        <p class="font_22 bold" id="<?=$sysadmin->getId()?>">Редактирование системного администратора</p>
        <div class="content_set">

            <div class="main_fields">
                <label for="email">Email</label>
                <input type="text" id="email" class="add_info" placeholder="email@gmail.com" value="<?=$sysadmin->getEmail()?>" >
            </div>

            <div class="main_fields">
                <label for="password">Пароль</label>
                <input type="text" id="password" class="add_info" placeholder="123*****89" value="<?=$sysadmin->getPassword()?>">
            </div>

            <div class="main_fields">
                <label for="name">Имя</label>
                <input type="text" id="name" class="add_info" placeholder="Михаил" value="<?=$sysadmin->getName()?>" >
            </div>

            <div class="main_fields">
                <label for="surname">Фамилия</label>
                <input type="text" id="surname" class="add_info" placeholder="Куприн" value="<?=$sysadmin->getSurname()?>" >
            </div>

            <div class="main_fields">
                <label for="tel_number">Номер телефона</label>
                <input type="text" id="tel_number" placeholder="+7 950 *** 22 01" pattern="/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g" value="<?=$sysadmin->getPhoneNumber()?>" >
            </div>

            <div class="main_fields">
                <label for="state" class="text_width">Статус</label>
                <div class="searchable border">
                    <input type="text" class="border_none state_value" value="<?=$sysadmin->getTextRole()?>" readonly>
                    <span id="polygon_state">
                        <img src="site/includes/dasha/icons/Polygon.svg" alt="polygon">
                    </span>
                    <ul class="spacing none" id="list_state">
                        <li class="states">Системный администратор</li>
                        <li class="states">Администратор</li>
                    </ul>                    
                </div>
            </div>

            <div class="field_choice main_fields">
                <label for="address" class="text_width">Добавьте компетенцию</label>
                <div class="searchable border">
                    <input type="text" class=" border_none" id="id_search" placeholder="Введите компетенцию">
                    <span id="polygon">
                        <img src="site/includes/dasha/icons/Polygon.svg" alt="polygon">
                    </span>
                    <ul class="font_18 spacing none" id="list">
                        <?php
                        include_once(getRootPath() . "site/includes/artemy/v2/cooler_helpers.php");
                        include_once(getRootPath() . "site/includes/artemy/v2/MySQL.php");
                        include_once(getRootPath() . "site/includes/artemy/v2/CategoriesInfo.php");

                        $link = \v2artemy\getLink($_COOKIE["DBname"]);
                        //  include_once getRootPath() . "site/includes/artemy/v2/UserInfo.php";
                        $categories = new CategoriesInfo($link);
                        $all_categories = $categories->fetch();

                        foreach($all_categories as $category) {
                            echo "<li class=\"competence\" id={$category['id']}>{$category['name']}</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <div class="competences border">
                <?php
                foreach ($sysadmin->getCategories() as $role) {
                    $role_id = $role["id"];
                    $role_name = $role["name"];
                    echo "<span id='role_id_$role_id' class=\"border cell competence_item register\">$role_name <img src='site/includes/dasha/icons/close.svg' alt='close'></span>";
                }
                ?>
            </div>

            <div class="img_organization">
                <div class="image border">
                    <img class="wrap_admin border" src="<?= $image_src ?>" alt="logo">
                </div>
                <div class="img_buttons">
                    <input type="file" class="choose_file" id="input_file">
                    <label class="button_gray border font_16" for="input_file" id="download_file">Выбрать</label>
                    <button class="button_gray border font_16" id="delete_admin" class="delete_img">Удалить</button>
                </div>
            </div>

            <div class="save">
                <button class="button border font_16" id="check_button">Изменить</button>
            </div>

        </div>
    </div>

<script src="site/includes/dasha/v1/modal_windows/modal_windows.js"></script>
<script src="/site/pages/sysadmins/profile/edit/script.js"></script>
<script src="site/includes/dasha/v1/navigation/navigation.js"></script>
</body>

</html>