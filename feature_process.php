<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

            $feature = mysqli_real_escape_string($connection,trim($_POST['feature']));

            $sql_existing_name = "Select feature_name from featurelist where feature_name='$feature' ";

            $result = mysqli_query($connection,$sql_existing_name);

            $num_rows = mysqli_num_rows($result);

            if($num_rows == 0)
            {
                $sql = "insert into featurelist(feature_name) 
                        values('$feature')";

                 if(mysqli_query($connection, $sql))
                    echo "Feature Added"."<br>";
                        
                    else
                        echo "Error Adding Feature";
                    }
                    else{
                        echo "This feature is already Exist!";
                    }
                }
                else
                    echo "Only Admin Can Access";
                
        ?>
</body>

</html>