<?php

if(session_id() === '')session_start();
require 'libs/autoload.php';
if(MAINTENANCE)
{
	die(MAINTENANCE_MSG);
}
$app = new BootStrap();

