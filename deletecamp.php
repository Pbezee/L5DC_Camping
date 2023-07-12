<?php
    session_start();

    include("connection.php");

    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
    }

    if($username == "admin")
    {  

        $id = $_GET['id'];

        $sql = "delete from pitch_info where id=$id ";   //value

        if(mysqli_query($connection,$sql))
            header("Location: displaycamp.php");   

        else
        echo"Error in Delete! <br>";
    }
    else{
        echo "Only Admin Can Access";
    }

?>