<?php

namespace v2artemy;

use DatabaseConnectionException;
use mysqli;

/**
 * Class MySql
 *
 * @package artemy
 */
class MySQL
{
    /**
     * Делает выборку одной строки из таблицы.
     *
     * @param        $link
     * @param        $table
     * @param string $select
     * @param string $where в виде "id = 1"
     * @return array|false результат или false в случае неудачи или ненахождения.
     */
    static function select($link, $table, string $select = "*", string $where = ""): false|array
    {
        $where = $where === "" ? "" : "WHERE $where";
        $sql = "SELECT $select FROM $table $where LIMIT 1";
        //        echo "sql: {$sql}\n";
        $query = mysqli_query($link, $sql);
        if ($query === false) {
            echo mysqli_error($link);
            return false;
        }
        $result = array_reduce(mysqli_fetch_all($query, MYSQLI_ASSOC), 'array_merge', array());
        if ($result === false or count($result) === 0) {
            return false;
        }
        if (is_null($result)) {
            return false;
        }
        return $result;
    }

    /**
     * Делает выборку всех строк из таблицы.
     *
     * @param          $link
     * @param          $table
     * @param string $select
     * @param string $where в виде "id = 1"
     * @param int|null $limit
     * @return array|false результат или false в случае неудачи или ненахождения.
     */
    static function selectAll($link, $table, string $select = "*", string $where = "", int $limit = null): false|array
    {
        $where = $where === "" ? "" : "WHERE $where";
        $limit = $limit === null ? "" : "LIMIT $limit";
        $sql = "SELECT $select FROM $table $where $limit";
        $query = mysqli_query($link, $sql);
        if ($query === false) {
            echo mysqli_error($link);
            return false;
        }
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (count($result) === 0) {
            return false;
        }
        return $result;
    }

    /**
     * Вставляет новую строку в таблицу.
     *
     * @param        $link
     * @param        $table
     * @param string $insert в виде Id, role, online
     * @param string $values в виде 1, 0, "yes"
     * @param bool $return_insert_id
     * @param bool $show_errors
     * @return bool|int false в случае неудачи или ненахождения.
     */
    static function insert($link, $table, string $insert, string $values, bool $return_insert_id = false, bool $show_errors = false): bool|int
    {
        $sql = "INSERT INTO $table ($insert) VALUES ($values)";
        $query = mysqli_query($link, $sql);
        if ($query === false) {
            if ($show_errors === true) {
                echo mysqli_error($link);
            }
            return false;
        }
        if ($return_insert_id === true) {
            return mysqli_insert_id($link);
        }
        return true;
    }

    /**
     * Обновляет значения в БД.
     *
     * @param        $link
     * @param        $table
     * @param string $set в виде "Manufacturer = 'Samsung Inc'"
     * @param string $where в виде "id = 1"
     * @param bool $show_errors
     * @return bool false в случае неудачи.
     */
    static function update($link, $table, string $set, string $where = "", bool $show_errors = false): bool
    {
        $where = $where === "" ? "" : "WHERE $where";
        $sql = "UPDATE {$table} SET {$set} {$where}";
        $query = mysqli_query($link, $sql);
        if ($query === false) {
            if ($show_errors === true) {
                echo mysqli_error($link);
            }
            return false;
        }
        return true;
    }

    /**
     * @return mysqli
     * @throws DatabaseConnectionException
     */
    static function getMainLink(): mysqli
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
    static function getLink($DBname): mysqli
    {
        $main_link = getMainLink();
        //поиск DBname в mainDB -> organisations
        $DBconnectId = MySQL::select($main_link, "organisations", "`DBconnect`", "DBname = '$DBname'");
        if ($DBconnectId === false) {
            throw new DatabaseConnectionException("Не удалось найти DBname в главной базе данных.");
        }
        $DBconnectId = (int)$DBconnectId["DBconnect"];


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
}