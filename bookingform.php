<html>
<link rel="stylesheet" href="./style/style.css?<?php echo time();?>">

<body>

    <?php
    session_start();

    include("connection.php");

    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
    }

    echo "<h1>Booking</h1>";


    $usql = "select * from user where username='$username' ";
    $uresult = mysqli_query($connection,$usql);
    $urecord = mysqli_fetch_assoc($uresult);
    $uid = $urecord['id'];
    $uname = $urecord['username'];  


    if(isset($_POST['submit']))
    {
        include("connection.php");

    $id = $_POST['id'];

    $pname = $_POST['pitch_name'];
    $indate = $_POST['indate'];
    $outdate = $_POST['outdate'];
    
    
    $sql = "insert into booking(User_ID,Username,Camp_ID,Camp_Name,StartDate,EndDate)values('$uid','$uname','$id','$pname','$indate','$outdate' )  ";  

    if(mysqli_query($connection,$sql))
    {
        echo "Successfully Booked<br>";
        echo "<a href='displaycamp.php'>OK</a>";
    }
    
    else
    echo "Error in Booking! <br>";
    }
    else{

    
    $id = $_GET['id'];

    $sql = "select * from pitch_info where id=$id ";

    $result = mysqli_query($connection,$sql);

    $record = mysqli_fetch_assoc($result);

    $cname = $record['pitch_name'];  

?>


    <form action="bookingform.php" method="POST">

        <?php
        echo "<input type='hidden' name='id'  value='$id'>";
    ?>

        <div>
            Camp Name:
            <?php
        echo "<input type='text' name='pitch_name' value='$cname' readonly >"
    ?>
        </div>
        <div>
            <label for="indate">CheckIn Date:</label>
            <input type="date" id="indate" name="indate" required>
        </div>
        <div>
            <label for="outdate">CheckOut Date:</label>
            <input type="date" id="outdate" name="outdate" required>
        </div>

        <br>
        <div>
            <input type="submit" name='submit' value="Book">
        </div>
    </form>
    <?php
    }
    ?>
    <script type="text/javascript">
    document.getElementById('page-name').innerHTML = "You are at <b>Booking Page</b>";
    </script>
</body>

</html>