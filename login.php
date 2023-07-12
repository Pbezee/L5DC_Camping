<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/style.css?<?php echo time();?>">
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>

<body>
    <?php
        include("navbar.php");
    ?>

    <?php

        if(isset($_COOKIE['fail'])){
            echo "Login is blocked";            
        }
        else{

    ?>
    <div class="modal" id="id01">
        <form class='modal-content' action="login_process.php" method="POST">

            <div class="login-container">
                <h2>LOGIN</h2>
                <div class="uname"><input type="text" name="username" placeholder="Username"></div>
                <div class="pw"><input type="password" name="password" placeholder="Password"></div>

                <div class='login-bottom'><input id="submit" type="submit" name="submit" value="Login">
                    <br>
                    <a href="user_registerationform.php">Sign Up</a>
                    <div class="g-recaptcha" data-type="image" data-sitekey="6Lc0n40mAAAAAECs8_IY2TpqCPNNa57PBcC4A1qV">
                    </div>
                </div>
                <div>
                </div>
            </div>

        </form>
    </div>

    <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            window.location.href = "home.php";
        }
    }
    </script>

    <?php
        }
    ?>
    <script type="text/javascript">
    document.getElementById('page-name').innerHTML = "You are at <b>Login Page</b>";
    </script>
</body>

</html>