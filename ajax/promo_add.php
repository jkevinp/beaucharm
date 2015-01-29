<?php
	
	include('../config/paths.php');
	$con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
    if (mysqli_connect_errno()) 
    {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }

	if(isset($_POST['p1']) &&
        isset($_POST['p2']) &&
        isset($_POST['p3']) &&
        isset($_POST['p4'])

        )
	{
		$catname = $_POST['p1'];
  		$result = mysqli_query($con,"SELECT count(*) FROM `promo` where promoName='".$catname."'");
        $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
        $row = mysqli_fetch_row($result);

        if($row[0] === '0' || $row[0] === 0) 
        {
        	 $stmt = $con->prepare("INSERT INTO `promo`(couponID,promoName,ServiceID,mechanics,Status) VALUES (?,?,?,?,?)");
            if($stmt)
            {
                $stat = 1;
                $stmt->bind_param('sssss',
                    $_POST['p2'],
                    $_POST['p1'],
                    $_POST['p4'],
                    $_POST['p3'],
                    $stat

                    );
                    $stmt->execute();
                    $newId = $stmt->insert_id;
                    $stmt->close();
                echo "Added new Promo. ID:".$newId;
                echo '<script>document.location="'.URL.'cpanel/promos/"</script>';
            }else echo "error".$con->error;
        }
        else
        {
        	echo 'This promo is already registered.';
        }
    }
    else
    {
    	echo 'Incomplete Parameters';
    }