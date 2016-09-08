<?php

namespace JiraRestApi;

class ReflectionContainer
{
    protected $ref = null;
    protected $field = null;
    
    public function __construct($reflection, $field)
    {
        $this->ref = $reflection;
        $this->field = $field;
    }
    
    public function getName() {
        return $this->ref->getName();
    }
    
    public function getField() {
        return $this->field;
    }
}