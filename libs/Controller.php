<?php
class Controller 
{
    public $model=null;
    public $view=null;
    public $data = null;
    function __construct() 
    {
        $this->view = new View();
    }
    function loadModel($name)
    {
        $path = "models/".$name.'_Model.php';
        if (file_exists($path))
        {
            require($path);
            $cn = $name."_Model";
            $this->model = new $cn();
        }
        else 
        {
           echo "<br/><br/><p style='background:white;'>".$path."<br/>Model does not exist</p>  ";
        }
    }
    function redirect($url)
    {
        header("location:".URL.$url);
    }
    function toHex( $hex ) 
    {
        return pack('H*', $hex);
    }
    function toStr( $str ) 
    {
      return array_shift( unpack('H*', $str) );
    }
    function clean($str)
    {
        return mysql_real_escape_string($str);
    }
}