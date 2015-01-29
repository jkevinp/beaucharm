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
        $p1 = $_POST['p1'];
        $result = mysqli_query($con,"SELECT count(*) FROM `message` where ReceipentID='".$p1."'");
        $row = mysqli_fetch_row($result);
        if($row[0] > 0) 
        {
            $r = array();
            $result = mysqli_query($con, 
            "SELECT 
                * 
            FROM 
                `message` 
            where 
                ReceipentID='".$p1."'");
            while($row  = $result->fetch_row())
            {
                array_push($r, $row);
            }
            print(json_encode($r));
        }
        else
        {
            echo "Empty";
        }
    }
    else
    {
        echo "Ajax E: Incomplete parameters. ";
    }
