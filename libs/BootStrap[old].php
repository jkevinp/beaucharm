<?php
class BootStrap 
{
    function __construct() 
    {
        $this->listen();
    }
    function listen()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null; //if url is set get it else null
        $url = array_filter(explode('/',$url));
        try
        {
           switch (count($url))
            {

                case 0:
                    $check = $this->checkExistence('index');
                    $controller = new Index();
                    $controller->index();
                    //$controller->loadModel('index');
                    break;
                case 1:
                    $check = $this->checkExistence($url[0]);
                    if($check)
                    {
                        $controller = new $url[0];
                        $controller-> $url[0]();
                    }
                    else
                    {
                         $this->error();
                         break;
                    }
                    break;
                case 2:
                      $check = $this->checkExistence($url[0]);
                      if($check)
                       {
                          $controller = new $url[0];
                          if($this->checkMethod($controller,$url[1],false))
                          {
                            
                          }
                          else
                          {
                              $this->error();
                              break;
                          }
                       }
                      else
                      {
                        $this->error();
                        break;
                      }
                       break;
                case 3:
                      $check = $this->checkExistence($url[0]);
                      $controller = new $url[0];
                     // $controller->loadModel($url[0]);
                      $this->checkMethod($controller,$url[1],$url[2]);
                      break;
                case 4: 
                      $check = $this->checkExistence($url[1]);
                      $controller = new $url[1];
                     // $controller->loadModel($url[1]);
                      $this->checkMethod($controller, $url[2], $url[3]);
                    break;
            }
            }
        
        catch(Exception $e)
        {   
           echo $e;
        }
    }
    function checkMethod($controller,$url,$param = false)
    {
        if(method_exists($controller, $url))
        {
            if($param === false)
            {
                 $controller->$url();
            }
            else
            {
                 $controller->$url($param);
            }
            return true;
        }
        else
        {
            $this->error();
            return false;
        }
    }
    function checkExistence($param)
    {
           
        $file = 'controllers/'.$param.'.php';
            if(file_exists($file))
            {
                require $file;
                return true;
            }
            else
            {
                $this->error();
                return false;
            }
    }
    function error()
    {
        //display error view
        if(file_exists('controllers/error.php'))
        {
                require_once 'controllers/error.php';
                $controller = new Error();
                $controller->index();
                return false;
        }
       
      
    }

}