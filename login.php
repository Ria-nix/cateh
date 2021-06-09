<?php
if (!empty($_POST["email_OR_inn"]) and !empty($_POST["password"])) {
    include "helper.php";

    $emailOrinnClient = $_POST['email_OR_inn'];
    $passwordClient = $_POST['password'];

    $isINN = preg_match("/^\d{12}$/", $emailOrinnClient);

    if ($isINN) {
        //если это оказался ИНН
        $innClient = $emailOrinnClient;

        //проверка на существующий ИНН
        $result = findOrganisationByINN($innClient);
        if ($result === "not-exists") {
            //не найден
//            echo "<h4>Неправильный ИНН!</h4>";
            //header('Location: htmls/login.html');
            echo json_encode(["action" => "error-Wrong-Credentials"]);
        } else {
            if ($result['creationPassword'] === $passwordClient) {
                //страница регистрации нового пользователя
//                setCookieForSession("organisation_token", $result["token"]);
//                setCookieForSession("DBname", $result["DBname"]);
//                header('Location: htmls/registerCustomer.html');
                echo json_encode(["action" => "success",
                                  "organisationToken" => $result["token"],
                                  "DBname" => $result["DBname"],
                    ]);
                $GLOBALS["DBname"] = $result["DBname"];

            } else {
//                echo "неправильный пароль создания";
                echo json_encode(["action" => "error-Wrong-Credentials"]);
            }
            //header('Location: userInfo.php');
        }

    } else {
        //если это не оказался ИНН
        $emailClient = $emailOrinnClient;
        $result = findUserByEmailPassword($emailClient, $passwordClient);
        if ($result === "not-found") {
//            echo "<h4>Неправильный логин или пароль!</h4>";
//            delAllCookies();
//            header('Location: htmls/login.html');
            echo json_encode(["action" => "error-Wrong-Credentials"]);
        } else {
//            echo "<h4>Вход по логину и паролю</h4>";
//            setCookieForever('token', $result["token"]);
//            setCookieForever('DBname', $result["DBname"]);
//            header('Location: userInfo.php');
            $role = "errorRole";

            //определение супер роли пользователя по таблице и роли в таблице
            $role = match ($result["tableName"]) {
                "Users_AdminsSysadmins" => match ($result["role"]) {
                    "0" => "sysadmin",
                    "1" => "admin",
                },
                "Users_Customers" => match ($result["role"]) {
                    "0" => "customer",
                    "1" => "supercustomer",
                },
            };
            echo json_encode(
                [
                    "action" => "success",
                    "role" => $role,
                    "name" => $result["name"],
                    "surname" => $result["surname"],
                    "token" => $result["token"],
                    "DBname" => $result["DBname"],
                ]
            );
            $GLOBALS["DBname"] = $result["DBname"];
        }
    }

} elseif (!empty($_POST["token"]) and !empty($_POST["DBname"])) {

    include "helper.php";

    $organisationDBname = $_POST["DBname"];
    $tokenClient = $_POST['token'];

    $result = findUserByToken($organisationDBname, $tokenClient);
    if ($result === "not-found") {
//        delAllCookies();
//        header('Location: htmls/login.html');
        echo json_encode(["action" => "error-Token-Not-Found"]);
    } else {
//        header('Location: userInfo.php');
        echo json_encode(["action" => "success"]);
    }

} else {
//    header('Location: htmls/login.html');

    echo json_encode(["action" => "error-Wrong-Parameters"]);
}