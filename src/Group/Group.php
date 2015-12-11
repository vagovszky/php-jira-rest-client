<?php

namespace JiraRestApi\Group;

class Group implements \JsonSerializable
{

    /* @var string */
    public $self;
    
    /* @var string */
    public $name;

    /* @var \JiraRestApi\User\Users */
    public $users;
    
    /* @var string */
    public $expand;
    
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
}
