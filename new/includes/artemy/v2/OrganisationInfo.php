<?php

namespace v2artemy;

use CustomerNotFoundException;
use FileNotFoundException;
use FileNotImageException;
use FileUploadException;
use MaxFileSizeException;
use mysqli;
use OrganisationNotFoundException;

include_once "MySQL.php";
//	include_once "../artemy/cooler_helpers.php";
include_once "Exceptions/CustomerNotFoundException.php";
include_once "Exceptions/OrganisationNotFoundException.php";

class OrganisationInfo
{
    const TABLE = "Organisations";


    private mysqli $link;
    private int $organisation_id;
    private mixed $result;

    /**
     * OrganisationInfo конструктор. Используйте fetch() перед использованием вложенных функций.
     *
     * @param     $link
     * @param int $organisation_id
     */
    public function __construct($link, int $organisation_id)
    {
        $this->link = $link;
        $this->organisation_id = $organisation_id;
    }


    /**
     * @throws OrganisationNotFoundException
     */
    public function fetch()
    {
        $this->result = MySQL::select($this->link, "Organisations", "*", "id = $this->organisation_id");
        if ($this->result === false) {
            throw new OrganisationNotFoundException("Данной организации не существует.");
        }
    }

    ///GETTERS
    public function getId(): int
    {
        return (int)$this->result["id"];
    }

    public function getName()
    {
        return $this->result["name"];
    }

    public function getAddresses()
    {
        return json_decode($this->result["addressJSON"]);
    }

    public function isActive(): bool
    {
        return $this->result["isActive"] === "1";
    }

    public function getInn()
    {
        return $this->result["INN"];
    }

    public function getCreationPassword()
    {
        return $this->result["creationPassword"];
    }

    public function getToken()
    {
        return $this->result["token"];
    }

    /**
     * @throws CustomerNotFoundException
     */
    public function getCustomers(): array
    {
        $id = $this->getId();
        $result = MySQL::selectAll($this->link, "Users_Customers", "(`id` * 1) AS `id`, name, surname, phone_number, lastUsedAddress", "FK_organisation_ID = $id");
        if ($result === false) {
            throw new CustomerNotFoundException("Кастомеры организации не найдены.");
        }
        for ($i = 0; $i < count($result); $i++) {
            $result[$i]["id"] = (int)$result[$i]["id"];
        }
        return $result;
    }

    ///SETTERS
    public function setName(string $value)
    {
        $id = $this->getId();
        MySQL::update($this->link, "Organisations", "name = '$value'", "id = $id");
    }

    public function setAddresses(array $value)
    {
        $id = $this->getId();
        $value = json_encode($value);
        MySQL::update($this->link, "Organisations", "addressJSON = '$value'", "id = $id");
    }

    public function setActive(bool $value)
    {
        $id = $this->getId();
        $val = $value ? 1 : 0;
        MySQL::update($this->link, "Organisations", "isActive = '$val'", "id = $id");
    }

    public function setInn(int $value)
    {
        $id = $this->getId();
        MySQL::update($this->link, "Organisations", "INN = $value", "id = $id");
    }

    public function setCreationPassword(string $value)
    {
        $id = $this->getId();
        MySQL::update($this->link, "Organisations", "creationPassword = '$value'", "id = $id");
    }

    public function setToken(string $value)
    {
        $id = $this->getId();
        MySQL::update($this->link, "Organisations", "token = '$value'", "id = $id");
    }

    public function getLogo(): string|null
    {
        return empty($this->logo) ? null : $this->logo;
    }

    public function getLogoMimeType(): string|null
    {
        return empty($this->logo_mime_type) ? null : $this->logo_mime_type;
    }

    public function setLogoMimeType(string $value): void
    {
        $id = $this->getId();
        MySQL::update($this->link, "Organisations", "logo_mime_type = '$value'", "id = $id");
    }



    /**
     * @throws FileNotFoundException
     * @throws FileUploadException
     * @throws MaxFileSizeException
     * @throws FileNotImageException
     */
    public function setLogo(ImageCoder $image)
    {
        $id = $this->getId();
        $logo_bytes = mysqli_escape_string($this->link, $image->encode());
        $logo_mime_type = $image->getMimeType();
        MySQL::update($this->link, "Organisations", "logo = '$logo_bytes'", "id = $id");
        MySQL::update($this->link, "Organisations", "logo_mime_type = '$logo_mime_type'", "id = $id");
    }

    public function deleteLogo()
    {
        $id = $this->getId();
        MySQL::update($this->link, "Organisations", "logo = 'null'", "id = $id");
        MySQL::update($this->link, "Organisations", "logo_mime_type = 'null'", "id = $id");
    }

    public static function addNewOrganisation($link, string $name, int $inn, array $addresses = [], bool $isActive = true)
    {
        $token = generateToken();
        $addresses = json_encode($addresses);
        $isActive = $isActive ? 1 : 0;
        MySQL::insert($link, "Organisations", "name, inn, addressJSON, isActive, token", "'$name', $inn, '$addresses', $isActive, '$token'");
    }

    /**
     * @param        $link
     * @param string $select в виде "id, name, surname"
     *
     * @return array
     * @throws OrganisationNotFoundException
     */
    public static function getAllOrganisations($link, string $select = "*"): array
    {
        $sql = "SELECT $select FROM Organisations";
        $result = mysqli_fetch_all(mysqli_query($link, $sql, MYSQLI_ASSOC), MYSQLI_ASSOC);
        if (count($result) === 0) {
            throw new OrganisationNotFoundException("Не найдено ни одной организации.");
        }
        for ($i = 0; $i < count($result); $i++) {
            $result[$i]["id"] = (int)$result[$i]["id"];
        }
        return $result;
    }

    public static function fetchByToken($link, string $org_token): OrganisationInfo|false
    {
        $id = MySQL::select($link, self::TABLE, "id", "token = '$org_token'");
        $org = new self($link, $id["id"]);
        try {
            $org->fetch();
        } catch (OrganisationNotFoundException $e) {
            return false;
        }
        return $org;
    }
}