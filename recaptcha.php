<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>reCaptcha</title>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>

<body>
    <h1>Google reCaptcha Demo</h1>

    <?php
//sitekey="6Lc0n40mAAAAAECs8_IY2TpqCPNNa57PBcC4A1qV"
//$secretKey = "6Lc0n40mAAAAAMAoPr9sAsv_hL15Mg5IEtdazucZ";
    if(isset($_POST['submit'])){

      if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
      }

        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }

        $secretKey = "6Lc0n40mAAAAAMAoPr9sAsv_hL15Mg5IEtdazucZ";

         $ip = $_SERVER['REMOTE_ADDR'];

        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);

        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);

        // should return JSON with success as true
        if($responseKeys["success"]) {
                
        } else {
                echo '<h2>ReCaptcha verification failed.</h2>';
        }  
    }
    else{

?>

    <form action="recaptcha.php" method="post">
        <input type="email" placeholder="Type your email" size="40"><br><br>
        <textarea name="comment" rows="8" cols="39"></textarea><br><br>
        <input type="submit" name="submit" value="Post comment"><br><br>

        <div class="g-recaptcha" data-type="image" data-sitekey="6Lc0n40mAAAAAECs8_IY2TpqCPNNa57PBcC4A1qV"></div>

    </form>

    <?php
    }
    ?>

</body>

</html>