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
    ?>

    <div class='inside-link'>
        <div class="local-link">
            <a class='nav-bar-link' href="#local"><span class='fade'>Local Attraction</span></a>
        </div>
        <div class="local-link">
            <a class='nav-bar-link' href='#general'><span class='fade'>General</span></a>
        </div>
        <div class="local-link">
            <a class='nav-bar-link' href='#feature'><span class='fade'>Features</span></a>
        </div>
    </div>




    <div class="detail-container">

        <?php
    
    include("connection.php");

    $id = $_GET['id'];    
    
    $username = $_SESSION['username'];

    $sql = "Select * from pitch_info where id='$id' ";  

    $result = mysqli_query($connection,$sql);

    $num_rows = mysqli_num_rows($result);   
    $num_rows. "<hr>";


    if($num_rows == 0)
    echo "There is no pitch!<br>";
    else{
        for($i = 0; $i<$num_rows; $i++)
    {
        $record = mysqli_fetch_assoc($result);

        echo "<div class='list'>";

        echo "<div class='name'>";
        echo "<br><h3>" .$record['pitch_name']. "</h3>";
        echo "</div>";

        echo "<div class='detail-image'>";
        echo "<div class='img'>";
        echo "<br><img src=' ".$record['photo']." '>";
        echo "</div>";
  
        echo "</div>";

        echo "<h2>Location</h2>";
        echo "<div class='location'>";
        echo "<br><iframe src= ' ".$record['location']." '></iframe>" ;
        echo "</div>";

        echo "<div class = 'address'>";
        echo "<h4>Address:</h4>";
        echo $record['address'];     
        echo "</div>";
        echo "<br>";

        echo "<div  id='general'>";
        echo "<h2>General</h2>";
        echo "<div class='general'>";
        echo $record['general_info'];  
        echo "</div>";
        echo "</div>";
        
        echo "<br>";

        echo "<div class='price'>";
        echo "<h3>Price:</h3>";
        echo $record['price'];
        echo "</div>";
        echo "<br>";

        
        echo "<div class='country'>";
        echo "<h3>Country:</h3>";
        echo $record['country'];
        echo "</div>";
        echo "<br>";

        echo "<h2>Avaliable Features</h2>";
        echo "<div id='feature' class='feature'>";   
        echo $record['feature'];
        echo "</div>";

    $lsql = "Select * from localattraction where camp_id='$id' ";  

    $lresult = mysqli_query($connection,$lsql);

    

    $num_rows = mysqli_num_rows($lresult);   
    $num_rows. "<hr>";

    if($num_rows == 0)
    echo "There is no Local Attraction";
    else{
       for($i = 0; $i<$num_rows; $i++){

        $lrecord = mysqli_fetch_assoc($lresult);

        echo "<div id='local' class='local-list'>";
        $psql = "Select * from pitch_info where id='$id' ";  

        $presult = mysqli_query($connection,$psql);

        $precord = mysqli_fetch_assoc($presult);
        echo "<h2>Local Attraction</h2>";

        echo "<div class='content'>";

        echo "<div class='local-img'>";
        echo "<br><img src=' ".$lrecord['image']." '>";
        echo "</div>";
        
        echo "<div class='description'>";
        echo "<h4>Description</h4>";
        echo $lrecord['description']." ";
        echo "</div>";
        
        echo"</div>";
         
        echo "</div>";
        echo "<br>";
    }
    }
        

        
        if($username=="admin"){

            echo "<div class='link-style'>";

            echo "<br><a href='bookingform.php?id=".$record['id']." '>Book</a>";

            echo "<br><a href='local_attraction.php?id=".$record['id']." '>Local Attraction</a>";

            echo "<br><a href='review.php?id=".$record['id']." '>Review</a>";

            echo "<a href='updateform.php?id=".$record['id']." '>Update</a>";

            $id = $record['id'];

            echo "<a class='del' href='#' onclick='deleteConfirm(".json_encode($id).")'>Delete</a>"; 

            echo "</div>";

            echo "<div class='local-back'>";
            echo "<a href='detail.php?id=$id'>Back</a>";
            echo "</div>";

           
            
        }
        else if(is_null($username))
        {
            header("Location:login.php");
        }
        else
        {        
            echo "<div class='u-link-style'>";

            echo "<br><a href='bookingform.php?id=".$record['id']." '>Book</a>";

            echo "<br><a href='review.php?id=".$record['id']." '>Review</a>";
    
            echo "<a href='detail.php?id=$id'>Back</a>";
        
            echo "</div>";

            echo "<div class='local-back'>";
            echo "<a href='detail.php?id=$id'>Back</a>";
            echo "</div>";
        
        } 
        echo "<hr></div>";
                
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
    <script type="text/javascript">
    document.getElementById('page-name').innerHTML = "You are at <b>Detail Page</b>";
    </script>
</body>

</html>