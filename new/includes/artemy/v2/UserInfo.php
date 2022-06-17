<?php

namespace v2artemy;

use Exception;
use mysqli;
use UserNotFoundException;

include_once "cooler_helpers.php";
include_once "MySQL.php";

/**
 * @deprecated используйте v3/User
 * Class UserInfo
 * @package v2artemy
 */
class UserInfo
{
    const SEARCH_IN_TABLE_CUSTOMER = "Users_Customers";
    const SEARCH_IN_TABLE_ADMIN = "Users_AdminsSysadmins";
    const SEARCH_IN_TABLE_ALL = array("Users_AdminsSysadmins", "Users_Customers");

    const ACCESS_LEVEL_CUSTOMER = 1;
    const ACCESS_LEVEL_SUPER_CUSTOMER = 2;
    const ACCESS_LEVEL_SYS_ADMIN = 3;
    const ACCESS_LEVEL_ADMIN = 4;
    const ACCESS_LEVEL_SUPER_ADMIN = 5;

    protected mysqli $link;
    public string|false $foundInTable = false;
    private string $token;
    private array $result;
    private string|array $SEARCH_IN_TABLE;

    //    public static function addNewUser($link, $ACCESS_LEVEL = self::ACCESS_LEVEL_CUSTOMER)
    //    {
    //        switch ($ACCESS_LEVEL) {
    //            case self::ACCESS_LEVEL_CUSTOMER:
    //                $table = self::SEARCH_IN_TABLE_CUSTOMER;
    //                $role = 0;
    //                break;
    //            case self::ACCESS_LEVEL_SUPER_CUSTOMER:
    //                $table = self::SEARCH_IN_TABLE_CUSTOMER;
    //                $role = 1;
    //                break;
    //            case self::ACCESS_LEVEL_SYS_ADMIN:
    //                $table = self::SEARCH_IN_TABLE_ADMIN;
    //                $role = 0;
    //                break;
    //            case self::ACCESS_LEVEL_ADMIN:
    //                $table = self::SEARCH_IN_TABLE_ADMIN;
    //                $role = 1;
    //                break;
    //            case self::ACCESS_LEVEL_SUPER_ADMIN:
    //                $table = self::SEARCH_IN_TABLE_ADMIN;
    //                $role = 2;
    //                break;
    //
    //            default:
    //                die("неверный урвень доступа");
    //        }
    //        MySql::insert($link, $table, "name", "'name'");
    //    }

    /**
     * UserInfo конструктор. Используйте fetch() перед использованием вложенных функций.
     *
     * @param          $link
     * @param string $token
     * @param string[] $SEARCH_IN_TABLE
     */
    public function __construct($link, string $token, string|array $SEARCH_IN_TABLE = self::SEARCH_IN_TABLE_ALL)
    {
        $this->link = $link;
        $this->token = $token;
        $this->SEARCH_IN_TABLE = $SEARCH_IN_TABLE;
    }


    /**
     * @throws UserNotFoundException
     */
    public function fetch()
    {
        $this->result = match ($this->SEARCH_IN_TABLE) {
            self::SEARCH_IN_TABLE_CUSTOMER => $this->findUserInCustomerTable(),
            self::SEARCH_IN_TABLE_ADMIN => $this->findUserInAdminTable(),
            self::SEARCH_IN_TABLE_ALL => $this->findUserInAllTables(),
        };
    }

    /**
     * @throws UserNotFoundException
     */
    private function findUserInCustomerTable(): array|bool
    {
        $this->foundInTable = self::SEARCH_IN_TABLE_CUSTOMER;
        $result = MySQL::select($this->link, self::SEARCH_IN_TABLE_CUSTOMER, "*", "token = '$this->token'");
        if (is_bool($result)) {
            throw new UserNotFoundException("Пользователь не найден");
        }
        return $result + ["DBname" => "Users_Customers"];
    }

    /**
     * @throws UserNotFoundException
     */
    private function findUserInAdminTable(): array|bool
    {
        $this->foundInTable = self::SEARCH_IN_TABLE_ADMIN;
        $result = MySQL::select($this->link, self::SEARCH_IN_TABLE_ADMIN, "*", "token = '$this->token'");
        if (is_bool($result)) {
            throw new UserNotFoundException("Пользователь не найден");
        }
        return $result + ["DBname" => "Users_AdminsSysadmins"];
    }

    /**
     * @throws UserNotFoundException
     */
    private function findUserInAllTables(): bool|array
    {
        $result = $this->findUserInAdminTable();
        if ($result !== false) {
            $this->foundInTable = self::SEARCH_IN_TABLE_ADMIN;
            return $result;
        }

        $result = $this->findUserInCustomerTable();
        if ($result !== false) {
            $this->foundInTable = self::SEARCH_IN_TABLE_CUSTOMER;
            return $result;
        }

        return false;
    }

    public function get(): array|false
    {
        return $this->result;
    }

