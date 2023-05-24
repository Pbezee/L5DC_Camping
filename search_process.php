<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>

        <?php

            include("connection.php");
        
            $country = trim($_POST['country']);

            $sql = "Select * from pitch_info where country='$country' ";

            $result = mysqli_query($connection,$sql);

            $num_rows = mysqli_num_rows($result);

            if($num_rows == 0)
            {
                echo " Camp not found";
            }
            else{
                for($i=0; $i<$num_rows; $i++)
                {
                    $record = mysqli_fetch_assoc($result);

                    echo "<br>Pitch Name: ".$record['pitch_name'];
                    
                    echo "<hr>";
                }
                
            }

        ?>

</body>
</html>