<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <?php
        include("connection.php");

        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $msg = trim($_POST['msg']);

        $sql = "Insert into contact(fname,lname,email,phone,message) 
        values('$fname', '$lname', '$email', '$phone', '$msg') ";

        if(mysqli_query($connection, $sql))
                        {
                            echo "Successfully Sent";
                            echo "<script>window.close();</script>";
                        }
                        else
                            echo "Error Sending";   

    ?>
</body>
</html>