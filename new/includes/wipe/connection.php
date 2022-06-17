<?php

/**
 *! Warning
 *! Connect after connecting files such as: "helper/const.php", "helper/funcs.php", "helper/gatherData.php", "helper/mysql.php".
 */

namespace wipe\helper;

/**
 * This class is used to connect to a database and retrieve the data of the user to be connected.
 */
class Connection
{
    //* New values.
    public static int       $lvl;
    public static array     $user;
    public static object    $link;
    public static string    $table;
    //* Passed values.
    public static string    $role;
    public static string    $dbname;
    //* Main connection data.
    private const HOST      =   '37.140.192.111';
    private const USERNAME  =   'u1184374_creator';
    private const PASSWORD  =   'xY8cV0jD2rtB5s';
    private const DBNAME    =   'u1184374_main_helpdesk_bd';
    //* Data transfer necessary.
    private const GET_ROLE      =   'role';
    private const GET_TOKEN     =   'token';
    private const GET_DBNAME    =   'dbname';

    function __construct()
    {
        $data   =   self::data();

        self::$role     =&  $data[self::GET_ROLE];
        self::$dbname   =&  $data[self::GET_DBNAME];

        self::$link =   MySQL::connect(self::HOST, self::USERNAME, self::PASSWORD, self::DBNAME);
        self::$link =   self::newConnection();
        self::$user =   self::userInfo($data[self::GET_TOKEN]);
    }

    private static function data()
    {
        $data   =   [
                        self::GET_ROLE      =>  [GD::METHOD   =>  [GD::GET, GD::POST, GD::COOKIE],  GD::MUST  =>  true],
                        self::GET_TOKEN     =>  [GD::METHOD   =>  [GD::POST, GD::COOKIE],           GD::MUST  =>  true],
                        self::GET_DBNAME    =>  [GD::METHOD   =>  [GD::POST, GD::COOKIE],           GD::MUST  =>  true]
                    ];

        return  GD::get($data);
    }

    private static function newConnection()
    {
        $it =   MySQL::select('`organisations`', '`DBconnect`', '`DBname` = "'.self::$dbname.'"');
        $it =   MySQL::numeric($it, self::$link);
        
        $it =   MySQL::select('`DBconnect`', '*' , '`id` = '.$it);
        $it =   MySQL::fetch(MySQL::FETCH_ASSOC, $it, self::$link, ERROR::UNKNOW);

        return  MySQL::connect($it['host'], $it['user'], $it['password'], self::$dbname);
    }

    private static function userInfo(string &$token)   :   array
    {
        self::$table    =   GET::userTable(self::$role);

        $user   =   MySQL::select(self::$table, '*', "`token`   = '$token' AND `isActive`  = 1");
        $user   =   MySQL::fetch(MySQL::FETCH_ASSOC, $user, self::$link, ERROR::AUTHORIZATION);

        self::$lvl  =   GET::userLvl($user['role'], self::$table);
        
        return GET::diff($user, ['token', 'emailCode', 'logo', 'logo_mime_type']);
    }
}