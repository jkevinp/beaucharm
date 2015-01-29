<?php
    include('../config/paths.php');
    $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
    if (mysqli_connect_errno()) 
    {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }
    if(isset($_POST['p1']) 
        && isset($_POST['p2'])
        && isset($_POST['p3' ])
        && isset($_POST['p4'])
        && isset($_POST['p5']) 
        && isset($_POST['p6'])
        && isset($_POST['p7'])
        && isset($_POST['p8']))
    {
        $id = $_POST['p1'];
        $result = mysqli_query($con,"SELECT count(*) FROM `employee` where EmployeeID='".$id."'");
        $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
        $row = mysqli_fetch_row($result);
        if($row[0] === '0' ||$row[0] === 0) 
        {
            echo "Employee doesnt exist."; 
        }
        else
        {
             $stmt = $con->prepare("
                UPDATE 
                    `employee` 
                SET 
                    Username=?, 
                    LastName = ? ,
                    FirstName=?,
                    Birthdate=?,
                    Gender=?,
                    HomeAddress=?,
                    ContactNumber=?,
                    CivilStatus=?
                WHERE 
                    EmployeeID ='".$id."'");
                if($stmt)
                {
                    $stmt->bind_param('ssssssss',
                        $_POST['p2'],
                        $_POST['p3'],
                        $_POST['p4'],
                        $_POST['p5'],
                        $_POST['p6'],
                        $_POST['p7'],
                        $_POST['p8'],
                        $_POST['p9']
                        );
                        $stmt->execute();
                        $newId = $stmt->insert_id;
                        $stmt->close();
                    echo "Updated Employee Account";
                }else echo "error".$con->error;
        }
}
else{
    echo "Ajax E: Incomplete parameters. ";
}