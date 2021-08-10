<?php
include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_add_sysadmin ?>">
    <?php echo $favicon, $jquery  ?>
    <title><?php echo $add_sysadmin ?></title>
</head>

<body>
    <?php include_once('navigation.php'); ?></nav>
    <?php   $question = 'Вы точно хотите добавить новую организацию?'; 
            $error = 'Не получилось добавить нового пользователя';
            $success = 'Успешно добавлен новый сис. администратор'; ?>
    <?php include_once('modal windows/question_window.php'); ?>
    <?php include_once('modal windows/error_window.php'); ?>
    <?php include_once('modal windows/success_window.php'); ?>

    <!-- CONTENT -->
    <div class="content_wrap">
        <p class="font_24 bold">Добавление системного администратора</p>
        <div class="content_set"> </div>

    </div>

    <script src="js/modal_windows.js"></script>
    <script src="js/add_sysadmin.js"></script>
    <script src="<?php echo $navigation_panel ?>"></script>
</body>

</html>


