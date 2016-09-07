<?php

namespace JiraRestApi\Issue;

class CustomFieldValue implements \JsonSerializable
{
    protected $values = [];
    
    public function __construct($value = null) {
        if ($value) $this->__set('value', $value);
    }
    
    public function __set($name, $value)
    {
        $this->values[$name] = $value;
    }
    
    public function __get($name) {
        return isset($this->values[$name]) ? $this->values[$name] : null;
    }
    
    public function jsonSerialize()
    {
        $ret = array_filter(get_object_vars($this));
        if (isset($ret['values']))
        {
            foreach ($ret['values'] as $key => $val) {
                $ret[$key] = $val;
            }
            unset($ret['values']);
        }
        return $ret;
    }
}