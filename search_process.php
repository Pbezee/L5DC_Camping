<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link href="./style/style.css?<?php echo time();?>" rel="stylesheet">
</head>

<body>
    <?php
        include("navbar.php");
        include("searchform.php");
    ?>

    <div class="display-container">

        <?php
    
    include("connection.php");
    
    

    if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    }
    $country = trim($_POST['country']);
    $sql = "Select * from pitch_info WHERE country LIKE '$country%' ";

    $result = mysqli_query($connection,$sql);
    $num_rows = mysqli_num_rows($result);   
    $num_rows. "<hr>";

    if($num_rows == 0)
    echo "There is no pitch!<br>";
    else{
        for($i = 0; $i<$num_rows; $i++)
    {
        $count = $i+1;

        $record = mysqli_fetch_assoc($result);

       

        echo "<div class='camp-container'>";

        
  
        echo "<div class='name'>";
        echo "<br><h3>$count. " .$record['pitch_name']. "</h3>";
        echo "</div>";

        echo"<div class='camp'>";

        echo "<div class='img'>";
        echo "<br><img src=' ".$record['photo']." '>";
        echo "</div>";

        echo "<div class='location'>";
        echo "<br><iframe src= ' ".$record['location']." '></iframe>" ;
        echo "</div>";

        echo "</div>";

        echo "<div class='country'>";
        echo "<br>Country :" .$record['country'];
        echo "</div>";
        
        if(is_null($username))
        {
            header("Location:login.php");
        }
        else if($username=="admin"){

            echo "<div class='link-style'>";

            echo "<a href='detail.php?id=".$record['id']." '>View More</a>";

           // echo "<a class='del' href='deletecamp.php?id=".$record['id']." '>Delete</a>";
           $id = $record['id'];

            echo "<a class='del' href='#' onclick='deleteConfirm(".json_encode($id).")'>Delete</a>"; 

            echo "</div>";
            echo "<hr>";
        }
        else
        {        
            echo "<div class='ulink'>";
          
            echo "<a href='detail.php?id=".$record['id']." '>View More</a>";

            echo"</div>";

            echo "<hr>";
        } 
        echo "</div>";
         
    }
    }
    ?>
    </div>

    <?php
    include("footer.php");
?>

</body>

</html>