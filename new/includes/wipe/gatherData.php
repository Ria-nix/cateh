<?php

/**
 *! Warning
 *! Connect after connecting files such as: "helper/const.php", "helper/funcs.php".
 */

namespace wipe\helper;

/**
 * This classe is used to return an array of data sent by GET, POST or COOKIE methods.
 * @method get()
 * Used to replace a key value with a value that can be passed through a GET, POST or COOKIE method.
 */
class GD
{
    const TYPE      =   0;
    const MUST      =   1;
    const METHOD    =   2;

    const GET       =   0;
    const POST      =   1;
    const COOKIE    =   2;

    static function get(array &$data)   :   array
    {
        foreach ($data as $key=>&$value) :
            $type   =@  $value[self::TYPE];
            $method =@  $value[self::METHOD]    ??  die(ERROR::TEAPOT);
            $must   =@  $value[self::MUST]      ?   ERROR::FORMAT : null;

            $method =   self::search($method, $key);
            $method =   self::check($method, $must);

            if  (   is_int($type)       && 
                    is_string($method)  )   $method = GET::json($type, $method, $must);

            $value = $method;
        endforeach;

        return  $data;   
    }

    private static function check(null|string|array $method, ?string $must)  :   null|string
    {
        if      (is_null($method))      return  CHECK::must($method, $must);
        elseif  (is_string($method))    return  CHECK::must( trim($method), $must);

        $method =   array_map(fn($e) => is_string($e) ? $e : false, $method);
        $method =   array_filter($method, fn($e) => is_string($e));
        $method =   array_shift($method);
        return      self::check($method, $must);
    }

    private static function search(int|array $method, string &$key) :   null|string|array
    {
        if      (is_int($method))   return self::method($method, $key);
        elseif  (CHECK::array(CHECK::ARRAY_INT, $method))   foreach ($method as &$m) $m = self::search($m, $key);
        else    die(ERROR::TEAPOT);

        return  $method;
    }

    private static function method(int &$type, string &$key)   :   null|string
    {
        switch ($type) :
            case self::GET      :   return  @$_GET[ $key ];     break;
            case self::POST     :   return  @$_POST[ $key ];    break;
            case self::COOKIE   :   return  @$_COOKIE[ $key ];  break;
            default             :   die(ERROR::TEAPOT);
        endswitch;
    }
}