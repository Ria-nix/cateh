<?php


namespace v3artemy;

use JetBrains\PhpStorm\Pure;

include_once getRootPath() . "site/includes/artemy/v3/MySql/MySql.php";

class Customer
{
    private int|null $id;
    private int|null $role;
    private int|null $isActive;
    private string|null $name;
    private string|null $surname;
    private string|null $email;
    private string|null $password;
    private string|null $phone_number;
    private int|null $email_code;
    private string|null $token;
    private string|null $lastUsedAddress;
    private int|null $position;
    private int|null $FK_organisation_ID;

    const TABLE = "Users_Customers";

    const ATTRIBUTE_ID = "id";
    const ATTRIBUTE_ROLE = "role";
    const ATTRIBUTE_IS_ACTIVE = "isActive";
    const ATTRIBUTE_NAME = "name";
    const ATTRIBUTE_SURNAME = "surname";
    const ATTRIBUTE_EMAIL = "email";
    const ATTRIBUTE_PASSWORD = "password";
    const ATTRIBUTE_PHONE_NUMBER = "phone_number";
    const ATTRIBUTE_EMAIL_CODE = "emailCode";
    const ATTRIBUTE_TOKEN = "token";
    const ATTRIBUTE_LAST_USED_ADDRESS = "lastUsedAddress";
    const ATTRIBUTE_POSITION = "position";
    const ATTRIBUTE_FK_ORGANISATION_ID = "FK_organisation_ID";

    private function __construct( $id, $role, $isActive, $name, $surname, $email, $lastUsedAddress, $position, $password, $phone_number,  $email_code, $FK_organisation_ID, $token)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->lastUsedAddress = $lastUsedAddress;
        $this->position = $position;
        $this->email = $email;
        $this->password = $password;
        $this->phone_number = $phone_number;
        $this->email_code = $email_code;
        $this->FK_organisation_ID = $FK_organisation_ID;
        $this->isActive = $isActive;
        $this->role = $role;
        $this->token = $token;
    }


    private function set($ATTRIBUTE_, int|string $value)
    {
        $id = $this->getId();
        if (is_int($value) === false) {
            $value = "'$value'";
        }
        Mysql::update(self::TABLE, "$ATTRIBUTE_ = $value", "id = $id");
    }


    #[Pure] public function isAccessAllowed(int $level): bool
    {
        if ($level === 2 and $this->getRole() === 0) {
            return false;
        }
        return true;
    }


    const ACCESS_LEVEL_CUSTOMER = 1;
    const ACCESS_LEVEL_SUPER_CUSTOMER = 2;
    #[Pure] public function getAccessLevel(): int
    {
        if ($this->getRole() === 1) {
            return self::ACCESS_LEVEL_SUPER_CUSTOMER;
        }

        return self::ACCESS_LEVEL_CUSTOMER;
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function getRole(): int
    {
        return $this->role;
    }


    public static function translateRoleToText($integer): string
    {
        $integer = intval($integer);

        return match ($integer) {
            0 => "Клиент",
            1 => "Супер клиент",
            default => "Неизвестно",
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
        return $this->name;
    }

    public function setName(string $value): void
    {
        $this->set(self::ATTRIBUTE_NAME, $value);
    }

    public function getSurname(): string
    {
        return $this->surname;
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

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
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

    public function getLastUsedAddress(): string
    {
        return $this->lastUsedAddress;
    }

    public function setLastUsedAddress(string $value): void
    {
        $this->set(self::ATTRIBUTE_LAST_USED_ADDRESS, $value);
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $value): void
    {
        $this->set(self::ATTRIBUTE_POSITION, $value);
    }

    public function getFKOrganisationID(): int
    {
        return $this->FK_organisation_ID;
    }

    public function setFKOrganisationID(int $value): void
    {
        $this->set(self::ATTRIBUTE_FK_ORGANISATION_ID, $value);
    }


    public static function getByToken(string $token): Customer|bool
    {
        /** @var $r - result */
        $r = MySQL::select(self::TABLE, "*", "token = '$token'");

        if ($r === false) {
            return false;
        }
        return new Customer($r['id'], $r['role'], $r['isActive'], $r['name'], $r['surname'], $r['email'], $r['lastUsedAddress'], $r['position'], $r['password'], $r['phone_number'], $r['emailCode'], $r['FK_organisation_ID'], $r['token']);
    }

    public static function getById(int $id): bool|Customer
    {
        /** @var $r - result */
        $r = MySQL::select(self::TABLE, "*", "id = $id");

        if ($r === false) {
            return false;
        }
        return new Customer($r['id'], $r['role'], $r['isActive'], $r['name'], $r['surname'], $r['email'], $r['lastUsedAddress'], $r['position'], $r['password'], $r['phone_number'], $r['emailCode'], $r['FK_organisation_ID'], $r['token']);
    }

    public static function getByEmail(string $email): bool|Customer
    {
        /** @var $r - result */
        $r = MySQL::select(self::TABLE, "*", "email = $email");

        if ($r === false) {
            return false;
        }
        return new Customer($r['id'], $r['role'], $r['isActive'], $r['name'], $r['surname'], $r['email'], $r['password'], $r['categoriesJSON'], $r['phone_number'], $r['emailCode'], $r['token'], $r['logo'], $r['logo_mime_type']);
    }

    #[Pure] public static function createFromMySqlFullResult($customer_result): Customer|false
    {
        if ($customer_result === false) {
            return false;
        }
        return new Customer($customer_result['id'],
            $customer_result['role'],
            $customer_result['isActive'],
            $customer_result['name'],
            $customer_result['surname'],
            $customer_result['email'],
            $customer_result['password'],
            $customer_result['categoriesJSON'],
            $customer_result['phone_number'],
            $customer_result['emailCode'],
            $customer_result['token'],
            $customer_result['logo'],
            $customer_result['logo_mime_type']);
    }
}