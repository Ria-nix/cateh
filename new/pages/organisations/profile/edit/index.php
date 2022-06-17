<?php include(getRootPath() . "site/includes/dasha/v1/helper.php"); 
if (empty($_GET["id"])) {
    die("empty GET \"id\"");
}
$link = \v3artemy\MySql::getMysql($_COOKIE["DBname"]);
$organisation = \v3artemy\Organisation::getById($_GET["id"]);

if ($organisation === false) {
    die("invalid id");
}

$image_src = $organisation->getLogo() !== null ? 'data:' . $organisation->getLogoMimeType() . ';base64,' . base64_encode($organisation->getLogo()) : "site/includes/dasha/icons/anonym_organization.svg";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site/pages/organisations/profile/edit/style.css">
    <?php echo $favicon, $jquery ?>
    <title>Редактирование организации</title>
</head>
<body>
<?php  include_once(getRootPath() . "site/includes/dasha/v1/navigation/navigation.php");?> </nav>
    <?php  $question = 'Вы точно хотите изменить данную организацию?'; 
            $success = 'Организация была успешно изменена!'; ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/question_window.php'); ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/success_window.php'); ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/error_window.php'); ?>
    
    
    <!-- CONTENT -->
    <div class="content_wrap">
        <p class="font_22 bold" id="<?=$organisation->getId()?>">Редактирование организации</p>
        <div class="content_set">
            <div class="name_organisation">
                <label for="name">Название организации</label>
                <input type="text" id="name" class="add_info json" placeholder='ООО Название компании' value='<?=$organisation->getName()?>'>
            </div>
            <!-- <div class="password_organisation">
                <label for="password">Пароль</label>
                <button class="button_gray border font_16 pass">Сгенерировать новый пароль</button>
                <div class="none"><img src="" alt="mark about generatio a new password"></div>
            </div>                      -->
            <div class="adress_organisation">
                <label for="address">Адрес</label>
                <input type="text" id="address" class="field_address" placeholder="ул.Маркаса д.9">
                <span class="button border none" id="add_address">
                    <img src="site/includes/dasha/icons/plus-solid.svg" alt="plus_solid">
                </span>
            </div>
            <div class="mobile_fields_address"></div>
            <div class="fields_address"></div>
            <div class="img_organization">
                <div class="image border">
                    <img class="wrap_organ" src="<?=$image_src?>" alt="logo">
                </div>                
                <div class="img_buttons">
                    <input name="file" type="file" id="input_file" class="choose_file">
                    <label class="button_gray border font_16" for="input_file" id="download_file">Выбрать</label>
                    <button class="button_gray border font_16" id="delete_organ">Удалить</button>
                </div>
            </div>
            <div class="save">
                <button class="button border font_16" id="check_button">Изменить</button>
            </div>
        </div>
    </div>
<script src="site/includes/dasha/v1/modal_windows/modal_windows.js"></script>
<script src="site/pages/organisations/profile/edit/script.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script>
        
</body>
</html>