<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <link rel="stylesheet" href="./style/style.css?<?php echo time();?>">
</head>

<body>


    <?php
        session_start();
        include("navbar.php");

        include("connection.php");

        if(isset($_SESSION['username']))
        {
            $username = $_SESSION['username'];
        }

        echo "<h1>Review</h1>";

        
        $usql = "select * from user where username='$username' ";
        $uresult = mysqli_query($connection,$usql);
        $urecord = mysqli_fetch_assoc($uresult);
        $uid = $urecord['id'];
        $uname = $urecord['username'];
   
        
        if(isset($_POST['submit']))
        {
            include("connection.php");

            $id = $_POST['id'];
            $msg = $_POST['msg'];
            $date = date("m/d/Y");
            
            $psql = "select pitch_name from pitch_info where id='$id' ";
            $presult = mysqli_query($connection,$psql);
            $precord = mysqli_fetch_assoc($presult);
            $pname = $precord['pitch_name'];
          
            $sql = "insert into review(user_id,username,camp_id,camp_name,message,date)values('$uid','$uname','$id','$pname','$msg','$date')";

            if(mysqli_query($connection,$sql))
            {
                echo "Successfully Sent";
                echo '<script>alert("Form submitted successfully!");</script>';

                
            }
            else
                echo "Error Submit Review";   
        }
        else{
            
            $id = $_GET['id'];

            $sql = "select * from pitch_info where id=$id ";

            $result = mysqli_query($connection,$sql);

            $record = mysqli_fetch_assoc($result);

            $cname = $record['pitch_name'];  
    ?>


    <form action="review.php" method="POST">

        <?php
        echo "<input type='hidden' name='id'  value='$id'>";
    ?>

        <div class="review-container">
            <?php
            echo "<div><p>$cname</p></div>";

            $id = $_GET['id']; 

            $lsql = "select username,message,date from review where camp_id='$id' ";
            $lresult = mysqli_query($connection,$lsql);
            $num_rows = mysqli_num_rows($lresult);
            $num_rows. "<hr>";

        if($num_rows == 0){
            echo "<p>There's No Review!</p>";
        }
        else{
            for($i=0; $i<$num_rows; $i+=1)
            {

                $lrecord = mysqli_fetch_assoc($lresult);
                echo  "<section class='review'>";
                    echo  "<div class='box'>";
                        echo "<div class='cmt-box'>";                      
                             echo "<div class='box-top'>";
                                        echo "<div class='profile'>";
                                            echo "<div class='name'>";               
                                                echo "<strong>" .$lrecord['username']."</strong>";
                                            echo "</div>";
                                        echo "</div>";
                                        echo "<div class = date>";
                                            echo "<p>".$lrecord['date']."</p>";
                                        echo "</div>";  
                                    echo "</div>";
                                            echo "<div class='comment'>";
                                                echo "<p>".$lrecord['message']."</p>";
                                            echo "</div>";
                            echo "</div>";
                        echo"</div>";
                    echo "</div>";
                echo "</section>";
            }
        }
        ?>
        </div>
        <div class='sub-btn'>
            <label for="msg">Send Review:</label>
            <textarea name="msg" id="msg" placeholder="Write Review"></textarea>
            <br>
            <div class="submit-container">
                <input type="submit" name="submit" value="Submit">
            </div>
        </div>


    </form>
    <?php
        }  
        include("footer.php");
    ?>
    <script type="text/javascript">
    document.getElementById('page-name').innerHTML = "You are at <b>Review Page</b>";
    </script>

</body>

</html>