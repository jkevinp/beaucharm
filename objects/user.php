<?php

class user extends Model{
    var $username;
    var $password;
    var $level;
    var $accountID;
    public $model;
    function __construct() 
    {
        parent::__construct();
        $this->model = new Model();
    }
    function printAll()
    {
        echo username."-".password."-".level;
    }
    public function getName($id)
    {
        $d = $this->model->executeSql("select `username` from users where `id`=:id", array(":id" => $id));
        return $d[0]['username'];
    }
}

