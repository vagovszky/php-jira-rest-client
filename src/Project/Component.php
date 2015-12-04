<?php

namespace JiraRestApi\Project;

class Component implements \JsonSerializable
{
    /**
     * Component URI.
     *
     * @var string
     */
    public $self;

    /**
     * Component id.
     *
     * @var string
     */
    public $id;

    /**
     * Component name.
     *
     * @var string
     */
    public $name;

    /**
     * Component description.
     *
     * @var description
     */
    public $description;
    
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }
}
