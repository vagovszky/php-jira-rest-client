<?php

/**
 * @author E351649
 */

namespace JiraRestApi\User;

class User implements \JsonSerializable
{

    /* @var string */
    public $self;
    
    /* @var string */
    public $key;
    
    /* @var string */
    public $name;

    /* @var string */
    public $emailAddress;

    /* @var string */
    public $displayName;

     /* @var string */
    public $password;
    
    /* @var string */
    public $notification;

    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
}
