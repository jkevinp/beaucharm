<?php
class Database extends PDO
{
    
    public function __construct() 
    {
       parent::__construct("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USERNAME,DB_PASSWORD,
				array(PDO::ATTR_PERSISTENT => true));
    }
    
}
