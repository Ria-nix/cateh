<?php

namespace v3artemy;

include_once "UserImpl.php";
include_once "Customer.php";
include_once "Sysadmin.php";

class User implements UserImpl
{

    public static function getByToken(string $token, string|false $TABLE_ = false): Sysadmin|Customer|bool
    {
        switch ($TABLE_) {
            case Customer::TABLE:
                return Customer::getByToken($token);
            case Sysadmin::TABLE:
                return Sysadmin::getByToken($token);
            default:
                $result = Customer::getByToken($token);
                if ($result === false) {
                    $result = Sysadmin::getByToken($token);
                }

                return $result;
        }
    }


    public static function getById(int $id, string $table): bool|Customer|Sysadmin
    {
        if ($table === Sysadmin::TABLE) {
            $result = MySql::select($table, "*", "id = $id");
            return Customer::createFromMySqlFullResult($result);
        } elseif ($table === Customer::TABLE) {
            $result = MySql::select($table, "*", "id = $id");
            return Sysadmin::createFromMySqlFullResult($result);
        }

        return false;
    }

    public static function getByEmail(string $email, string $table)
    {
        // TODO: Implement getByEmail() method.
    }
}