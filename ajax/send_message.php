<?php
    include('../config/paths.php');
    $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
    if (mysqli_connect_errno()) 
    {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }
    if(isset($_POST['p1']) && isset($_POST['p2']) && isset($_POST['p3']))
    {
        $email = $_POST['p1'];
        $recID = 0;
        if(isset($_POST['p4']))
        {
            $recID = $_POST['p4'];
        }
        $result = mysqli_query($con,"SELECT count(MessageID) FROM `message` where MessageTitle='".$email."'");
        $con =  new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die('could not establish database connection');
        $row = mysqli_fetch_row($result);
        if($row[0] === '0') 
        {

            $stmt = $con->prepare("INSERT INTO `message`(MessageTitle, MessageContent, MessageStatus, SenderID, ReceipentID) VALUES (?,?,?,?,?)");
            if($stmt)
            {
                $s = 'Unread';
                $stmt->bind_param('sssss',
                    $_POST['p1'],
                    $_POST['p2'],
                    $s,
                    $_POST['p3'],
                    $recID
                    );
                    $stmt->execute();
                    $newId = $stmt->insert_id;
                    $stmt->close();
                echo "Message Sent!";
            }else echo "error".$con->error;
    }
    else
    {
       echo "You already sent a message like this."; 
    }
}
else{
    echo "Ajax E: Incomplete parameters. ";
}
