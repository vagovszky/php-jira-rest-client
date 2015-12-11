<?php

namespace JiraRestApi\User;

class Users implements \JsonSerializable
{
    /* @var int */
    public $size;
    
    /* @var array */
    public $items;
    
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
}
