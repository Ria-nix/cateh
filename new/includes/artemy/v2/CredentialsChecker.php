<?php
namespace artemy;
class CredentialsChecker
{
    private string $DBname;
    public $link;
    private string $token;
    public array $sysadmin;
    const WRONG_CREDENTIALS = "{\"action\":\"error-Wrong-Credentials\"}";

    public function __construct(UserInfo $userInfo)
    {
        $this->DBname = $DBname;
        $this->token = $token;
    }


    public function check(): bool//: bool|\mysqli_result
    {
        //check DBname
        $this->link = getLink($this->DBname);
        if ($this->link === false) {
            return false;
        }

        //check token for active sysadmins
        $sql = "SELECT * FROM Users_AdminsSysadmins WHERE token = '$this->token' LIMIT 1";

        $query = mysqli_query($this->link, $sql);
        if ($query === false) {
            return false;
        }

        $this->sysadmin = array_reduce(mysqli_fetch_all($query, MYSQLI_ASSOC), 'array_merge', array());
//        var_dump($this->sysadmins);
        if (count($this->sysadmin) === 0) {
            return false;
        }

        return true;
    }

    public function getSysadmin(): array
    {
        return $this->sysadmin;
    }

    public function getLink()
    {
        return $this->link;
    }
}