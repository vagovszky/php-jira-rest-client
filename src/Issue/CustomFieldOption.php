<?php

/**
 * @author E351649
 */

namespace JiraRestApi\Issue;

class CustomFieldOption implements \JsonSerializable{
    
    /**
     * @var string
     */
    public $id;
    
    /**
     * @var string
     */
    public $name;
    
    /**
     * @var string
     */
    public $value;
    
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
    
}