<?php
	
	include('../config/paths.php');
	$con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
    if (mysqli_connect_errno()) 
    {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }

	if(isset($_POST['p1']))
	{
		$catname = $_POST['p1'];
  		$result = mysqli_query($con,"SELECT count(*) FROM `serviceprice` where ServiceFee='".$catname."'");
        $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
        $row = mysqli_fetch_row($result);
        
        if($row[0] === '0' || $row[0] === 0) 
        {
        	 $stmt = $con->prepare("INSERT INTO `serviceprice`(ServiceFee) VALUES (?)");
            if($stmt)
            {
                $stmt->bind_param('s',$catname);
                    $stmt->execute();
                    $newId = $stmt->insert_id;
                    $stmt->close();
                echo "Added new Price. Service Price ID:".$newId;
                echo '<script>document.location="'.URL.'cpanel/services/"</script>';	
            }else echo "error".$con->error;
        }
        else
        {
        	echo 'This Price is already registered.';
        }
    }
    else
    {
    	echo 'Incomplete Parameters';
    }