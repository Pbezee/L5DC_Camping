<?php
    session_start();

    session_destroy();

    echo "Logout Sucessfiully"."<br>";

    echo "<a href='login.php'>Login</a>"
?>