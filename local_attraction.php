<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Attarction</title>
    <link href="./style/style.css?<?php echo time();?>" rel="stylesheet">
</head>

<body>

    <?php
    include("navbar.php");
    include("connection.php");

    $id = $_GET['id'];    
    
    $username = $_SESSION['username'];

    $lsql = "Select * from localattraction where camp_id='$id' ";  

    $lresult = mysqli_query($connection,$lsql);

    

    $num_rows = mysqli_num_rows($lresult);   
    $num_rows. "<hr>";

    if($num_rows == 0)
    echo "There is no Local Attraction";
    else{
       for($i = 0; $i<$num_rows; $i++){

        $lrecord = mysqli_fetch_assoc($lresult);

        echo "<div class='local-list'>";
        $psql = "Select * from pitch_info where id='$id' ";  

        $presult = mysqli_query($connection,$psql);

        $precord = mysqli_fetch_assoc($presult);
        echo "<h1>Local Attraction</h1>";

        echo "<div class='name'>";
        echo "<br><h4>" .$precord['pitch_name']. "</h4>";
        echo "</div>";

        echo "<div class='content'>";

        echo "<div class='img'>";
        echo "<br><img src=' ".$lrecord['image']." '>";
        echo "</div>";
        
        echo "<div class='description'>";
        echo "<h4>Description</h4>";
        echo $lrecord['description']." ";
        echo "</div>";
        
        echo"</div>";
         
        echo "</div>";

        echo "<div class='local-back'>";
        echo "<a href='detail.php?id=$id'>Back</a>";
        echo "</div>";
       
    }
    }
    ?>
    <?php
        include("footer.php");
    ?>
</body>

</html>