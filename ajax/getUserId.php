<?php
	if(session_id()==='')session_start();
	if(isset($_SESSION['user']['userid']))
	{
		echo $_SESSION['user']['userid'];
	}
	else if(isseT($_GET['customerid']))
	{
		echo $_GET['customerid'];
	}else echo "-1";