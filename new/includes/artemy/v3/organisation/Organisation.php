<?php


namespace v3artemy;

use Exception;
use JetBrains\PhpStorm\Pure;
use v2artemy\OrderInfo;

include_once getRootPath() . "site/includes/artemy/v3/MySql/MySql.php";

class Organisation
{
    private int|null $id;
    private string|null $name;
    private array $addresses;
    private int|null $isActive;
    private int $inn;
    private $creation_password;
    private $token;
    private $chat;
    private $logo;
    private $logo_mime_type;

    const TABLE = "Organisations";

    const ATTRIBUTE_ID = "id";
    const ATTRIBUTE_NAME = "name";
    const ATTRIBUTE_ADDRESSES = "addressJSON";
    const ATTRIBUTE_IS_ACTIVE = "isActive";
    const ATTRIBUTE_INN = "INN";
    const ATTRIBUTE_CREATION_PASSWORD = "creationPassword";
    const ATTRIBUTE_TOKEN = "token";
    const ATTRIBUTE_CHAT = "chatJSON";
    const ATTRIBUTE_LOGO = "logo";
    const ATTRIBUTE_LOGO_MIME_TYPE = "logo_mime_type";

    public function __construct(?int $id, ?string $name, string $addresses, ?int $isActive, int $inn, $creation_password, $token, $chat, $logo, $logo_mime_type)
    {
        $this->id = $id;
        $this->name = $name;
        $this->addresses = json_decode($addresses);
        $this->isActive = $isActive;
        $this->inn = $inn;
        $this->creation_password = $creation_password;
        $this->token = $token;
        $this->chat = $chat;
        $this->logo = $logo;
        $this->logo_mime_type = $logo_mime_type;
    }

    public static function getById($id): bool|Organisation
    {
        /** @var $r - result */
        $r = MySQL::select(self::TABLE, "*", "id = $id");

        if ($r === false) {
            return false;
        }

        return new Organisation($r[self::ATTRIBUTE_ID], $r[self::ATTRIBUTE_NAME], $r[self::ATTRIBUTE_ADDRESSES], $r[self::ATTRIBUTE_IS_ACTIVE], $r[self::ATTRIBUTE_INN], $r[self::ATTRIBUTE_CREATION_PASSWORD], $r[self::ATTRIBUTE_TOKEN], $r[self::ATTRIBUTE_CHAT], $r[self::ATTRIBUTE_LOGO], $r[self::ATTRIBUTE_LOGO_MIME_TYPE]);
    }

    private function set($ATTRIBUTE_, int|string $value)
    {
        $id = $this->getId();
        if (is_int($value) === false) {
            $value = "'$value'";
        }
        Mysql::update(self::TABLE, "$ATTRIBUTE_ = $value", "id = $id");
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getNumberOfMadeOrders(): ?string
    {
        $id = $this->getId();
//        return MySql::count(OrderInfo::TABLE, "FK_AdminSysadmin_id = $id AND status = 1");
        $sql = "SELECT COUNT(Orders.id) FROM Orders LEFT JOIN Users_Customers ON Users_Customers.id = Orders.FK_customer_id WHERE Users_Customers.FK_organisation_ID = {$id} AND Orders.status = 2";

        try {
            $query = mysqli_query(MySql::getMysql(), $sql);
//            var_dump($query);
            if ($query === false) {
                echo mysqli_error(MySql::getMysql());
                return 0;
            }
        } catch (Exception) {
            return 0;
        }

        return intval(mysqli_fetch_all($query)[0][0]);

    }

    public function getNumberOfMadeOrdersForMonth(): ?string
    {
        $id = $this->getId();
//        return MySql::count(OrderInfo::TABLE, "FK_AdminSysadmin_id = $id AND status = 1");
        $sql = "SELECT COUNT(Orders.id) FROM Orders LEFT JOIN Users_Customers ON Users_Customers.id = Orders.FK_customer_id WHERE Users_Customers.FK_organisation_ID = {$id} AND Orders.completed_date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW() AND Orders.status = 2";

        try {
            $query = mysqli_query(MySql::getMysql(), $sql);
//            var_dump($query);
            if ($query === false) {
                echo mysqli_error(MySql::getMysql());
                return 0;
            }
        } catch (Exception) {
            return 0;
        }

        return intval(mysqli_fetch_all($query)[0][0]);

    }

    public function getClientsInfo(): array
    {
        $id = $this->getId();
        $result = MySql::selectAll(Customer::TABLE, "name, surname, phone_number, lastUsedAddress, role", "FK_organisation_ID = $id");

        if ($result === false) {
            return array();
        }

        return $result;
    }

    public function getAddresses(): array
    {
        return $this->addresses;
    }

    public function getIsActive(): ?int
    {
        return $this->isActive;
    }

    public function getInn(): int
    {
        return $this->inn;
    }

    public function getCreationPassword()
    {
        return $this->creation_password;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getChat()
    {
        //TODO: сейчас чат загружается сразу, весит много, но используется редко. Сделать загрузку чата только при использовании этой функции
        return $this->chat;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function getLogoMimeType()
    {
        return $this->logo_mime_type;
    }

    public function getAllOrganisationOrders(): array
    {
        $id = $this->getId();
        $sql = "SELECT Orders.id, Users_Customers.name, Orders.status, CONCAT(Users_AdminsSysadmins.name, ' ', Users_AdminsSysadmins.surname) as name FROM Orders LEFT JOIN Users_Customers ON Users_Customers.id = Orders.FK_customer_id LEFT JOIN Users_AdminsSysadmins ON Users_AdminsSysadmins.id = Orders.FK_AdminSysadmin_id WHERE Users_Customers.FK_organisation_ID = {$id}";
        $query = mysqli_query(\v3artemy\MySql::getMysql(), $sql);

        if ($query === false) {
            echo mysqli_error(\v3artemy\MySql::getMysql());
            return array();
        }

        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (count($result) === 0) {
            return array();
        }

        return $result;
    }

    public function getAddressOrdersInfo(): array
    {
        $sql = "SELECT Organisations.id, Users_Customers.lastUsedAddress, SUM(Orders.status = 2 and Orders.completed_date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()) AS COMPLETED_IN_MONTH, SUM(Orders.status = 1) AS ACTIVE
FROM Orders 
LEFT JOIN Users_Customers ON Users_Customers.id = Orders.FK_customer_id LEFT JOIN Organisations ON Organisations.id = Users_Customers.FK_organisation_ID WHERE Users_Customers.FK_organisation_ID = 144
GROUP BY Users_Customers.lastUsedAddress";

        $query = mysqli_query(\v3artemy\MySql::getMysql(), $sql);

        if ($query === false) {
            echo mysqli_error(\v3artemy\MySql::getMysql());
            return array();
        }

        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (count($result) === 0) {
            return array();
        }

        var_dump($result);
        return $result;
    }
}