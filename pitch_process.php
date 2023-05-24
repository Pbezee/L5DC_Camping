<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitch Register</title>
</head>
<body>
        <?php
            session_start();

            if(isset($_SESSION['username']))
            {
                $username = $_SESSION['username'];
            }

            if($username == "admin")
            {

            include("connection.php");

            $pname = mysqli_real_escape_string($connection,trim($_POST['pname']));
            $location = mysqli_real_escape_string($connection,trim($_POST['location']));
            $address = mysqli_real_escape_string($connection,trim($_POST['address']));
            $general = mysqli_real_escape_string($connection,trim($_POST['general']));
      //      $general = trim($_POST['general']);           
            $country = $_POST['country'];

            
            $photo_name = $_FILES['photo']['name'];

            $path = "photos/".$photo_name;

            $copied = copy($_FILES['photo']['tmp_name'],$path);
            
            if($copied){
                echo "Photo uploaded";
            }

                    $sql_existing_name = "Select * from pitch_info where pitch_name='$pname' ";

                    $result = mysqli_query($connection,$sql_existing_name);

                    $num_rows = mysqli_num_rows($result);

                    if($num_rows == 0)
                    {
                        $sql = "insert into pitch_info(pitch_name,location,address,general_info,photo, country) 
                        values('$pname', '$location', '$address','$general','$path','$country')";

                        if(mysqli_query($connection, $sql))
                            echo "Pitch registration complete"."<br>";
                        
                        else
                            echo "Error  registrarion";
                    }
                    else{
                        echo "This pitch is already Exist!";
                    }
                }
                else
                    echo "Only Admin Can Access";
                
        ?>
</body>
</html>