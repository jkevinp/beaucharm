<?php
	
	include('../config/paths.php');
	$con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
    if (mysqli_connect_errno()) 
    {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }

	if(isset($_POST['p1']) 
        &&isset($_POST['p2']) 
         &&isset($_POST['p3']) 
          &&isset($_POST['p4']) 
           &&isset($_POST['p5']) 
    )
	{
		$id = $_POST['p1'];
  		$result = mysqli_query($con,"SELECT count(*) FROM `service` where ServiceID='".$id."'");
        $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
        $row = mysqli_fetch_row($result);

        if($row[0] > '0' || $row[0] > 0) 
        {
        	 $stmt = $con->prepare("
                UPDATE service 
                SET 
                    ServicePriceID=?,
                    ServiceName =?,
                    Category =?,
                    Duration = ?
                where 
                    ServiceID = $id
                ");
            if($stmt)
            {
                $desc = $_POST['p3'];
                $time =  gmdate('H:i:s', ($_POST['p5'] * 60));
                $stmt->bind_param('ssss',
                    $_POST['p2'],
                    $_POST['p3'],
                    $_POST['p4'],
                    $time
                    );
                    $stmt->execute();
                    $newId = $stmt->insert_id;
                    $stmt->close();
                 echo "Updated Service";
                
               
            }else echo "error".$con->error;
        }
        else
        {
        	echo 'This service is does not exist';
        }
    }
    else
    {
    	echo 'Incomplete Parameters';
    }