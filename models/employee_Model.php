<?php

class ClassName extends Model
{
	public function __construct() 
    {
    	parent::__construct();
    }
    public function get_services()
    {
        return $this->executeSql("SELECT * FROM `employee`",null);
    }
}