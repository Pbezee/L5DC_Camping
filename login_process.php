<?php
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            //default method GET... Auto Create Associative Array        
            //POST nyt thone yin POST nyt pyn u
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "userdb";

            $connection = mysqli_connect($host,$username,$password,$dbname);

            $username = $_POST['username'];
            $password = $_POST['password'];
            

            $sql = "Select * from user where username='$username' and password='$password' ";

            $result = mysqli_query($connection,$sql);

            $num_rows = mysqli_num_rows($result);

            if($num_rows == 0)
            {
                echo "Invalid User or Password!";
            }
            else{
             //   echo "Login Successfully";

                $_SESSION['username'] = $username;

                if($username == "admin")
                {
                    echo "Admin Login Successfully"."<br>";                  

                    echo "<a href='pitchform.php'>Camp Entry</a>"."<br>";
                    echo "<a href='displaycamp.php'>Camp List</a>"."<br>";
                    echo "<a href='searchform.php'>Search Camp</a>"."<br>";

                }
                else
                {
                    echo "Staff Login Successfully"."<br>";

                    echo "<a href='pitchform.php'>Camp Entry</a>"."<br>";
                    echo "<a href='displaycamp.php'>Camping List</a>"."<br>";
                    echo "<a href='searchform.php'>Search Camp</a>"."<br>";
                }


            }
            

        ?>
</body>
</html>