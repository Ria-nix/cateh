<?php
namespace artemy_helper;
include_once "MySQL.php";

use artemy\MySQL;
use DatabaseConnectionException;
use Exception;
use mysqli;

const DB_MAIN_HOST = "37.140.192.111";
const DB_MAIN_USER = "u1184374_creator";
const DB_MAIN_PASSWORD = "xY8cV0jD2rtB5s";
const DB_MAIN_NAME = "u1184374_main_helpdesk_bd";

/**
 * @return mysqli
 * @throws DatabaseConnectionException
 */
function getMainLink(): mysqli
{
    @$link = mysqli_connect(DB_MAIN_HOST, DB_MAIN_USER, DB_MAIN_PASSWORD, DB_MAIN_NAME);
    if ($link === false) {
        throw new DatabaseConnectionException("Не удалось подключиться к главной базе данных.");
    }
    mysqli_set_charset($link, "utf8");
    return $link;
}

/**
 * @param $DBname
 *
 * @return mysqli
 * @throws DatabaseConnectionException
 */
function getLink($DBname): mysqli
{
    $main_link = getMainLink();
    //поиск DBname в mainDB -> organisations
    $DBconnectId = MySQL::select($main_link, "organisations", "`DBconnect`", "DBname = '$DBname'");
    if ($DBconnectId === false) {
        throw new DatabaseConnectionException("Не удалось найти DBname в главной базе данных.");
    }
    $DBconnectId = (int) $DBconnectId["DBconnect"];


    //поиск данных для подключения к местной БД в DBconnect
    $credentials_for_db = MySQL::select($main_link, "DBconnect", "`host`, `user`, `password`", "id = $DBconnectId");
    if ($credentials_for_db === false) {
        throw new DatabaseConnectionException("Не удалось найти данные для подключения местной БД");
    }
    @$link = mysqli_connect($credentials_for_db["host"], $credentials_for_db["user"], $credentials_for_db["password"], $DBname);
    if ($link === false) {
        throw new DatabaseConnectionException("Не удалось подключиться к главной базе данных.");
    }
	mysqli_set_charset($link, "utf8");
    return $link;
}

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