<?php
    include('../config/paths.php');
    $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
    if (mysqli_connect_errno()) 
    {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }
    if(
    	isset($_POST['email']) 
        && isset($_POST['password'])
        && isset($_POST['lastname' ])
        && isset($_POST['firstname'])
        && isset($_POST[ 'homeaddress'])
        && isset($_POST[ 'contactnumber'])
        && isset($_POST['civilstatus'])
        && isset($_POST['gender' ])
        && isset($_POST['birthdate'])
        && isset($_POST['serviceskill'])
        )
    {
        $email = $_POST['email'];
        $result = mysqli_query($con,"SELECT count(Username) FROM `employee` where Username='".$email."'");
        $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
        $row = mysqli_fetch_row($result);
        if($row[0] === '0' || $row[0] === 0) 
        {

            $stmt = $con->prepare("INSERT INTO `employee`(Username,Password,LastName,FirstName,Birthdate,Gender,HomeAddress,ContactNumber,CivilStatus,Status) VALUES (?,?,?,?,?,?,?,?,?,?)");
            if($stmt)
            {
                $pw = sha1(md5($_POST['password']));
                $status = 1;
                $stmt->bind_param('ssssssssss',
                    $_POST['email'],
                    $pw,
                    $_POST['lastname'],
                    $_POST['firstname'],
                    $_POST['birthdate'],
                    $_POST['gender'],
                    $_POST['homeaddress'],
                    $_POST['contactnumber'],
                    $_POST['civilstatus'],
                    $status);
                    $stmt->execute();
                    $newId = $stmt->insert_id;
                    $stmt->close();
               	if($newId === '0' || $newId === 0)
                {
                    echo "Account registration failed.";
                }
                else
                {
                	$stmt = $con->prepare("INSERT INTO `employeeskills`(EmployeeID,EmployeeSkills) VALUES(?,?)");
	                if($stmt)
	                {
	                    $stmt->bind_param('ss',
	                        $newId,
	                        $_POST['serviceskill']
	                        );
	                      $stmt->execute();
	                    $newIddesc = $stmt->insert_id;
	                    $stmt->close();
	                    echo "Added new Employee. EmployeeID:".$newId." with serviceskillid:".$newIddesc;
	                    echo '<script>document.location="'.URL.'cpanel/employees/"</script>';  
	                }
            	}echo "Insert Failed. error".$con->error;
            }else echo "error".$con->error;
    }
    else
    {
       echo "Account already registered."; 
    }
}
else{
    echo "Ajax E: Incomplete parameters. ";
}
