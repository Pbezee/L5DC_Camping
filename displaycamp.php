<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camp Detail</title>
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
   
    
    
    if(empty($_SESSION))
    {
        header("Location:login.php");
    }

    if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    }
    $sql = "Select * from pitch_info ";  

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
        echo "<br><h3>" .$record['pitch_name']. "</h3>";
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
    <script type="text/javascript">
    document.getElementById('page-name').innerHTML = "You are at <b>Camp List Page</b>";
    </script>
    <script type="text/javascript">
    function deleteConfirm(id) {

        if (confirm("Are you sure you want to delete?")) {
            window.location = "deletecamp.php?id=" + id;
        }
    }
    </script>
</body>

</html>