    /**
     * @throws Exception
     */
    function checkAccess($ACCESS_LEVEL): bool
    {
        $user_level = self::ACCESS_LEVEL_CUSTOMER;
        if ($this->foundInTable === false) {
            throw new Exception("access denied");
        }

        //        echo $this->foundInTable . $this->get()["role"];
        if ($this->foundInTable === self::SEARCH_IN_TABLE_ADMIN) {
            if ($this->get()["role"] === "2") {
                $user_level = self::ACCESS_LEVEL_SUPER_ADMIN;
            } else if ($this->get()["role"] === "1") {
                $user_level = self::ACCESS_LEVEL_ADMIN;
            } else if ($this->get()["role"] === "0") {
                $user_level = self::ACCESS_LEVEL_SYS_ADMIN;
            }
        } else if ($this->foundInTable === self::SEARCH_IN_TABLE_CUSTOMER) {
            if ($this->get()["role"] === "1") {
                $user_level = self::ACCESS_LEVEL_SUPER_CUSTOMER;
            }
        }
        return $user_level >= $ACCESS_LEVEL;
    }
    //GETTERS
    //
    //
    public function getId(): int
    {
        return (int)$this->result["id"];
    }

    public function getName()
    {
        return $this->result["name"];
    }

    public function getSurname()
    {
        return $this->result["surname"];
    }

    public function getEmail()
    {
        return $this->result["email"];
    }

    public function getPassword()
    {
        return $this->result["password"];
    }

    public function getCategories()
    {
        return json_decode($this->result["categoriesJSON"]);
    }

    public function getPhone()
    {
        return $this->result["phone_number"];
    }

    public function getEmailRestoreCode()
    {
        return $this->result["emailCode"];
    }

    public function getToken()
    {
        return $this->result["token"];
    }

    public function getOrganisationId(): int
    {
        return (int)$this->result["FK_organisation_ID"];
    }

    public function getAddress()
    {
        return $this->result["lastUsedAddress"];
    }

    public function getDatabase()
    {
        return $this->result["Users_AdminsSysadmins"];
    }

    /**
     * Возвращает все заказы !СИСАДМИНА! или false в случае отсутствия.
     *
     * @return false|array
     */
    public function getOrders(): false|array
    {
        $id = $this->getId();
        return MySQL::selectAll($this->link, "Orders", "*", "FK_AdminSysadmin_id = $id");
    }
    //SETTERS
    //
    //
    public function setName(string $value)
    {
        $id = $this->getId();
        MySQL::update($this->link, $this->foundInTable, "name = '$value'", "id = $id");
    }

    public function setSurname(string $value)
    {
        $id = $this->getId();
        MySQL::update($this->link, $this->foundInTable, "surname = '$value'", "id = $id");
    }

    public function setEmail(string $value)
    {
        $id = $this->getId();
        MySQL::update($this->link, $this->foundInTable, "email = '$value'", "id = $id");
    }

    public function setPassword(string $value)
    {
        $id = $this->getId();
        MySQL::update($this->link, $this->foundInTable, "password = '$value'", "id = $id");
    }

    public function setCategories(array $value)
    {
        $id = $this->getId();
        $value = json_encode($value);
        MySQL::update($this->link, $this->foundInTable, "categoriesJSON = '$value'", "id = $id");
    }

    public function setPhone(string $value)
    {
        $id = $this->getId();
        MySQL::update($this->link, $this->foundInTable, "phone_number = '$value'", "id = $id");
    }

    public function setToken(string $value)
    {
        $id = $this->getId();
        MySQL::update($this->link, $this->foundInTable, "token = '$value'", "id = $id");
    }

    /**
     * Преобразовывает в систему записи ролей в базе данных.
     * Использовать вместе с UserInfo::getDatabaseTable(int $ACCESS_LEVEL);
     *
     * @throws Exception
     */
    public static function getDatabaseRole(int $ACCESS_LEVEL): int
    {
        return match ($ACCESS_LEVEL) {
            self::ACCESS_LEVEL_SYS_ADMIN, self::ACCESS_LEVEL_CUSTOMER => 0,
            self::ACCESS_LEVEL_ADMIN, self::ACCESS_LEVEL_SUPER_CUSTOMER => 1,
            self::ACCESS_LEVEL_SUPER_ADMIN => 2,
            default => throw new Exception("WRONG CATEGORY"),
        };
    }

    /**
     * @throws Exception
     */
    public static function getDatabaseTable(int $ACCESS_LEVEL): string
    {
        return match ($ACCESS_LEVEL) {
            self::ACCESS_LEVEL_CUSTOMER, self::ACCESS_LEVEL_SUPER_CUSTOMER => self::SEARCH_IN_TABLE_CUSTOMER,
            self::ACCESS_LEVEL_SYS_ADMIN, self::ACCESS_LEVEL_ADMIN, self::ACCESS_LEVEL_SUPER_ADMIN => self::SEARCH_IN_TABLE_ADMIN,
            default => throw new Exception("WRONG CATEGORY"),
        };
    }
}

//$link = \artemy_helper\getLink("u1184374_hepdesk_2_0");
//UserInfo::addNewUser($link, 1);