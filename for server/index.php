<?php include(getRootPath() . "site/includes/dasha/v1/helper.php");
if (empty($_GET["id"])) {
    die("empty GET \"id\"");
}
\v3artemy\MySql::setLastUsedDBname($_COOKIE["DBname"]);
$sysadmin = \v3artemy\Sysadmin::getById($_GET["id"]);

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
    <link rel="stylesheet" href="<?php echo $css_profile_sysadmin ?>">
    <?php echo $favicon, $jquery ?>
    <title><?php echo $profile_sysadmin ?></title>
    <script defer src="site/pages/sysadmins/profile/script.js"></script>
</head>

<body>
<?php include_once(getRootPath() . "site/includes/dasha/v1/navigation/navigation.php"); ?> </nav>
<?php $question = 'Вы точно хотите добавить новую организацию?'; ?>
<?php include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/question_window.php');
?>

<div class="profile_buttons">
    <div class="profile">
        <p class="role_sysadmin spacing"><?= $sysadmin->getTextRole() ?></p>
        <div class="image">
            <div class="logo_organization">
                <img src="<?= $image_src ?>">
            </div>
        </div>
        <div class="text">
                <span class="text_info">
                    <p class="spacing font_22"><?= $sysadmin->getName() . " " . $sysadmin->getSurname() ?></p>
                </span>
            <span class="text_info count">
                    <p>Выполнено за месяц:</p>
                    <p class="opacity font_18"><?= $sysadmin->getNumberOfMadeOrdersForMonth() ?></p>
                </span>
            <span class="text_info count">
                    <p>Выполнено за все время:</p>
                    <p class="opacity font_18"><?= $sysadmin->getNumberOfMadeOrders() ?></p>
                </span>
            <span class="text_info count">
                    <p>Активные заказы:</p>
                    <p class="opacity font_18"><?= $sysadmin->getNumberOfActiveOrders() ?></p>
                </span>

            <div class="mobile_count">

                    <span class="text_info mobile_item">
                        <p class="opacityf font_18"><?= $sysadmin->getNumberOfMadeOrdersForMonth() ?></p>
                        <p class="bold">Выполнено за месяц</p>
                    </span>
                <span class="text_info mobile_item">
                        <p class="font_18"><?= $sysadmin->getNumberOfMadeOrders() ?></p>
                        <p class="bold">Выполнено за все время</p>
                    </span>
                <span class="text_info count">
                        <p class="font_18"><?= $sysadmin->getNumberOfActiveOrders() ?></p>
                        <p class="bold">Активные заказы</p>
                    </span>

            </div>

        </div>
        <div class="buttons">
            <button class="button border" onclick="goToEditProfile(<?= $sysadmin->getId() ?>)"><span class="edit"><img
                            src="site/includes/dasha/icons/edit.svg"
                            alt=""></span>
                <p class="hidden">Редактировать</p></button>
            <button class="button border" onclick="deleteProfile(<?= $sysadmin->getId() ?>)"><span class="delete"><img
                            src="site/includes/dasha/icons/trash 1.svg" alt=""></span>
                <p class="hidden">Удалить</p></button>
        </div>

        <div class="number">
            <p class="spacing">Номер телефона:<br><span class="b"><a
                            href="tel:<?= $sysadmin->getPhoneNumber() ?>"><?= $sysadmin->getPhoneNumber() ?></a></span>
            </p>
        </div>
        <div class="rating">
            <div class="item_rating" <?= $sysadmin->getRating() > 0 ? "id='red'" : "" ?>></div>
            <div class="item_rating" <?= $sysadmin->getRating() > 1 ? "id='orange'" : "" ?>></div>
            <div class="item_rating" <?= $sysadmin->getRating() > 2 ? "id='yellow'" : "" ?>><?= $sysadmin->getRating() ?></div>
            <div class="item_rating" <?= $sysadmin->getRating() > 3 ? "id='light_green'" : "" ?>></div>
            <div class="item_rating" <?= $sysadmin->getRating() > 4 ? "id='dark_green'" : "" ?>></div>
        </div>
    </div>

    <div class="competence_list">
        <p class="name">Компетенция:</p>
        <div class=" border competences">
            <?php
            foreach ($sysadmin->getCategories() as $role) {
                $role_id = $role["id"];
                $role_name = $role["name"];
                echo "<span id='role_id_$role_id' class=\"border cell competence_item register\">$role_name</span>";
            }
            ?>
        </div>
    </div>
</div>
<!-- CONTENT -->
<div class="content_wrap font_16">
    <!-- HEAD TABLE -->
    <div class="head_table">
        <div class="head_name spacing_special">
            <p> Организация <span class="ask_des_arrow">
                <img src="site/includes/dasha/icons/up_arrow.svg" alt="arrow" id="arrow">
            </span>
            </p>
            <p>Выполнено за месяц</p>
            <p>Текущих заказов </p>
        </div>
    </div>
    <!-- TABLE -->
    <div class="table_sysadmin" id="table" style="overflow: visible">
        <div class="item_table">
            <div class="item_info border">
                <p class="main_fio">name</p>
                <div class="mobile_version">
                    <div class="mobile_title">
                        <p>Выполнено за месяц</p>
                        <p>Текущих заказов</p>
                    </div>
                    <div class="mobile_info">
                        <p class="complete_order">За месяц 50</p>
                        <p class="current_order">Текущи 50</p>
                    </div>
                </div>
                <p class="mobile_none complete_order">За месяц</p>
                <p class="mobile_none current_order">Текущие</p>
            </div>
            <button class="click button border font_16">Просмотреть</button>
        </div>
    </div>
</div>

<script src="site/includes/dasha/v1/modal_windows/modal_windows.js"></script>

<script src="site/includes/dasha/v1/navigation/navigation.js"></script>
</body>

</html>


