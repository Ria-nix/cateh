<?php

/**
 *! Warning
 *! This file contains classes of common functions GET and CHECK.
 *! These are used to get edited or new data, and also to check them to see if any common conditions are met.
 *! Connect after connecting file such as: "helper/const.php".
 */

namespace wipe\helper;

/**
 * @method userLvl(int $role, string $table)
 * sets the user's privilege level, by the index in the table.
 * @method userTable(int|string $role)
 * returns the user table.
 * @method userRole(int $role, ?string $table = null)
 * returns the user role.
 * @method json(int $type, string &$data, ?string $must = ERROR::FORMAT)
 * returns a decoded string.
 * @method diff(array &$arr, array $delete)
 * returns an array with no extra keys.
 * @method date()
 * returns the server date (YY-MM-DD HH:MM:SS.MS).
 * @method between(string $before, string $after, string $str)
 * returns the value between the characters in the string.
 */
class GET
{   
    const JSON_INT      =   0;
    const JSON_BOOL     =   1;
    const JSON_ARRAY    =   2;
    
    static function userLvl(int $role, string $table)   :   string
    {
        return  match ($table)
                {
                    USER::TABLE[0]  =>  @[ LVL::CUSTOMER, LVL::SUPER_CUSTOMER ][ $role ],
                    USER::TABLE[1]  =>  @[ LVL::SYSADMIN, LVL::ADMIN, LVL::SUPER_ADMIN ][ $role ]
                }
                ??  die(ERROR::UNKNOW);
    }
    
    /**
     * @param  int|string $role the name of the role or level of the user
     * @return string the name of the table that contains the user
     */
    static function userTable(int|string $role) :   string
    {
        if  (is_int($role) && $role > 0) :
            if      ($role <= LVL::SUPER_CUSTOMER   )   :   return  USER::TABLE[0];
            elseif  ($role <= LVL::SUPER_ADMIN      )   :   return  USER::TABLE[1]; 
            endif;
        else    :
            if      (in_array($role, USER::CUSTOMER_ROLE_NAME)) :   return  USER::TABLE[0];
            elseif  (in_array($role, USER::EMPLOYEE_ROLE_NAME)) :   return  USER::TABLE[1]; 
            endif;
        endif;

        die(ERROR::UNKNOW);
    }
    
    /**
     * @param  null|string $table extra parament ( null - $role as a level user, else - $role as a index ).
     */
    static function userRole(int $role, ?string $table = null)  :   string
    {
        if (is_null($table) && $role > 0) :
            if      ($role <= LVL::SUPER_CUSTOMER   )   :   $it =@  USER::CUSTOMER_ROLE_NAME[ $role - 1 ];
            elseif  ($role <= LVL::SUPER_ADMIN      )   :   $it =@  USER::EMPLOYEE_ROLE_NAME[ $role - LVL::SYSADMIN ];
            endif;
        else :
            if      ($table === USER::TABLE[0]) :   $it =@  USER::CUSTOMER_ROLE_NAME[$role];
            elseif  ($table === USER::TABLE[1]) :   $it =@  USER::EMPLOYEE_ROLE_NAME[$role];
            endif;
        endif;

        return  $it ??  die(ERROR::UNKNOW);
    }
    
    /**
     * @param  int $type use fixed values :
     * 
     * GET::JSON_INT - decoding a string into a number ;
     * 
     * GET::JSON_ARRAY - decoding a string into an array ;
     * @param  null|string $must by default, if the decoding format is invalid, an error is output, else - null.
     */
    static function json(int $type, string &$data, ?string $must = ERROR::FORMAT)   :   null|bool|int|array
    {
        $it =   json_decode($data);

        switch ($type) :
            case self::JSON_INT     :   $flag   =   is_int($it);    break;
            case self::JSON_BOOL    :   $flag   =   is_bool($it);   break;
            case self::JSON_ARRAY   :   $it     =   (array)$it;   
                                        $flag   =   is_array((array)$it);  
                                        break;
            default                 :   die(ERROR::TEAPOT);
        endswitch;

        return CHECK::must($flag, $must) ? $it : null;
    }
    
