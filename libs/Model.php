<?php
class Model extends Database
{
    public $db;
    function __construct() 
    {
       $this->db = new Database();
    }
    public function executeSql($sql,$input)
    {
        $this->db = new Database();
        $statement = $this->db->prepare($sql);
        $statement->execute($input);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $output = $statement->fetchAll();
        return $output;
    }
    
  
}

