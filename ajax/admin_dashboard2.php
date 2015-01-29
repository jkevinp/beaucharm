<?php
    include('../config/paths.php');
    $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
    if (mysqli_connect_errno()) 
    {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $user_info = mysqli_query($con, "SELECT count(*),MONTH(AppointmentDate) as d from `booking`  where Status = 'On Queue' GROUP BY d");
    $dates = array();
    while ($user_info_array = mysqli_fetch_row($user_info))
    {
        //if(!in_array($user_info_array, $dates))
        array_push($dates, $user_info_array);
    }
    print(json_encode($dates));
            