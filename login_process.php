<?php
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            //default method GET... Auto Create Associative Array        
            //POST nyt thone yin POST nyt pyn u
        include("connection.php");

        if(isset($_POST['g-recaptcha-response'])){
            $captcha=$_POST['g-recaptcha-response'];
        }
  
          if(!$captcha){
            echo "<script>alert('Please check the the captcha form.');</script>";
            echo "<script>window.location='login.php';</script>";
          }
  
          $secretKey = "6Lc0n40mAAAAAMAoPr9sAsv_hL15Mg5IEtdazucZ";
  
           $ip = $_SERVER['REMOTE_ADDR'];
  
          // post request to server
          $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
  
          $response = file_get_contents($url);
          $responseKeys = json_decode($response,true);
  
          // should return JSON with success as true
        if($responseKeys["success"]) {
                  
        if(isset($_SESSION['counter']))
        {
            if($_SESSION['counter'] == 2)
            {
                setcookie("fail","1",time()+30);    //30>seconds
                include("timer.php");
            }
        }else{
            $_SESSION['counter'] = 0;
        }

            $username = $_POST['username'];
            $password = $_POST['password'];
            

            $sql = "Select * from user where username='$username' and password='$password' ";

            $result = mysqli_query($connection,$sql);

            $num_rows = mysqli_num_rows($result);

            if($num_rows == 0)
            {
                echo "Invalid User or Password!";
                
                $_SESSION['counter']++;
            }
            else{
             //   echo "Login Successfully";

                $_SESSION['username'] = $username;

                if($username == "admin")
                {
                    header("Location: home.php");                 
                    
                    echo "<a href='pitchform.php'>Camp Entry</a>"."<br>";
                    echo "<a href='displaycamp.php'>Camp List</a>"."<br>";
                    echo "<a href='searchform.php'>Search Camp</a>"."<br>";

                }
                else
                {
                    header("Location: home.php");        

                    echo "Staff Login Successfully"."<br>";

                    echo "<a href='pitchform.php'>Camp Entry</a>"."<br>";
                    echo "<a href='displaycamp.php'>Camping List</a>"."<br>";
                    echo "<a href='searchform.php'>Search Camp</a>"."<br>";
                }


            }

          } else {
                  echo "<script>alert('reCaptcha verification failed.');</script>";
          }  


        ?>
</body>
</html>