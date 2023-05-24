<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Resteration</title>
</head>
<body>
        <?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "userdb";

    $connection = mysqli_connect($host,$username,$password,$dbname);
        
            $fname = trim($_POST['fname']);
            $lname = trim($_POST['lname']);
            $uname = trim($_POST['username']);
            $password = trim($_POST['password']);
            $confirmpw = trim($_POST['conpassword']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);          
            $country = $_POST['country'];
        
            if($password == $confirmpw)
            {
                    $sql_existing_user = "Select * from user where username='$uname' ";

                    $result = mysqli_query($connection,$sql_existing_user);

                    $num_rows = mysqli_num_rows($result);

                    if($num_rows == 0)
                    {
                        $sql = "insert into user(fname, lname, username, password, phone, email, country) 
                        values('$fname', '$lname', '$uname', '$password', '$phone', '$email', '$country') ";

                        if(mysqli_query($connection, $sql))
                            echo "User create complete";
        
                        else
                            echo "Error creating User";
                    }
                    else{
                        echo "This username is already Exist!";
                    }
            }
            else
            {
                echo "Password not match";
            }    
        ?>
</body>
</html>