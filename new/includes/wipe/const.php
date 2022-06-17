<?php

namespace wipe\helper;

/**
 ** Consatant server errors.
 */
class ERROR
{
    const AUTHORIZATION =   '401';
    const FORMAT        =   '415';
    const TEAPOT        =   '418';
    const LOCKED        =   '423';
    const UNKNOW        =   '500';
    const CONNECTION    =   '503';
}

/**
 ** Consatant the values of the table names in the database.
 */
class TABLE 
{
    const ORDER         =   'Orders';
    const SETTINGS      =   'settings';
    const CUSTOMER      =   'Users_Customers';
    const EMPLOYEE      =   'Users_AdminsSysadmins';
    const CATEGORY      =   '_Categories';
    const ORGANIZATION  =   'Organisations';
}

/**
 ** Consatant privilege levele values.
 */
class LVL
{
    const CUSTOMER          = 1;
    const SUPER_CUSTOMER    = 2;
    const SYSADMIN          = 3;
    const ADMIN             = 4;
    const SUPER_ADMIN       = 5;
}

/**
 ** Consatant user values ( table, role ).
 */
class USER
{
    const TABLE                 =   [ TABLE::CUSTOMER, TABLE::EMPLOYEE ];
    const CUSTOMER_ROLE_NAME    =   [ 'customer', 'supercustomer' ];
    const EMPLOYEE_ROLE_NAME    =   [ 'sysadmin', 'admin', 'superadmin' ];
}