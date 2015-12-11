<?php

namespace JiraRestApi\Project;

class Role implements \JsonSerializable {
    
    /**
     * Project id.
     *
     * @var int
     */
    public $id;
    
    /**
     * @var string
     */
    public $name;
    
    /**
     * @var string
     */
    public $self;
    
    /**
     * @var string
     */
    public $description;
    
    /**
     * @var array
     */
    public $actors;
    
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
    
}
