<?php
	
	include('../config/paths.php');
	$con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
    if (mysqli_connect_errno()) 
    {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }

	if(isset($_POST['catname'])){
		$catname = $_POST['catname'];
  		$result = mysqli_query($con,"SELECT count(*) FROM `service` where category='".$catname."'");
        $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
        $row = mysqli_fetch_row($result);
        if($row[0] !== '0') 
        {
        	$r = array();
            $result = mysqli_query($con, "SELECT * FROM `service` where category='".$catname."' and ServiceStatus=1");
            while($row  = $result->fetch_row())
            {
            	array_push($r, $row);
            }
            print(json_encode($r));
        }
    }