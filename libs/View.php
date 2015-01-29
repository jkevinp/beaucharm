<?php

class View 
{
    function __construct() 
    {
        
    }
    public function render($name, $folder = false,$sidebar = false)
    {
        if($folder)
        {
            require_once 'views/includes.php';
            echo '<link rel="stylesheet" href="'.URL.'public/css/'.$folder.'/style.css" />';
            echo '<!-- VIEW CONTROLLER INCLUDE -->';
            echo "<script src=".JS.$folder.'/'.$name.".js></script>";
            echo "<link rel='stylesheet' href=".CSS.$name.".css />";
            echo '<!-- END VIEW CONTROLLER INCLUDE -->';
            echo '<!-- VIEW CONTROLLER HEADER RENDER -->';
            $this->renderHeader($folder);
            if($sidebar)
            {
                require_once 'views/'.$folder.'/panels/sidebar.php';
            }
            echo '<!-- END VIEW CONTROLLER HEADER RENDER -->';
            require_once "views/index.php";
            require_once 'views/'.$folder.'/elements/'.$name.'.php';
            require_once 'views/'.$folder.'/panels/footer.php';
        }
        else
        {
            require_once 'views/includes.php';
            echo '<link rel="stylesheet" href="'.URL.'public/css/style.css" />';
            echo '<!-- VIEW CONTROLLER INCLUDE -->';
            echo "<script src=".JS.$name.".js></script>";
            echo "<link rel='stylesheet' href=".CSS.$name.".css />";
            echo '<!-- END VIEW CONTROLLER INCLUDE -->';
            echo '<!-- VIEW CONTROLLER HEADER RENDER -->';
            $this->renderHeader();
            echo '<!-- END VIEW CONTROLLER HEADER RENDER -->';
            require_once "views/index.php";
            require_once 'views/'.DEFAULT_VIEW.'/elements/'.$name.'.php';
            require_once 'views/'.DEFAULT_VIEW.'/panels/footer.php';
        }
    }
    function renderHeader($folder = false)
    {
        if($folder)
        {
            if(isset($_SESSION['admin']))
            {
               if($_SESSION['admin'] !== "false")
                {
                    require_once 'views/'.$folder.'/panels/lheader.php';
                }
                else
                {
                     require_once 'views/'.$folder.'/panels/lheader.php';
                }
            }
            else
            {    
                 require_once 'views/'.$folder.'/panels/header.php';
            }
        }
        else
        {
          if(isset($_SESSION['user']))
            {
               if($_SESSION['user'] !== "false")
                {
                    require_once 'views/'.DEFAULT_VIEW.'/panels/lheader.php';
                }
                else
                {
                     require_once 'views/'.DEFAULT_VIEW.'/panels/lheader.php';
                }
            }
            else
            {    
                 require_once 'views/'.DEFAULT_VIEW.'/panels/header.php';
            }
        }
    }
}
