<?php  include('head_code.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $css_sysadmin ?>">
    <?php echo $favicon, $jquery  ?>
    <title><?php echo $sysadmin ?></title>
</head>
<body>
    <div class="header">
        <?php include_once('navigation.php');?> 
        <!-- THE END OF NAVIGATION PANEL -->        
        <div class="search">            
            <p class="font_18 bold">Системные администраторы</p>
            <input class="border" type="text" placeholder="Введите имя или фамилию">
            <button class="button border font_16">Найти</button>
        </div>
    </div>
    <!-- CONTENT -->
    <div class="content_wrap">
        <!-- HEAD TABLE -->
        <div class="head_table">
            <div class="head_name spacing_special">
                <p>ФИО <span class="ask_des_arrow"><img src="icon/up_arrow.svg" alt="arrow" id="arrow"></span></p>
                <p>Выполнено за месяц</p>
                <p>Текущих заказов </p>
                <p>Статус</p>
            </div>
        </div>
        <!-- TABLE -->
        <div class="table_sysadmin" id="table">

        new sdjfalsd fas Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium accusamus voluptas inventore ratione natus unde exercitationem saepe sint. Nihil cum quod nulla? Cum, aliquam illum? Temporibus aspernatur perferendis repellat mollitia.
        Expedita deleniti eligendi provident atque iusto. Doloribus dolor quasi aspernatur perferendis quidem omnis modi nihil aliquam rem mollitia earum eius, inventore facere culpa sunt facilis. Cumque dolorem animi nobis sequi.
        Quo necessitatibus tempora dolore laudantium consequatur, voluptatibus nesciunt sit, culpa delectus corrupti ipsam reiciendis magni quisquam temporibus unde quia corporis vitae praesentium distinctio repudiandae, voluptates explicabo? Eius cum dolor deleniti.
        Deserunt aspernatur dignissimos ea, cupiditate iste velit nulla vero! Obcaecati quidem aut nostrum laborum, doloribus libero molestias doloremque, magni natus veniam at dolore optio vitae fugit inventore itaque deleniti ipsum.
        Quod exercitationem fugit asperiores vel? Eaque at quam ipsum sapiente beatae repellendus recusandae perspiciatis assumenda voluptatibus. Soluta consequatur numquam veniam tempore? Consectetur sit facere eligendi dolorem soluta dicta, cum unde.
        In nobis quia architecto eos nisi illo cumque eveniet dolor cum! Illo doloribus debitis corporis quas voluptatibus quibusdam beatae iusto nisi eligendi rerum, suscipit ipsum libero quam aspernatur recusandae tenetur!
        Voluptatem laboriosam earum nesciunt corporis laborum, est modi rerum eligendi quisquam quos reprehenderit. Doloribus eveniet, tempora repudiandae, illo nobis aut consequatur, dicta ducimus nemo officia doloremque illum est perferendis omnis?
        Minus, quae? Quam aut autem debitis exercitationem officiis ratione earum suscipit dolorum, velit deleniti amet nesciunt rem aliquid magni ut corporis voluptatem perferendis. Perferendis consectetur est expedita. Maiores, praesentium nam!
        Odio, quaerat, provident perferendis sapiente sed incidunt voluptatibus unde porro enim dolor, velit expedita quam nulla earum voluptate? Voluptatibus unde ipsa aut vel officia, dignissimos aliquid iste modi quaerat iusto.
        Ullam beatae inventore aut illo necessitatibus voluptas quisquam adipisci doloribus sunt, rerum tempora porro possimus perferendis voluptate, tenetur reprehenderit officiis corporis deserunt commodi sapiente officia consequatur delectus voluptatem! Omnis, veniam?
        </div>  
    </div>
    <script src="js/sysadmin.js"></script>
    <script src="<?php  echo $navigation_panel ?>"></script>
</body>
</html>