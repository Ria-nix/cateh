<?php

namespace v3artemy;

use Exception;
use mysqli;

class MySql
{
    private const HOSTNAME = "37.140.192.111";
    private const USERNAME = "u1184374_creator";
    private const PASSWORD = "xY8cV0jD2rtB5s";
    private const DATABASE = "u1184374_main_helpdesk_bd";
    private static string $lastUsedDBname = "u1184374_main_helpdesk_bd";

    /**
     * @param string $lastUsedDBname
     */
    public static function setLastUsedDBname(string $lastUsedDBname): void
    {
        self::$lastUsedDBname = $lastUsedDBname;
    }

    private static mysqli $mysqli;

    /**
     * @throws Exception
     */
    public static function getMysql(string $DBname = null): mysqli
    {
        if ($DBname !== null) {
            self::$lastUsedDBname = $DBname;
        }
        if (isset(self::$mysqli)) {
            return self::$mysqli;
        }
//var_dump($DBname);
        $mysqli = mysqli_connect(self::HOSTNAME, self::USERNAME, self::PASSWORD, self::$lastUsedDBname);
        if ($mysqli === false or $mysqli === null) {
            throw new Exception("Не удалось подключиться к БД");
        }
        mysqli_set_charset($mysqli, "utf8");
        self::$mysqli = $mysqli;
        return self::$mysqli;
    }

    /**
     * @throws Exception
     */
    public static function getMainMysql(): mysqli
    {
        return self::getMysql(self::DATABASE);
    }

    /**
     * Делает выборку одной строки из таблицы.
     *
     * @param        $table
     * @param string $select
     * @param string $where в виде "id = 1"
     * @return array|false результат или false в случае неудачи или ненахождения.
     */
    static function select($table, string $select = "*", string $where = ""): array|false
    {
        $where = $where === "" ? "" : "WHERE $where";
        $sql = "SELECT {$select} FROM {$table} {$where} LIMIT 1";

        try {
            $query = mysqli_query(self::getMysql(), $sql);
            if ($query === false) {
                echo mysqli_error(self::getMysql());
                return false;
            }
        } catch (Exception) {
            return false;
        }

        $result = array_reduce(mysqli_fetch_all($query, MYSQLI_ASSOC), 'array_merge', array());
        if ($result === false) {
            return false;
        }
        if (count($result) === 0 or is_null($result)) {
            return false;
        }
        return $result;
    }

    /**
     * Вставляет новую строку в таблицу.
     *
     * @param        $table
     * @param string $insert в виде Id, role, online
     * @param string $values в виде 1, 0, "yes"
     * @return bool|int id созданной строки или false в случае неудачи или ненахождения.
     */
    static function insert($table, string $insert, string $values): false|int
    {
        $sql = "INSERT INTO {$table} ({$insert}) VALUES ({$values})";
        try {
            $query = mysqli_query(self::getMysql(), $sql);
            if ($query === false) {
                echo mysqli_error(self::getMysql());
                return false;
            }
            return mysqli_insert_id(self::getMysql());
        } catch (Exception) {
            return false;
        }
    }

    /**
     * Обновляет значения в БД.
     *
     * @param        $table
     * @param string $set в виде "Manufacturer = 'Samsung Inc'"
     * @param string $where в виде "id = 1"
     * @return bool false в случае неудачи.
     */
    static function update($table, string $set, string $where = ""): bool
    {
        $where = $where === "" ? "" : "WHERE $where";
        $sql = "UPDATE {$table} SET {$set} {$where}";
        try {
            $query = mysqli_query(self::getMysql(), $sql);
            if ($query === false) {
                echo $sql;
                echo mysqli_error(self::getMysql());
                return false;
            }
        } catch (Exception) {
            return false;
        }
        return true;
    }

    /**
     * Делает выборку всех строк из таблицы.
     *
     * @param          $table
     * @param string $select
     * @param string $where в виде "id = 1"
     * @param int|null $limit
     * @return array|false результат или false в случае неудачи или ненахождения.
     */
    static function selectAll($table, string $select = "*", string $where = "", int $limit = null): array|false
    {
        $where = $where === "" ? "" : "WHERE $where";
        $limit = $limit === null ? "" : "LIMIT $limit";
        $sql = "SELECT {$select} FROM {$table} {$where} {$limit}";
        try {
            $query = mysqli_query(self::getMysql(), $sql);
//            var_dump($query);
            if ($query === false) {
                echo mysqli_error(self::getMysql());
                return false;
            }
        } catch (Exception) {
            return false;
        }
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (count($result) === 0) {
            return false;
        }
        return $result;
    }

    static function count($table, string $where = "", string $what_to_count = "id", int $limit = null): int
    {
        $where = $where === "" ? "" : "WHERE $where";
        $limit = $limit === null ? "" : "LIMIT $limit";
        $sql = "SELECT COUNT({$what_to_count}) FROM {$table} {$where} {$limit}";

        try {
            $query = mysqli_query(self::getMysql(), $sql);
//            var_dump($query);
            if ($query === false) {
                echo mysqli_error(self::getMysql());
                return 0;
            }
        } catch (Exception) {
            return 0;
        }

        return intval(mysqli_fetch_all($query)[0][0]);
    }

    static function parseMySqlDateToPHP($mysql_date): bool|int
    {
        return strtotime($mysql_date);
    }

    static function parsePHPDateToMysql($php_date): string
    {
        return date('Y-m-d H:i:s', $php_date);
    }
}