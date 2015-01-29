<?php

class ajax 
{
    public $model;
    public $db;
    function __construct() 
    {
        if(isset($_GET['build']))
        {
            $page = $_GET['build'];
              echo $page;
            if(file_exists($page))
            {
              
            }
        }
    }
}
$ajax = new ajax();
 
     /* $controller = new Controller();
            $controller->model = new Model();
            $controller->redirectDB("index");
            echo $param."is here";echo $param."is here";echo $param."is here";echo $param."is here";*/
    
/*$controller = new Controller();
       //$controller->model = $controller->loadModel("userSearch");
       $controller->model = new Model();
       $controller->model->redirect("http://google.com");*/
  /* if(session_id() =='')
        {
            session_start();
        }
       if(isset($_SESSION['controller']))
       {
          $controller = $_SESSION['controller'];
          $controller -> model = new Model();
          $users = $controller -> model -> executeSql("Select * from users", array());
          var_dump($users);
       }
    
       //$controller -> model -> redirect("Http://google.com");
       
       */