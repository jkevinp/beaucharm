<?php

class mainview extends View 
{
    function __construct()
    {
        
    }
    function showpage($param , $folder = false)
    {
        if($folder)
        {
            $path = 'views/'.$folder.'/'.$param.'.php';
            if(file_exists($path))
            {   
                '<script>alert("Folder Param");</script>';
                require_once $path;
            }
            else echo '<script>alert("Path Does not exist");</script>';
        }
        else
        {
            $path = 'views/elements/'.$param.'.php';
            if(file_exists($path))
            {
                require_once $path;
            }
        }
      
    }
}