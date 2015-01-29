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
		$name = $_POST['p1'];
  		$result = mysqli_query($con,"SELECT count(*) FROM `service` where ServiceName='".$name."'");
        $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
        $row = mysqli_fetch_row($result);

        if($row[0] === '0' || $row[0] === 0) 
        {
        	 $stmt = $con->prepare("INSERT INTO `service`(ServicePriceID,ServiceName,Category,Duration,serviceStatus) 
                VALUES (?,?,?,?,?)");
            if($stmt)
            {
                $desc = $_POST['p3'];
                $time =  gmdate('H:i:s', ($_POST['p5'] * 60));
                $status = 1;
                $phpTime = strtotime();
                $stmt->bind_param('sssss',
                    $_POST['p4'],
                    $_POST['p1'],
                    $_POST['p2'],
                    $time,
                    $status
                    );
                    $stmt->execute();
                    $newId = $stmt->insert_id;
                    $stmt->close();
                if($newId === '0' || $newId === 0)
                {
                    echo "Adding new Service Failed..";
                }else{
                $stmt = $con->prepare("INSERT INTO `servicedescription`(ServiceID,Description) VALUES(?,?)");
                if($stmt)
                {
                    $stmt->bind_param('ss',
                        $newId,
                        $desc
                        );
                      $stmt->execute();
                    $newIddesc = $stmt->insert_id;
                    $stmt->close();
                    echo "Added new service. Service ID:".$newId." with servicedescriptionID:".$newIddesc;
                    echo '<script>document.location="'.URL.'cpanel/services/"</script>';  
                }
                }echo "Insert Failed. error".$con->error;
            }else echo "error".$con->error;
        }
        else
        {
        	echo 'This service is already registered.';
        }
    }
    else
    {
    	echo 'Incomplete Parameters';
    }