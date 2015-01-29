<?php
    include('../config/paths.php');
    $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
    if (mysqli_connect_errno()) 
    {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $email = $_POST['email'];
        $password = sha1(md5($_POST['password']));
        $result = mysqli_query($con,"SELECT count(*) FROM `admin` where EmailAddress='".$email."' and Password='".$password."'");
        $row = mysqli_fetch_row($result);
        if($row[0] > 0) 
        {
            $user_info = mysqli_query($con, "SELECT * from `admin` where EmailAddress='".$email."'");
            $user_info_array = mysqli_fetch_row($user_info);
            
            if(session_id() === '')
            {
                session_start();
             }
                  $_SESSION['admin'] = array(
                                            'admin_id' => $user_info_array[0], 
                                            'admin_name' => ucwords($user_info_array[4])." ".ucwords($user_info_array[3]));
          echo '1';
            exit();
        }
        else
        {
            echo "Invalid Login Credentials.";
        }
    }
    else
    {
        echo "Ajax E: Incomplete parameters. ";
    }
