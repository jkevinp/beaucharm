<?php
define ("APP_NAME","beaucharm");
define("URL", "http://".$_SERVER['HTTP_HOST']."/".APP_NAME."/");
define("DB_HOST","localhost");
define("DB_NAME", 'beaucharm');
define("DB_USERNAME","root");
define("DB_PASSWORD", '');
define("CTRL", URL."controllers/");
define("LIBS", URL."libs/");
define("MDL",URL."models/");
define("PUB", URL."public/");
define("OBJ", URL."objects/");
define("VIW", APP_NAME."/view/");
define("SESSION_INFO","userID");
define("CSS",PUB."css/");
define("JS",PUB."js/");
define("IMAGES",PUB."images/");
define("ICONS",IMAGES."icons/");
define("SESSION_TIME",3600);
define("ACCESS","TRUE");
define("DEFAULT_VIEW", "customer"); //THE DEFAULT USER LEVEL
define("RESULT_LIMIT",5); //PAGINATION LIMIT
define("MAINTENANCE", false);
define("MAINTENANCE_MSG", "Disabled by admin");
date_default_timezone_set('Asia/Manila');