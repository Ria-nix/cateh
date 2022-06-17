<?php


namespace v3artemy;


use ArrayObject;

class OrganisationCollection extends ArrayObject
{
    public function __construct($array)
    {
        parent::__construct($array);
    }
}