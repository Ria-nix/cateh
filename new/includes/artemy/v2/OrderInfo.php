<?php
namespace v2artemy;
include_once getRootPath() . "site/includes/artemy/v2/cooler_helpers.php";
include_once "Exceptions/OrderNotFoundException.php";

use MaxNoteNumberException;
use mysqli;
use OrderNotFoundException;

class OrderInfo
{
    const TABLE = "Orders";

    const STATUS_NOT_ACCEPTED = 0;
    const STATUS_ACCEPTED = 1;
    const STATUS_COMPLETED = 2;
    const STATUS_DELETED = 3;
    const STATUS_WAITING = 4;

    private mysqli $link;
    private int $order_id;
    private array $result;

    /**
     * OrderInfo конструктор. Используйте fetch() перед использованием вложенных функций.
     *
     * @param $link
     * @param $order_id
     */
    public function __construct($link, $order_id)
    {
        $this->link = $link;
        $this->order_id = $order_id;
    }

    /**
     * @throws OrderNotFoundException
     */
    public function fetch()
    {
        $this->result = MySQL::select($this->link, "Orders", "*", "id = $this->order_id");
        var_dump($this->result);
        if ($this->result === false) {
            throw new OrderNotFoundException("Заказ не найден.");
        }
    }

    ///GETTERS
    public function getId()
    {
        return $this->result["id"];
    }

		public function getCustomerId() {
			return $this->result["FK_customer_id"];
		}

		public function getSysadminId() {
			return $this->result["FK_AdminSysadmin_id"];
		}

		public function getCategory() : int {
			return (int) $this->result["FK_categories_id"];
		}

		public function getDescription() {
			return $this->result["description"];
		}

		public function getStatus() : int {
			return (int) $this->result["status"];
		}

		public function getNotes() {
			return json_decode($this->result["added_notesJSON"]);
		}


		///SETTERS
		public function setCustomerId(int $value) {
			$id = $this->getId();
			MySQL::update($this->link, "Orders", "FK_customer_id = $value", "id = $id");
		}

		public function setSysadminId(int $value) {
			$id = $this->getId();
			MySQL::update($this->link, "Orders", "FK_AdminSysadmin_id = $value", "id = $id");
		}

		public function setCategory(int $value) {
			$id = $this->getId();
			MySQL::update($this->link, "Orders", "FK_categories_id = $value", "id = $id");
		}

		public function setDescription(string $value) {
			$id = $this->getId();
			MySQL::update($this->link, "Orders", "description = '$value'", "id = $id");
		}

		public function setStatus(int $value) {
			$id = $this->getId();
			MySQL::update($this->link, "Orders", "status = $value", "id = $id");
		}

		/**
		 * @throws MaxNoteNumberException
		 */
		public function addNote(string $value) {
            $notes = $this->getNotes();
            if (empty($notes)) {
                $notes = array();
            }
            if (count($notes) >= 5) {
                throw new MaxNoteNumberException("Максимальное количество заметок");
            }
            array_push($notes, ["text" => $value, "date" => date("Y-W-d G:i:s") . ".000000"]);
            $notes = json_encode($notes);
            $id = $this->getId();
            MySQL::update($this->link, "Orders", "added_notesJSON = '$notes'", "id = $id");
        }

    public static function addNewOrder($link, int $customer_id, string $description, int $status = 1, int $sysadmin_id = null)
    {
        if (is_null($sysadmin_id)) {
            $sysadmin_id = "NULL";
        }
        MySQL::insert($link, "Orders", "FK_customer_id, description, status, creator_table_name, creator_id, FK_AdminSysadmin_id", "$customer_id, '$description', $status, 'потом надо добавить', 'потом надо добавить', $sysadmin_id");
    }
}