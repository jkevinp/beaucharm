<?php
    include('../config/paths.php');
    $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
    if (mysqli_connect_errno()) 
    {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }
    if(isset($_POST['mode']))
    {
        if($_POST['mode'] ==='update')
        {
    if(    isset($_POST['email'])
        && isset($_POST['password'])
        && isset($_POST['lastname' ])
        && isset($_POST['firstname'])
        && isset($_POST[ 'homeaddress'])
        && isset($_POST[ 'businessaddress' ])
        && isset($_POST[ 'contactnumber'])
        && isset($_POST[ 'occupation'])
        && isset($_POST[ 'civilstatus'])
        && isset($_POST[  'gender' ])
        && isset($_POST[ 'birthdate']))
    {
        $email = $_POST['email'];
        $result = mysqli_query($con,"SELECT count(EmailAddress) FROM `customer` where EmailAddress='".$email."'");
        $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
        $row = mysqli_fetch_row($result);
        if($row[0] === '0') 
        {

            $stmt = $con->prepare("INSERT INTO `customer`(EmailAddress,Password,LastName,FirstName,Birthdate,Gender,HomeAddress,BusinessAddress,ContactNumber,BusinessContact,Occupation,CivilStatus) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
            if($stmt)
            {
                $stmt->bind_param('ssssssssssss',
                    $_POST['email'],
                    sha1(md5($_POST['password'])),
                    $_POST['lastname'],
                    $_POST['firstname'],
                    $_POST['birthdate'],
                    $_POST['gender'],
                    $_POST['homeaddress'],
                    $_POST['businessaddress'],
                    $_POST['contactnumber'],
                    $_POST['contactnumber'],
                    $_POST['occupation'],
                    $_POST['civilstatus']);
                    $stmt->execute();
                    $newId = $stmt->insert_id;
                    $stmt->close();
                echo "Account Registration Successful";
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
}
    else 
    {
        if(isset($_POST['userid']))
        {
            $result = mysqli_query($con,"SELECT count(*) FROM `customer` where CustomerID='".$_POST['userid']."'");
            $row = mysqli_fetch_row($result);
            if ($row[0] !== '0')
            {
                $result = mysqli_query($con, "SELECT * FROM `customer` where CustomerId='".$_POST['userid']."'");
                $row  = $result->fetch_row();
                print(json_encode($row));
            }else echo "No user found with the customer id of ".$_POST['userid'];
        }
        else echo "something went wrong getting id from async.";
        
    }
}