<?php


namespace v3artemy;

use JetBrains\PhpStorm\Pure;
use v2artemy\CategoriesInfo;
use v2artemy\OrderInfo;

include_once getRootPath() . "site/includes/artemy/v3/MySql/MySql.php";
include_once getRootPath() . "site/includes/artemy/v3/user/Customer.php";
include_once getRootPath() . "site/includes/artemy/v2/OrderInfo.php";
include_once getRootPath() . "site/includes/artemy/v3/organisation/Organisation.php";

class Sysadmin
{
    private int|null $id;
    private int|null $role;
    private int|null $isActive;
    private string|null $name;
    private string|null $surname;
    private string|null $email;
    private string|null $password;
    private array|null $categories;
    private string|null $phone_number;
    private int|null $email_code;
    private string|null $token;
    private string|null $logo;
    private string|null $logo_mime_type;

    const TABLE = "Users_AdminsSysadmins";

    const ATTRIBUTE_ID = "id";
    const ATTRIBUTE_ROLE = "role";
    const ATTRIBUTE_IS_ACTIVE = "isActive";
    const ATTRIBUTE_NAME = "name";
    const ATTRIBUTE_SURNAME = "surname";
    const ATTRIBUTE_EMAIL = "email";
    const ATTRIBUTE_PASSWORD = "password";
    const ATTRIBUTE_CATEGORIES_JSON = "categoriesJSON";
    const ATTRIBUTE_PHONE_NUMBER = "phone_number";
    const ATTRIBUTE_EMAIL_CODE = "emailCode";
    const ATTRIBUTE_TOKEN = "token";
    const ATTRIBUTE_LOGO = "logo";
    const ATTRIBUTE_LOGO_MIME_TYPE = "logo_mime_type";

    private function __construct($id, $role, $isActive, $name, $surname, $email, $password, $categories, $phone_number, $email_code, $token, $logo, $logo_mime_type)
    {
        $this->id = $id;
        $this->role = $role;
        $this->isActive = $isActive;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->categories = $categories;
        $this->phone_number = $phone_number;
        $this->email_code = $email_code;
        $this->token = $token;
        $this->logo = $logo;
        $this->logo_mime_type = $logo_mime_type;
    }

    private function set($ATTRIBUTE_, int|string $value) {
        $id = $this->getId();
        if (is_int($value) === false) {
            $value = "'$value'";
        }

        Mysql::update(self::TABLE, "$ATTRIBUTE_ = $value", "id = $id");
    }

