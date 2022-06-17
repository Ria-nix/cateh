<?php
http_response_code(404);
?>
<!doctype html>
<html lang="ru">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel='shortcut icon' type='image/x-icon' href='/site/includes/dasha/icons/favicon-16x16.png'/>
    <link rel="stylesheet" href="site/pages/404/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
<p id="header">Ошибка 404</p>
<p id="description">"Страница не найдена"</p>
<?php
if ($GLOBALS["DEVELOPMENT_MODE"] === true) {
    echo "<script src='site/pages/404/script.js'></script>";
}
?>
</body>
</html>