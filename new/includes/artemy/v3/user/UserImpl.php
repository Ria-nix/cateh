<?php


namespace v3artemy;


interface UserImpl
{
    public static function getByToken(string $token, string|false $TABLE_ = false);
    public static function getById(int $id, string $table);
    public static function getByEmail(string $email, string $table);
}