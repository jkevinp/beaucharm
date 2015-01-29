<?php
class Session 
{
    public static function init()
    {
        if(session_id() =='')
        {
         session_start();
         $array =   array("dashboard","exam_view");
         $url = isset($_GET['url']) ? $_GET['url'] : null; //if url is set get it else null
         $url = array_filter(explode('/',$url));
         if(isset($url[0]))
         {
            if(in_array($url[0], $array))
            {
                $auth =Session::checkSession();
                if(!isset($auth))
                {
                    header("location:".URL."login");
                }
            }
        }
        }
    }
    public static function checkUserSession()
    {
         $timeLeft = Session::get('sessionExpire') - time();
         if ($timeLeft < 0 == TRUE)
         {
             header("location:".URL."login/logout");
             exit();    
         }
    }
    public static function checkSession()
    {
        if ($_SESSION['userID'] >= 0)
        {
            $data = session::get('userID');
            return $data;
        }
    }
    //returns the value of the given $key
    public static function get($key)
    {
        if(isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }
        else
        {
            return null;
        }
    }
    //sets a new session with the name of $key and the value of $value...
    public static function set($key,$value)
    {
        $_SESSION[$key] = $value;
    }
    //destroys the entire session and unset all keys
    public static function destroy()
    {
        unset($_SESSION['userID']);
        session_destroy();
    }

}