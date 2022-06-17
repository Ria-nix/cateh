<?php
namespace v2artemy;

class OutputInfo
{
    const OUTPUT_DENIED_ACCESS = "denied access";
    const OUTPUT_USER_NOT_FOUND = "user not found";

    private array $output = array();

    /**
     * Добавляет массив в вывод.
     *
     * @param mixed ...$value
     */
    public function add(array ...$value)
    {
        var_dump($value);
        foreach ($value as $val) {
            array_push($this->output, $val);
        }
    }

    /**
     * @return bool|string Коллекцию массивов в виде JSON
     */
    public function json(): bool|string
    {
        return json_encode($this->output);
    }

    /**
     * @param array $value
     * @param int $flags
     * @param int $depth
     * @return string JSON
     */
    public static function jsonify(mixed $value, int $flags = 0, int $depth = 512): string
    {
        return json_encode($value, $flags, $depth);
    }

    /**
     * @param mixed $value
     * @param bool|null $associative
     * @param int $depth
     * @param int $flags
     * @return array
     */
    public static function arraify(mixed $value, bool|null $associative = false, int $depth = 512, int $flags = 0): array
    {
        return json_decode($value, $associative, $depth, $flags);
    }

    /**
     * @param string $error_message
     * @return string
     */
    public static function error(string $error_message): string
    {
        return json_encode(["action" => $error_message]);
    }

    public static function success(): string
    {
        return json_encode(["action" => "success"], JSON_FORCE_OBJECT);
    }

    /**
     * Дополнительные параметры в success JSON сообщении.
     *
     * @param mixed ...$success_message - использовать как ["code" => 1], ["" => ""] ... и т.д.
     * @return string
     */
    public static function successMultiple(array ...$success_message): string
    {
        $array = [["action" => "success"]];
        foreach ($success_message as $message) {
            array_push($array, $message);
        }
        return self::jsonify($array);
    }
}