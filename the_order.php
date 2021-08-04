<?php  include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="<?php $ru ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_order ?>">    
    <?php echo $favicon, $jquery ?>
    <title><?php echo $order ?></title>
</head>
<body>
    <?php  include_once('navigation.php');?> </nav>
    <?php  $question = 'Вы точно хотите добавить новую организацию?'; 
           $error = 'Не получилось добавить нового пользователя';
           $success = 'Успешно добавлен новый сис. администратор'; ?>
    <?php  include_once('modal windows/question_window.php'); ?>
    <?php  include_once('modal windows/success_window.php'); ?>
    <?php  include_once('modal windows/error_window.php'); ?>
    
    <!-- CONTENT -->
    <div class="content_wrap">
        <div class="head_order">
            <div class="back_button">kjdjfasdjf;asf</div>
            <div class="text">kjdjfasdjf;asf</div>
            <div class="empty">kjdjfasdjf;asf</div>
        </div>
        <div class="content_set">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <script src="js/modal_windows.js"></script>    
    <script src="js/order.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script>
        
</body>
</html>