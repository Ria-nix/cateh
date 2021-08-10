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
    <div class="header">
        <?php include_once('navigation.php'); ?></nav>
        <?php   $question = 'Вы точно хотите добавить новую организацию?'; ?>
        <?php include_once('modal windows/question_window.php'); ?>
    </div>
    <!-- CONTENT -->
    <div class="content_wrap">
        <div class="profile">
            <div class="image"> 
                <div class="logo_organization">
                    <img src="icon/logo_server.svg" alt="main logo">
                </div>
            </div>
            <div class="text"> 
                <span class="item_info name_organ">
                    <p>Название: </p>
                    <p class="opacity">ООО “КРЕАТИВ ТЕКНОЛОДЖИС” </p>
                </span>
                <span class="item_info">
                    <p>Выполнено за месяц:</p>
                    <p class="opacity">50</p>
                </span>
                <span class="item_info">
                    <p>Выполнено за все время:</p>
                    <p class="opacity">50</p>
                </span>
            </div>
            <div class="buttons">
                <button class="button border"><span class="edit"><img src="icon/edit.svg" alt=""></span> Редактировать</button>
                <button class="button border"><span class="delete"><img src="icon//trash 1.svg" alt=""></span> Удалить</button>
            </div>
        </div>
        <div class="tabs">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro praesentium, suscipit nostrum unde fugit, ut consequuntur laboriosam maxime quas distinctio recusandae, commodi sint asperiores? Nam possimus obcaecati laborum voluptatem repellendus?
            Saepe deleniti, ad necessitatibus nisi porro aliquid in enim esse doloremque quia illo nobis accusantium. Dolorem quibusdam vero temporibus consequatur perspiciatis culpa dolore. Aspernatur libero magnam magni, culpa saepe quam.
        </div>

    </div>

    <script src="js/modal_windows.js"></script>
    <!-- <script src="js/add_sysadmin.js"></script> -->
    <script src="<?php echo $navigation_panel ?>"></script>
</body>

</html>


