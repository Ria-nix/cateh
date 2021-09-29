<?php  include(getRootPath() . "site/includes/dasha/v1/helper.php"); ?>
<!DOCTYPE html>
<html lang="<?php $ru ?>">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site/pages/organisations/add/style.css">
    <?php echo $favicon, $jquery ?>
    <title><?php echo $add_organ ?></title>
</head>
<body>
<?php  include_once(getRootPath() . "site/includes/dasha/v1/navigation/navigation.php");?> </nav>
<?php  $question = 'Вы точно хотите добавить новую организацию?';
$error = 'Не получилось добавить нового пользователя';
$success = 'Успешно добавлен новый сис. администратор'; ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/question_window.php'); ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/success_window.php'); ?>
<?php  include_once(getRootPath() . 'site/includes/dasha/v1/modal_windows/types/error_window.php'); ?>

<!-- CONTENT -->
<div class="content_wrap">
    <p class="font_22 bold"><?php echo $add_organ ?></p>
    <div class="content_set">
        <div class="name_organization">
            <label for="name">Название организации<i class='red'>*</i></label>
            <input type="text" id="name" class="add_info json" placeholder='ООО"Название компании"'>
        </div>
        <div class="inn_organization">
            <label for="inn">ИНН <i class='red'>*</i></label>
            <input type="number" id="inn" class="add_info json" placeholder="390025125634">
        </div>
        <div class="adress_organization">
            <label for="address">Адрес<i class='red'>*</i></label>
            <div class="item_address">
                <input type="text" id="address" class="field_address" placeholder="ул.Маркаса д.9" value="">
                <span class="button border" id="add_address">
                    <img src="site/includes/dasha/icons/plus-solid.svg" alt="plus_solid"> 
                </span>
            </div>  
            <div class="mobile_fields_address"></div>              
        </div>
        <div class="fields_address"></div>
        <div class="img_organization">
            <div class="image border">
                <img class="logo_second" src="site/includes/dasha/icons/anonym_organization.svg" alt="logo">
            </div>
            <div class="img_buttons">
                <input name="file" type="file" id="input_file">
                <label class="button_gray border font_16" for="input_file" id="download_file">Выбрать</label>
                <button class="button_gray border font_16" id="delete_organ">Удалить</button>
            </div>
        </div>
        <div class="save">
            <button class="button border font_16" id="check_button">Добавить</button>
        </div>
    </div>
</div>
<script src="site/includes/dasha/v1/modal_windows/modal_windows.js"></script>
<script src="site/pages/organisations/add/script.js"></script>
<script src="site/includes/dasha/v1/navigation/navigation.js"></script>

</body>
</html>