<?php
    session_start();

    include("connection.php");

    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
    }

    if($username == "admin")
    {
    include("connection.php");

    $id = $_POST['id'];

    $pname = $_POST['pitch_name'];
    $country = $_POST['country'];
    $general = $_POST['general'];
    
    $sql = "update pitch_info set  pitch_name = '$pname',country='$country',general_info='$general' where id=$id ";   //value

    if(mysqli_query($connection,$sql))
    echo "Successfully Updated<br>";

    else
    echo"Error in Update! <br>";
    }else{
        echo "Only Admin Can Access";
    }
?>