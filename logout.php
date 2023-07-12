<?php
    session_start();

    session_destroy();

    echo "Logout Sucessfiully"."<br>";

    header("Location:login.php");
?>