<?php

function getHost(): string
{
    return "37.140.192.111";
}

function getUser(): string
{
    return "u1184374_creator";
}

function getPassword(): string
{
    return "xY8cV0jD2rtB5s";
}

function getMainDBName(): string
{
    return "u1184374_main_helpdesk_bd";
}

function getMainLink(): bool|mysqli
{
    $link = mysqli_connect(getHost(), getUser(), getPassword(), getMainDBName())
    or die("текст в случае отсутствия подключения в БД");
    mysqli_set_charset($link, "utf8");
    return $link;
}

function getLink(): bool|mysqli
{
    if (!empty($_POST["DBname"])){
        $DBname = $_POST["DBname"];
        if (in_array($DBname, getAllOrganisationsDB())) {
            $mysqliDBconnectID = mysqli_query(getMainLink(), "SELECT DBconnect FROM " . getMainDBName() . ".organisations WHERE DBname = '$DBname'");
            $DBconnectID = mysqli_fetch_assoc($mysqliDBconnectID)["DBconnect"];
            $result = mysqli_fetch_assoc(mysqli_query(getMainLink(), "SELECT * FROM " . getMainDBName() . ".DBconnect WHERE id = '$DBconnectID'"));
            $link = mysqli_connect($result["host"], $result["user"], $result["password"], $DBname)
            or header('Location: index.php');
            mysqli_set_charset($link, "utf8");
            return $link;
        } else {
//            delAllCookies();
            return false;
        }
    } else {
        return false;
    }
}



function getUserTableNames(): array
{
    return array("Users_AdminsSysadmins", "Users_Customers");
}

function getAllOrganisationsDB(): array
{
    ///поиск с помощью главной таблицы
    $link = getMainLink();
    $result = mysqli_fetch_all(mysqli_query($link, "SELECT * FROM " . getMainDBName() . ".organisations"), MYSQLI_NUM);
    $arrayDbNames = array();
    foreach ($result as $arrayOfArrayNamesDB) {
        array_push($arrayDbNames, $arrayOfArrayNamesDB[1]);
    }
    return $arrayDbNames;
}

//FUNCTIONS
function findUserByEmailPassword(string $emailClient, string $passwordClient): array|string
{
    $link = getMainLink();
    foreach (getAllOrganisationsDB() as $organisationDB) {
        foreach (getUserTableNames() as $userTableName) {
            $result = mysqli_query($link, "SELECT * FROM " . $organisationDB . "." . $userTableName . " WHERE " . $userTableName . ".email = '$emailClient' AND $userTableName.password = '$passwordClient' AND $userTableName.isActive = '1'");
            foreach ($result as $user) {
//                return array("token" => $user["token"],
//                    "DBname" => $organisationDB);
                return $user + ["DBname" => $organisationDB, "tableName" => $userTableName];
            }
        }
    }
    return "not-found";
}


function findUserByToken(string $organisationDB, string $tokenClient): array|string|null
{
    $link = getLink() ?? die("not-found");
    if ($link === false) {
        return "not-found";
    }
    foreach (getUserTableNames() as $userTableName) {
        $result = mysqli_query($link, "SELECT * FROM " . $organisationDB . "." . $userTableName . " WHERE " . $userTableName . ".token = '$tokenClient' AND $userTableName.isActive = '1'");
        foreach ($result as $user) {
            return $user;
        }
    }
    return "not-found";

}


function isUserExists(string $emailClient): string
{
    $link = getMainLink();
    foreach (getAllOrganisationsDB() as $organisationDB) {
        foreach (getUserTableNames() as $userTableName) {
            $result = mysqli_query($link, "SELECT * FROM " . $organisationDB . "." . $userTableName . " WHERE " . $userTableName . ".email = '$emailClient'");
            foreach ($result as $user) {
                return "exists";
            }
        }
    }
    return "not-exists";
}

///ORGANISATIONS///
//var_dump(findOrganisationByINN("111111111111"));
function findOrganisationByINN(string $innClient): array|string
{
    $link = getMainLink();
    foreach (getAllOrganisationsDB() as $organisationDB) {
        $result = mysqli_query($link, "SELECT * FROM " . $organisationDB . ".Organisations  
        WHERE " . "$organisationDB" . ".Organisations.INN" . " = '$innClient' AND " . "$organisationDB" . ".Organisations.isActive" . " = '1'");
        foreach ($result as $org) {
            return array("token" => $org["token"], "DBname" => $organisationDB, "creationPassword" => $org["creationPassword"]);
        }
    }
    return "not-exists";
}


function getOrganisationByToken(string $token): array|string
{
    $link = getLink() ?? die("not-exists");
    if ($link === false){
        return false;
    }
    foreach (getAllOrganisationsDB() as $organisationDB) {
        $result = mysqli_query($link, "SELECT * FROM " . "$organisationDB" . ".Organisations WHERE token = '$token' AND isActive = '1'");
        foreach ($result as $user) {
            return $user + ["DBname" => $organisationDB];
        }
    }
    return "not-exists";
}

function isOrganisationExistsByDBname(string $DBname): string
{
    $link = getLink() ?? die("not-exists");
    foreach (getAllOrganisationsDB() as $organisationDB) {
        $result = mysqli_fetch_all(mysqli_query($link, "SELECT * FROM u1184374_main_helpdesk_bd.organisations WHERE DBname = '$DBname'"), MYSQLI_NUM);
        foreach ($result as $user) {
            return "exists";
        }
    }
    return "not-exists";
}


///TOKEN///
function generateToken(int $numOfTries = 5): string
{
    if ($numOfTries > 0) {
        try {
            return bin2hex(random_bytes(50));
        } catch (Exception) {
            return generateToken($numOfTries - 1);
        }
    } else {
        return md5(microtime()) . md5(microtime()) . md5(microtime());
    }
}

///COOKIE///
function setCookieForever(string $name, string $cookie)
{
    setcookie($name, $cookie, time() + 60 * 60 * 24 * 365 * 10, '/', '', true, true);
}

function setCookieForSession(string $name, string $cookie)
{
    setcookie($name, $cookie, 0, '/', '', true, true);
}

function setCookieForHour(string $name, string $cookie)
{
    setcookie($name, $cookie, time() + 60 * 60, '/', '', true, true);
}

function delCookie(string $name)
{
    setcookie($name, null, -1, '/', '', true, true);
}

function delAllCookies(): bool
{
    setcookie("token", null, -1, '/', '', true, true);
    setcookie("DBname", null, -1, '/', '', true, true);
    setcookie("organisation_token", null, -1, '/', '', true, true);

    return true;
}