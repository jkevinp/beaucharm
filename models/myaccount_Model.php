<?php
class myaccount_Model extends Model
{
    function __construct() 
    {
        parent::__construct();
    }
    function get_services()
    {
        $data = $this->executeSql("Select * from `services`");
        return $data;
    }
}