    const ACCESS_LEVEL_SYS_ADMIN = 3;
    const ACCESS_LEVEL_ADMIN = 4;
    const ACCESS_LEVEL_SUPER_ADMIN = 5;
    #[Pure] public function getAccessLevel(): int
    {
        if ($this->getRole() === 2) {
            return self::ACCESS_LEVEL_SUPER_ADMIN;
        }

        if ($this->getRole() === 1) {
            return self::ACCESS_LEVEL_ADMIN;
        }

        return self::ACCESS_LEVEL_SYS_ADMIN;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getRole(): int
    {
        return $this->role;
    }

    public function getTextRole(): string
    {
        return match ($this->role) {
            0 => "Системный администратор",
            1 => "Администратор",
            2 => "Супер администратор",
            default => "Неизвестная роль",
        };
    }

    public function setRole(int $value): void
    {
        $this->set(self::ATTRIBUTE_ROLE, $value);
    }


    public function getIsActive(): int
    {
        return $this->isActive;
    }

    public function setIsActive(int $value): void
    {
        $this->set(self::ATTRIBUTE_IS_ACTIVE, $value);
    }

    public function getName(): string
    {
        return $this->name === null ? "" : $this->name;
    }

    public function setName(string $value): void
    {
        $this->set(self::ATTRIBUTE_NAME, $value);
    }

    public function getSurname(): string
    {
        return $this->surname === null ? "" : $this->surname;
    }

    public function setSurname(string $value): void
    {
        $this->set(self::ATTRIBUTE_SURNAME, $value);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $value): void
    {
        $this->set(self::ATTRIBUTE_EMAIL, $value);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $value): void
    {
        $this->set(self::ATTRIBUTE_PASSWORD, $value);
    }

    public function getCategories(): array
    {
        include_once getRootPath() . "site/includes/artemy/v2/CategoriesInfo.php";

        if (empty($this->categories)) {
            return array();
        }

        $where = "";
        foreach ($this->categories as $category) {
            if (gettype($category) === "string" or gettype($category) === "integer") {
                if ($where === "") {
                    $where = "`id` = $category";
                } else {
                    $where = $where . " or `id` =  $category";
                }
            }
        }

        $result = MySql::selectAll(CategoriesInfo::TABLE, "*", "$where");

        if (empty($result)) {
            return array();
        }
        return $result;
    }

    public function getNumberOfMadeOrdersForMonth(): int
    {
        $id = $this->getId();
        return MySql::count(OrderInfo::TABLE, "FK_AdminSysadmin_id = $id AND status = 2 AND completed_date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()");
    }

    public function getNumberOfMadeOrders(): int
    {
        $id = $this->getId();
        return MySql::count(OrderInfo::TABLE, "FK_AdminSysadmin_id = $id AND status = 2");
    }

    public function getNumberOfActiveOrders(): int
    {
        $id = $this->getId();
        return MySql::count(OrderInfo::TABLE, "FK_AdminSysadmin_id = $id AND status = 1");
    }

    public function setCategories(array $value): void
    {
        $value = json_encode($value);
        $this->set(self::ATTRIBUTE_CATEGORIES_JSON, $value);
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number === null ? "" : $this->phone_number;
    }

    public function getContactedOrganisations(): array
    {
        $id = $this->getId();
        $sql = "SELECT Organisations.id as ORGANISATION_ID, Organisations.name as ORGANISATION_NAME, SUM(Orders.status = 2 and Orders.completed_date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()) as COMPLETED_IN_MONTH, SUM(Orders.status = 1) as ACTIVE FROM Orders LEFT JOIN Users_Customers ON Orders.FK_customer_id = Users_Customers.id LEFT JOIN Organisations ON Users_Customers.FK_organisation_ID = Organisations.id WHERE Orders.FK_AdminSysadmin_id = $id GROUP BY Organisations.id";
        $link = MySql::getMysql();
        $result = mysqli_fetch_all(mysqli_query($link, $sql), MYSQLI_ASSOC);
//        var_dump($result);
        return $result;
    }

    public function setPhoneNumber(string $value): void
    {
        $this->set(self::ATTRIBUTE_PHONE_NUMBER, $value);
    }


    public function getEmailCode(): int
    {
        return $this->email_code;
    }

    public function setEmailCode(int $value): void
    {
        $this->set(self::ATTRIBUTE_EMAIL_CODE, $value);
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $value): void
    {
        $this->set(self::ATTRIBUTE_TOKEN, $value);
    }

    public function getLogo(): string|null
    {
        return empty($this->logo) ? null : $this->logo;
    }

    public function setLogo(string $value): void
    {
        $this->set(self::ATTRIBUTE_LOGO, $value);
    }

    public function getLogoMimeType(): string|null
    {
        return empty($this->logo_mime_type) ? null : $this->logo_mime_type;
    }

    public function setLogoMimeType(string $value): void
    {
        $this->set(self::ATTRIBUTE_LOGO_MIME_TYPE, $value);
    }

    public function getRating(): float|bool
    {
        $id = self::getId();
        $result = MySql::selectAll("Orders", "rating, FK_AdminSysadmin_id", "FK_AdminSysadmin_id = $id AND rating IS NOT NULL");

        if ($result === false) {
            return 0;
        }

        $sum_of_ratings = 0;
        foreach ($result as $rate) {
            $sum_of_ratings += intval($rate["rating"]);
        }
        return round($sum_of_ratings / count($result) * 5);
    }


    public static function getByToken(string $token): Sysadmin|bool
    {
        /** @var $r - result */
        $r = MySQL::select(self::TABLE, "*", "token = '$token'");

        if ($r === false) {
            return false;
        }
        return new Sysadmin($r['id'], $r['role'], $r['isActive'], $r['name'], $r['surname'], $r['email'], $r['password'], json_decode($r['categoriesJSON']), $r['phone_number'], $r['emailCode'], $r['token'], $r['logo'], $r['logo_mime_type']);
    }

    public static function getById(int $id): bool|Sysadmin
    {
        /** @var $r - result */
        $r = MySQL::select(self::TABLE, "*", "id = $id");

        if ($r === false) {
            return false;
        }
        return new Sysadmin($r['id'], $r['role'], $r['isActive'], $r['name'], $r['surname'], $r['email'], $r['password'], json_decode($r['categoriesJSON']), $r['phone_number'], $r['emailCode'], $r['token'], $r['logo'], $r['logo_mime_type']);
    }

    public static function getByEmail(string $email): bool|Sysadmin
    {
        /** @var $r - result */
        $r = MySQL::select(self::TABLE, "*", "email = $email");

        if ($r === false) {
            return false;
        }
        return new Sysadmin($r['id'], $r['role'], $r['isActive'], $r['name'], $r['surname'], $r['email'], $r['password'], json_decode($r['categoriesJSON']), $r['phone_number'], $r['emailCode'], $r['token'], $r['logo'], $r['logo_mime_type']);
    }

    public static function createFromMySqlFullResult($sysadmin_result): Sysadmin|bool
    {
        if ($sysadmin_result === false) {
            return false;
        }
        return new Sysadmin($sysadmin_result['id'],
            $sysadmin_result['role'],
            $sysadmin_result['isActive'],
            $sysadmin_result['name'],
            $sysadmin_result['surname'],
            $sysadmin_result['email'],
            $sysadmin_result['password'],
            json_decode($sysadmin_result['categoriesJSON']),
            $sysadmin_result['phone_number'],
            $sysadmin_result['emailCode'],
            $sysadmin_result['token'],
            $sysadmin_result['logo'],
            $sysadmin_result['logo_mime_type']);

    }
}