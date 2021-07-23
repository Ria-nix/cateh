<?php var_dump($_FILES); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>
        <!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
        <form enctype="multipart/form-data" action="new_file.php" method="POST">
            <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
            <input type="hidden" name="MAX_FILE_SIZE" value="6291456"/>
            <!-- Название элемента input определяет имя в массиве $_FILES -->
            Отправить этот файл: <input name="file" type="file"/>
            <input type="submit" value="Отправить файл"/>
        </form>
    </body>
</html>
