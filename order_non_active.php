<?php  include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="<?php $ru ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_order ?>">    
    <?php echo $favicon, $jquery ?>
    <title>Non Active</title>
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
            <div class="back_button">
                <button class="button border"><span><img src="icon/restore.svg" alt="restore"></span>Назад</button>
            </div>
            <div class="text all_opacity">
                <p class="bold font_24">Заказ №102544589</p>
            </div>
            <div class="empty"></div>
        </div>
        <div class="content_set">
            <div class="border main_fields main_info">
                <div class="fist_block">
                    <span class="item_info">
                        <p class="main_text">ФИО клиента:</p>
                        <p class="opacity">43 кабинет</p>
                    </span>
                    <span class="item_info">
                        <p class="main_text">Организация:</p>
                        <p class="opacity">ООО "Креатив Текнолоджис"</p>
                    </span>
                    <span class="item_info">
                        <p class="main_text">Номер телефона:</p>
                        <p class="opacity">+7(***)*** - 00 - 00</p>
                    </span>
                    <span class="item_info">
                        <p class="main_text">Адрес:</p>
                        <p class="opacity">ул. Портовая</p>
                    </span>
                </div>

                <div class="second_block">
                    <span class="item_info">
                        <p class="main_text">Сис. администратор:</p>
                        <p class="opacity">Михаил Reghby</p>
                    </span>
                    <span class="item_info">
                        <p class="main_text">Статус:</p>
                        <p class="opacity">Завершено</p>
                    </span>
                    <span class="item_info">
                        <p class="main_text">Дата принятия заказа:</p>
                        <p class="opacity">25.05.2021</p>
                    </span>
                    <span class="item_info">
                        <p class="main_text">Дата завершения заказа:</p>
                        <p class="opacity">25.05.2021</p>
                    </span>
                </div>
            </div>
            <div class="border main_fields">
                <p>Описание проблемы:</p><br>
                <textarea class="textarea_full border font_16" disabled>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam perferendis deleniti qui doloremque, reiciendis maxime culpa iusto modi odio, dignissimos nihil provident ad molestiae. Eveniet autem accusamus neque dicta vel.
                    Aspernatur qui deserunt minus debitis earum fuga eius sed vel deleniti facere iste illo et consequuntur, totam excepturi optio distinctio, quod voluptates beatae delectus sit exercitationem odit animi. Nostrum, saepe!
                    Cumque iste odit aspernatur nemo neque soluta. Est nisi sapiente pariatur magni eligendi non repellendus, corrupti ad dicta doloremque nulla fugiat minima, minus facere id sunt eaque voluptates iusto consectetur?
                    Maiores repellat illo numquam enim animi eum accusamus rerum? Facilis nobis iste reprehenderit rem dolorem blanditiis exercitationem expedita vitae consectetur labore, similique aperiam suscipit commodi sequi in, architecto asperiores distinctio.
                    Recusandae nisi delectus est labore enim corporis at totam, vitae accusantium incidunt animi ullam dicta cumque! Sed exercitationem aperiam et, dolore, quam, veniam magnam nostrum cumque deserunt tenetur ipsam animi?
                </textarea>
            </div>
            <div class="border main_fields">
                <p>Комментарий к заказу:</p><br>                
                <div class="date_end">
                    <textarea class="comments border font_16" disabled>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo maxime aperiam ipsam veritatis eaque exercitationem aliquid earum! Est officia molestias cumque accusamus magnam aliquid unde rerum illum impedit, voluptatem amet.
                        Dolores repellat laborum iste, magnam temporibus, culpa, delectus ad natus maiores quos error unde id deleniti nihil ipsa. Ipsum alias repellendus quod laboriosam, eligendi dolore corporis beatae fuga expedita neque!
                    </textarea>
                    <span>
                        <p>Создание<br>комментария</p>
                        <p class="date opacity">25.3.2021</p>
                    </span>
                </div>
            </div>
            <div class="border main_fields">
                <p>Заключение:</p><br>
                <textarea class="textarea_full border font_16" disabled>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo cupiditate nostrum, veritatis tenetur dolorem deleniti vitae reprehenderit rerum esse nam, voluptatibus labore? Dicta enim eos incidunt magnam ipsum dignissimos unde?
                    Aspernatur, dolorum quas voluptatem facilis ad assumenda eveniet laborum magni placeat quam error nam iusto neque laudantium, non quaerat quo animi velit fugiat omnis saepe cumque voluptatum tempore? Odio, inventore?
                    Numquam temporibus, rem dolorum sint veritatis ad labore obcaecati libero odit quod maiores nemo quae quibusdam praesentium molestias quaerat velit sed dolores eius voluptate eveniet quasi blanditiis commodi natus? Pariatur?
                </textarea>
                
            </div>
            <div class="save">
                <!-- <button class="button border"><span><img src="icon/edit.svg" alt="edit"></span>Редактировать</button>
                <button class="button border"><span><img src="icon/trash 1.svg" alt="trash"></span>Удалить</button> -->
                <button class="none button border"><span><img src="icon/trash 1.svg" alt="restore"></span>Восстановить</button>
            </div>
        </div>
    </div>
    <script src="js/modal_windows.js"></script>    
    <script src="js/order.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script>
        
</body>
</html>