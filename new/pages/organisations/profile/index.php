<?php
include(getRootPath() . "site/includes/dasha/v1/helper.php");
include(getRootPath() . "site/includes/artemy/v3/organisation/Organisation.php");
include(getRootPath() . "site/includes/artemy/v3/order/Order.php");

if (empty($_GET["id"])) {
    die("empty GET \"id\"");
}
$link = \v3artemy\MySql::getMysql($_COOKIE["DBname"]);
$organisation = \v3artemy\Organisation::getById($_GET["id"]);

if ($organisation === false) {
    die("invalid id");
}

$image_src = $organisation->getLogo() !== null ? 'data:' . $organisation->getLogoMimeType() . ';base64,' . base64_encode($organisation->getLogo()) : "site/includes/dasha/icons/michael.jpg";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="site/pages/organisations/profile/script.js"></script>
    <link rel="stylesheet" href="site/pages/organisations/profile/style.css">
    <?php echo $favicon, $jquery ?>
    <title>Профиль Организации</title>
</head>

<body>
<?php include_once(getRootPath() . "site/includes/dasha/v1/navigation/navigation.php"); ?></nav>
<?php $question = 'Вы точно хотите добавить новую организацию?'; ?>
<?php include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/question_window.php'); ?>

<div class="profile_buttons">
    <div class="profile">
        <div class="image">
            <div class="logo_organization border">
                <img src="<?= $image_src ?>" alt="main logo">
            </div>
        </div>
        <div class="text">
                <span class="text_info">
                    <p class="bold hidden">Название:</p>
                    <p class="opacity spacing"><?= $organisation->getName() ?></p>
                </span>
            <span class="text_info count">
                    <p class="bold">Выполнено за месяц:</p>
                    <p class="opacity font_18"><?= $organisation->getNumberOfMadeOrdersForMonth() ?></p>
                </span>
            <span class="text_info count">
                    <p class="bold">Выполнено за все время:</p>
                    <p class="opacity font_18"><?= $organisation->getNumberOfMadeOrders() ?></p>
                </span>
            <div class="mobile_count">
                    <span class="text_info mobile_item">
                        <p class="font_18"><?= $organisation->getNumberOfMadeOrdersForMonth() ?></p>
                        <p class="bold">Выполнено за месяц</p>
                    </span>
                <span class="text_info mobile_item">
                        <p class="font_18"><?= $organisation->getNumberOfMadeOrders() ?></p>
                        <p class="bold">Выполнено за все время</p>
                    </span>
            </div>
        </div>
        <div class="buttons">
            <button class="button border" id="edit_organ" onclick="goToEditOrgan(<?= $organisation->getId() ?>)">
                <span class="edit"><img src="site/includes/dasha/icons/edit.svg"
                                                            alt=""></span>
                <p class="hidden">Редактировать</p></button>
            <button class="button border" id="delete_organ" onclick="deleteOrgan(<?= $organisation->getId() ?>)">
                <span class="delete"><img src="site/includes/dasha/icons/trash 1.svg" alt=""></span>
                <p class="hidden">Удалить</p></button>
        </div>
    </div>

    <div class="tabs">
        <label class="item_tabs active_btn" id="orders">Заказы</label>
        <label class="item_tabs" id="addresses">Адреса</label>
        <label class="item_tabs" id="clients">Клиенты</label>
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
            <?php
            $orders = $organisation->getAllOrganisationOrders();
            //            var_dump($orders);

            foreach ($orders as $order) {
                $order_id = $order["id"];
                $order_name = $order["name"];
                $order_status = \v3artemy\Order::translateStatusToText($order["status"]);
                $sysadmin_name = $order["name"];
                echo '<div class="item_table">
                    <div class="item_info border">
                        <p class="main_fio"> Заказ №' . $order_id . '</p>
                        <div class="mobile_version">
                            <div class="mobile_title">
                                <p>Клиент</p>
                                <p>Статус </p>
                                <p class="role">Роль</p>
                            </div>
                            <div class="mobile_info">
                                <p class="complete_order">' . $order_name . '</p>
                                <p class="current_order">' . $order_status . '</p>
                                <p class="role">' . $sysadmin_name . '</p>
                            </div>
                        </div>
                        <p class="mobile_none complete_order">' . $order_name . '</p>
                        <p class="mobile_none current_order">' . $order_status . '</p>
                        <p class="mobile_none role">' . $sysadmin_name . '</p>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>

    <div class="addresses_item none_label">
        <div class="head_table">
            <div class="head_name spacing_special w_100">
                <p>Адрес</p>
                <p>Выполнено заказов</p>
                <p>Активных заказов</p>
            </div>
        </div>
        <!-- TABLE -->
        <div class="table_sysadmin" id="table">
<?php
//foreach () {
    echo '            <div class="item_table">
                <div class="item_info border">
                    <p class="main_fio">address</p>
                    <div class="mobile_version">
                        <div class="mobile_title">
                            <p>Выполнено за месяц</p>
                            <p>Активных заказов </p>
<!--                            <p class="role">Роль</p>-->
                        </div>
                        <div class="mobile_info">
                            <p class="complete_order">выполнено</p>
                            <p class="current_order">активных</p>
                        </div>
                    </div>
                    <p class="mobile_none complete_order">выполнено</p>
                    <p class="mobile_none current_order">активных</p>
                </div>
            </div>'
//}
?>
        </div>
    </div>

    <div class="clients_item none_label">
        <div class="head_table">
            <div class="head_name spacing_special w_100">
                <p>Клиент</p>
                <p>Номер телефона</p>
                <p>Адрес</p>
            </div>
        </div>
        <!-- TABLE -->

        <!-- //******************************************* */ -->
        <div class="table_sysadmin" id="table">
            <?php
            $clients = $organisation->getClientsInfo();
            foreach ($clients as $client) {
                $name = $client["name"] . " " . $client["surname"];
                $phone = $client["phone_number"];
                $address = $client["lastUsedAddress"];
                $role = \v3artemy\Customer::translateRoleToText($client["role"]);


                echo '<div class="item_table">
                <div class="item_info border">
                    <p class="main_fio">' . $name . '</p>
                    <div class="mobile_version">
                        <div class="mobile_title">
                            <p>Номер телефона</p>
                            <p>Адрес</p>
                        </div>
                        
                        <div class="mobile_info">
                            <p class="complete_order">' . $phone . '</p>
                            <p class="current_order">' . $address . '</p>
                        </div>
                    </div>
                        <p class="mobile_none complete_order">' . $phone . '</p>
                        <p class="mobile_none current_order">' . $address . '</p>
                    </div>
            </div>';
            }
            ?>
        </div>
    </div>

</div>

<script src="site/includes/dasha/v1/modal_windows/modal_windows.js"></script>
<script src="site/includes/dasha/v1/navigation/navigation.js"></script>
<script src="<?php echo $navigation_panel ?>"></script>
</body>

</html>


