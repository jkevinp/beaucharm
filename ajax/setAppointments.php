<?php
    include('../config/paths.php');
    $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
    if (mysqli_connect_errno()) 
    {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    if(isset($_POST['cid']) && 
        isset($_POST['sid']) &&
        isset($_POST['spid']) &&
        isset($_POST['eid']) &&
        isset($_POST['apd']) &&
        isset($_POST['apid'])
    )
    {
        $dateArray = explode('/',$_POST['apd']);
        $date = $dateArray[2]."-".$dateArray[0]."-".$dateArray[1];
        $cid = $_POST['cid'];
        $result = mysqli_query($con,"SELECT count(BookingID) FROM `booking` where CustomerID='".$cid."' and (`Status` = 'On Queue' OR `Status` = 'On Transaction')");
        $row = mysqli_fetch_row($result);
        $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
        
        if(((int)($row[0])) < 4) 
        {

            $stmt = $con->prepare("INSERT INTO `booking`(CustomerID,ServiceID,ServicePriceID,EmployeeID,AppointmentDate,DateBooked,AppointmentID,Status) VALUES (?,?,?,?,?,?,?,?)");
            if($stmt)
            {
                $new = "On Queue";
                $stmt->bind_param('ssssssss',
                    $_POST['cid'],
                    $_POST['sid'],
                    $_POST['spid'],
                    $_POST['eid'],
                     $date ,
                    date("Y-m-d") ,
                    $_POST['apid'],
                    $new
                    );
                    if($stmt->execute())
                    {
                       
                        $newId = $stmt->insert_id;
                        echo $newId;
                    }
                    else echo "Save Error:".$con->error;
                    $stmt->close();
            }else echo "Save Error:".$con->error;
        }
        else echo "Too Many Appointment Reservation!"; 
    }
    else echo "Ajax E: Incomplete parameters. ";

