<?php


namespace v3artemy;


class Order
{

    public static function translateStatusToText($integer): string
    {
        $integer = intval($integer);
        return match ($integer) {
            0 => "Не принят",
            1 => "Принят",
            2 => "Завершён",
            3 => "Удалён",
            4 => "В ожидании",
            default => "Неизвестно",
        };
    }

}