    /**
     * Removing unnecessary keys from an array.
     */
    static function diff(array &$arr, array $delete) : array
    {
        return  array_diff_key  (   $arr, 
                                    array_combine   (  $delete, 
                                                        array_fill(0, count($delete), null) ) );
    }

    static function date()  :   string
    {
        return ((array)new \DateTime())['date'];
    }

    static function between(string $before, string $after, string $str) :   null|string
    {
        preg_match('/'.$before.'(.*?)'.$after.'/', $str, $match);
        return  empty($match[1]) ? null : $match[1];
    }
}

/**
 * @method array(int $type, array &$data) 
 * checks the type of the array (CHECK::ARRAY_INT, CHECK::ARRAY_ASSOC).
 * @method full(string ...$data)
 * checks for full data, without spaces. If there is an empty value, an error is output.
 * @method must($data, ?string $must = ERROR::UNKNOW)
 * if the data is the same as one of the values ( '', [], false, null ), it is replaced by null or the error $must be output.
 * @method isUser(int $type, int &$lvl)
 * check if the user with this privilege level is the given $type (CHECK::IS_ADMIN, CHECK::IS_CUSTOMER, CHECK::IS_EMPLOYEE).
 * @method isTable(string $table)
 * check if the string given is the name of one of the tables.
 */
class CHECK
{    
    const ARRAY_INT     =   0;
    const ARRAY_ASSOC   =   1;

    const IS_ADMIN      =   0;
    const IS_CUSTOMER   =   1;
    const IS_EMPLOYEE   =   2;

    /**
     * Checks the type of the array.
     * @param  int $type use fixed values:
     * 
     * CHECK::ARRAY_INT - check that the array is a numerical ;
     * 
     * CHECK::ARRAY_ARRAY - check that the array is associative ;
     */
    static function array(int $type, array &$data)  :   bool
    {
        if ($data === []) return false;

        switch ($type) :
            case self::ARRAY_INT    : return  array_filter(   array_map(fn($e) => is_int($e), $data), fn($e) => $e === false  )   === [];   break;
            case self::ARRAY_ASSOC  : return  array_keys($data) !== range(0, count($data) - 1);                                             break;
            default                 : die(ERROR::UNKNOW);
        endswitch;
    }
        
    static function full(...$data)  :   bool
    {
        $it =   array_map(fn($e) => is_string($e) ? empty( trim($e) ) : empty($e), $data);
        $it =   array_filter($it, fn($e) => $e === true) === [];

        return $it ? $it : die(ERROR::FORMAT);
    }
            
    static function must($data, ?string $must = ERROR::UNKNOW)
    {
        if  (!is_numeric($data) && empty($data))    return  is_null($must) ? $must : die($must);
        return  $data;
    }

    static function isUser(int $type, int &$lvl)    :   bool
    {
        switch  ($type)  :
            case self::IS_ADMIN     :   return in_array($lvl, [LVL::ADMIN, LVL::SUPER_ADMIN]);                  break;
            case self::IS_CUSTOMER  :   return in_array($lvl, [LVL::CUSTOMER, LVL::SUPER_CUSTOMER]);            break;
            case self::IS_EMPLOYEE  :   return in_array($lvl, [LVL::SYSADMIN, LVL::ADMIN, LVL::SUPER_ADMIN]);   break;
            default                 :   die(ERROR::FORMAT);
        endswitch;
    }

    static function isTable(string $table)  :   bool
    {
        return  in_array($table, [TABLE::ORDER, TABLE::SETTINGS, TABLE::CUSTOMER, TABLE::EMPLOYEE, TABLE::CATEGORY, TABLE::ORGANIZATION]);
    }
}

