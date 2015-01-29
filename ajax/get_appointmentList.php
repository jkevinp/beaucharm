<?php
    include('../config/paths.php');
    $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
    if (mysqli_connect_errno()) 
    {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    if(
    isset($_POST['empid']) && 
    isset($_POST['date']) && 
    isset($_POST['catname']) &&
    isset($_POST['CustomerID']) &&
    isset($_POST['selectedServiceId'])
    )
    {
        $dateArray = explode('/',$_POST['date']);
        $empid = $_POST['empid'];
        $date = $_POST['date'];
        $catname = $_POST['catname'];
        $date = $dateArray[2]."-".$dateArray[0]."-".$dateArray[1];
        //Checking if existing appointment was set
        $sql = 
            "SELECT count(*) 
            FROM 
                `employee`,
                `employeeskills`
            WHERE 
            employee.EmployeeID='".$empid."' AND 
            employeeskills.EmployeeID = '".$empid."'";

        $sql = "SELECT count(*) from `booking` where CustomerID='".$_POST['CustomerID']."' and appointmentDate='$date' and serviceID='".$_POST['selectedServiceId']."'";
        $result = mysqli_query($con,$sql);
        $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
        $row = mysqli_fetch_row($result);


        if($row[0] === '0') //Avoid double booking
        {
            
            $alreadySelectedApId = array();
            $sql = 
           "SELECT
                b.EmployeeID,
                b.appointmentID
            FROM
                `booking` b,
                `employeeskills` es,
                `employee` e
            WHERE 
                b.appointmentDate = '$date' 
                and
                b.EmployeeID = '$empid' 

            ";
            
            if(!$result = mysqli_query($con,$sql))echo $con->error;
            else while($row  = $result->fetch_row())
                        if(!in_array($row,$alreadySelectedApId))
                            array_push($alreadySelectedApId, $row);
                
            
            //check the schedules avaiable on date $date
            $r= array();
            $sql = 
            "SELECT 
                e.FirstName as empFname, 
                e.LastName as empLname,
                e.EmployeeID as eid,
                a.appointmentID as apid,
                a.from as time_from,
                a.to as time_to
            FROM 
                `employee` e,
                `appointment` a
            WHERE 
                e.EmployeeID = '$empid' and 
                e.Status=1
                "
               ; 
            $removed  = array();
            if(!$result = mysqli_query($con,$sql))
            {
                echo $con->error;
            }
            else
            {
                while($row  = $result->fetch_row())
                    if(!in_array($row, $r)) array_push($r, $row);
                for($x = 0 ; $x < count($r); $x++)
                {
                    for($y = 0 ; $y < count($alreadySelectedApId); $y++)
                    {
                       if($r[$x][3] === $alreadySelectedApId[$y][1])
                        {
                            array_push($removed,$r[$x][3]);
                            $r[$x][3] = '!'; //connected to myaccount.js
                            
                            //unset($r[$x]);
                            break;
                        }
                    }   
                }
               if(count($r) > 0)print(json_encode($r));
                else echo "No results returned."."<br/>params:".$date."<br/>".$sql;
            
            }
        }else echo 'You Already booked this service.';
        
    }
    else die("Incomplete parameters");

    //SQL SELECTS ALL EMPLOYEES WITH SCHED OF DATE
    /* $sql = 
            "SELECT 
                e.FirstName as empFname, 
                e.LastName as empLname,
                e.EmployeeID as eid,
                a.appointmentID as apid,
                a.from as time_from,
                a.to as time_to
            FROM 
                `EMPLOYEE` e, 
                `BOOKING` b,
                `APPOINTMENT` a
            WHERE 
                b.appointmentDate != '".$date."' and
                a.appointmentID = b.appointmentID and
                e.EmployeeID = b.EmployeeID and
                e.EmployeeID='".$empid."'";*/