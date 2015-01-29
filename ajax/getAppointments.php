<?php
	include('../config/paths.php');
	$con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
    if (mysqli_connect_errno()) 
    {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }

	if(isset($_POST['empid'])){
		$empid = $_POST['empid'];
  		$result = mysqli_query($con,"SELECT count(*) FROM `employee` where EmployeeID='".$empid."'");
        $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
        $row = mysqli_fetch_row($result);
        if($row[0] !== '0') 
        {
        	$r = array();
            $result = mysqli_query($con, "SELECT * FROM `employee` where EmployeeID='".$empid."'");
            while($row  = $result->fetch_row())
            {
            	array_push($r, $row);
            }
            print(json_encode($r));
        }
    }