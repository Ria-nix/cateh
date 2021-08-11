<?php
include_once "site/includes/artemy/helper.php";
include_once "Exceptions/DuplicateInnException.php";

class OrganisationAdder
{
    private $link;
    private string $name;
    private int $inn;
    private string $address;
    private ImageCoder $imageCoder;

    public function __construct($link, $name, $inn, $address, ImageCoder $imageCoder)
    {
        $this->link = $link;
        $this->name = $name;
        $this->inn = $inn;
        $this->address = $address;
        $this->imageCoder = $imageCoder;
    }

    /**
     *
     * @throws AddingOrganisationException
     * @throws DuplicateInnException
     */
    function add()
    {try {
        $logo_encoded = mysqli_real_escape_string($this->link, $this->imageCoder->encode());
        $logo_mime_type = $this->imageCoder->getMimeType();
    } catch (FileNotFoundException $e) {
        die($e->getMessage());
    } catch (FileUploadException $e) {
        die($e->getMessage());
        //
    } catch (MaxFileSizeException $e) {
        die($e->getMessage());
        ///
    } catch (FileNotImageException $e) {
        die($e->getMessage());
        ////
    }
        $token = generateToken();
        $sql = "INSERT INTO Organisations (`name`, `addressJSON`, `inn`, `token`, `logo`, `logo_mime_type`) VALUES ('{$this->name}', '$this->address', $this->inn, '$token', '$logo_encoded', '$logo_mime_type')";
        $result = mysqli_query($this->link, $sql);
        $errors = mysqli_error($this->link);
//        echo $errors;
        if (str_contains($errors, "INN")) {
            throw new DuplicateInnException("Организация с данным ИНН уже существует!");
        }

        if ($result === false) {
            throw new AddingOrganisationException("Не удалось добавить организацию.");
        }
    }

}