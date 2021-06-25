<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/add_organization.css">    
    <link rel="shortcut icon" href="icon/favicon-16x16.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
    <title>Добавление организации</title>
</head>
<body>
    <?php include('navigation.php');?>

    </nav>
    <div class="content_wrap">
        <p class="font_24 bold">Добавление организации</p>
        <div class="content_set">
            <div class="name_organization">
                <label for="name">Название <br> организации</label>
                <input type="text" id="name" class="border">
            </div>
            <div class="name_organization">
                <label for="name">ИНН</label>
                <input type="text" id="name" class="border">
            </div>
            <div class="name_organization">
                <label for="name">Адрес</label>
                <input type="text" id="name" class="border">
                <!-- <span><img src="icon/plus-solid.svg" alt="plus-solid"></span> -->
            </div>
            <div class="img_organization">
                <div class="image border">
                    <img src="icon/logo.png" alt="logo">
                </div>                
                <button class="button_gray border font_16">Загрузить</button>
            </div>
            <div class="save">
                <button class="button border font_16">Добавить</button>
            </div>
        </div>
    </div>









    <script src="js/settings.js"></script>    
</body>
</html>