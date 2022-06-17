<?php  include(getRootPath() . "site/includes/dasha/v1/helper.php"); ?>
<!-- <!DOCTYPE html> -->
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="site/pages/order/style.css">    
    <?php echo $favicon, $jquery ?>
    <title>Заказ №12569589</title>
</head>
<body>
<?php  include_once(getRootPath() . "site/includes/dasha/v1/navigation/navigation.php");?></nav>
    <!-- CONTENT -->
    <div class="content_wrap">
        <div class="head_order">
            <div class="back_button">
                <button class="button border" id="back_arrow">
                    <span><img src="site\includes\dasha\icons\restore.svg" alt="restore"></span>
                    Назад</button>
            </div>
            <div class="text">
                <p class="bold font_24">Заказ №12569589</p>
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
                <div class="textarea_full border font_16">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quibusdam perferendis deleniti qui doloremque, reiciendis maxime culpa iusto modi odio, dignissimos nihil provident ad molestiae. Eveniet autem accusamus neque dicta vel.
                    Aspernatur qui deserunt minus debitis earum fuga eius sed vel deleniti facere iste illo et consequuntur, totam excepturi optio distinctio, quod voluptates beatae delectus sit exercitationem odit animi. Nostrum, saepe!
                    Recusandae nisi delectus est labore enim corporis at totam, vitae accusantium incidunt animi ullam dicta cumque! Sed exercitationem aperiam et, dolore, quam, veniam magnam nostrum cumque deserunt tenetur ipsam animi?
                </div>
            </div>
            <div class="border main_fields">
                <p>Комментарий к заказу:</p><br>  
                <div class="wrap_comments">
                    <div class="comments">
                        <div class="item_comment border font_16">
                            Ipsum alias repellendus quod laboriosam, eligendi dolore corporis beatae fuga expedita neque!
                        </div>
                        <div class="item_comment border font_16">
                            expedita neque!
                        </div>
                    </div>
                    <div class="date_end">
                        <p>Создание<br>комментария</p>
                        <p class="date opacity">25.03.2021</p>
                    </div>
                </div>        
            </div>
            <div class="border main_fields conclusion">
                <p>Заключение:</p><br>
                <div class="textarea_full border font_16">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo cupiditate nostrum, veritatis tenetur dolorem deleniti vitae reprehenderit rerum esse nam, voluptatibus labore? Dicta enim eos incidunt magnam ipsum dignissimos unde?
                    Aspernatur, dolorum quas voluptatem facilis ad assumenda eveniet laborum magni placeat quam error nam iusto neque laudantium, non quaerat quo animi velit fugiat omnis saepe cumque voluptatum tempore? Odio, inventore?
                    Numquam temporibus, rem dolorum sint veritatis ad labore obcaecati libero odit quod maiores nemo quae quibusdam praesentium molestias quaerat velit sed dolores eius voluptate eveniet quasi blanditiis commodi natus? Pariatur?
                </div>
                
            </div>
        </div>
    </div>   
    <script src="js/order.js"></script>
    <script src="site/pages/order/script.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script>
        
</body>
</html>