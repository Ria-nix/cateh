<?php


namespace artemy;

include_once "cooler_helpers.php";

/**
 * Class MySQL
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
		$sql   = "SELECT $select FROM $table $where LIMIT 1";
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
	 * @param string   $select
	 * @param string   $where в виде "id = 1"
	 * @param int|null $limit
	 * @return array|false результат или false в случае неудачи или ненахождения.
	 */
	static function selectAll($link, $table, string $select = "*", string $where = "", int $limit = null): false|array
	{
		$where = $where === "" ? "" : "WHERE $where";
		$limit = $limit === null ? "" : "LIMIT $limit";
		$sql   = "SELECT $select FROM $table $where $limit";
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
	 * @return bool false в случае неудачи или ненахождения.
	 */
	static function insert($link, $table, string $insert, string $values, $return_insert_id = false): bool|int
	{
		$sql   = "INSERT INTO $table ($insert) VALUES ($values)";
		$query = mysqli_query($link, $sql);
		if ($query === false) {
			echo mysqli_error($link);
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
	 * @param string $set   в виде "Manufacturer = 'Samsung Inc'"
	 * @param string $where в виде "id = 1"
	 * @return bool false в случае неудачи.
	 */
	static function update($link, $table, string $set, string $where = ""): bool
	{
		$where = $where === "" ? "" : "WHERE $where";
		$sql   = "UPDATE $table SET $set $where";
		$query = mysqli_query($link, $sql);
		if ($query === false) {
			echo mysqli_error($link);
			return false;
		}
		return true;
	}
}

//	$link = \artemy_helper\getLink("u1184374_hepdesk_2_0");
//	$result = MySQL::selectAll($link, "Users_Customers", "id, name, surname, phone_number, lastUsedAddress");
//	var_dump($result);