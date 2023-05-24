<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camping List</title>
    
</head>
<body>
    <div class="container">
    <?php
	$stylesheet_url = "./style/displaycampstyle.css";
    ?>

    <?php
    
    include("connection.php");

    $username = $_SESSION['username'];
    
    $url = "style.css";
        echo "<link rel='stylesheet' href='{$stylesheet_url}'>";
//    $sql = "Select * from user where lname= 'Aye'  ";

//   $sql = "Select * from user where lname LIKE '%A%'  ";   // filter cha

    $sql = "Select * from pitch_info";  //all pitches

    $result = mysqli_query($connection,$sql);

    $num_rows = mysqli_num_rows($result);   //no connection
    $num_rows. "<hr>";

    if($num_rows == 0)
    echo "There is no pitch!<br>";
    else{
        for($i = 0; $i<$num_rows; $i++)
    {
        $count = $i+1;

        $record = mysqli_fetch_assoc($result);  //associative array
        echo "<div>";
        

        echo "<div class='name'>";
        echo "<br><h3>$count. " .$record['pitch_name']. "</h3>";
        echo "</div>";

        echo "<div class='location'>";
        echo "<br><iframe src= ' ".$record['location']." 'width = '400' height = '200'></iframe>" ;
        echo "</div>";

        echo "<div class = 'address'>";
        echo "<br>Address :" .$record['address'];     
        echo "</div>";

        echo "<div class='general'>";
        echo "<br>General :" .$record['general_info'];  
        echo "</div>";

        echo "<div class='country'>";
        echo "<br>Country :" .$record['country'];
        echo "</div>";
    //    echo "<br>Photo :" .$record['photo'];
        echo "<div class='img'>";
        echo "<br><img src=' ".$record['photo']." 'width='500'>";
        echo "</div>";


        if($username=="admin"){

            echo "<div class='link-style'>";

            echo "<a href='pitchform.php?id=".$record['id']." '>Insert</a>";

            echo " | <a href='updateform.php?id=".$record['id']." '>Update</a>";

            echo " | <a href='deletecamp.php?id=".$record['id']." '>Delete</a>";

            echo " | <a href='logout.php?id=".$record['id']." '>Logout</a>";

            echo "</div>";
            
        }
        else
        {
            echo "<a href='pitchform.php?id=".$record['id']." '>Insert</a>";

            echo "<br><a href='updateform.php?id=".$record['id']." '>Update</a>";
            
            echo "<br><a href='deletecamp.php?id=".$record['id']." '>Delete</a>";
        
            echo "<br><a href='logout.php'>Logout</a>";
     
        }
     
        echo "<hr></div>";
                
    }
    }
    ?>
    </div>
</body>
</html>