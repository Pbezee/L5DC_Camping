    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact</title>
        <link rel="stylesheet" href="./style/style.css?<?php echo time();?>">
    </head>

    <body>
        <?php
        include("navbar.php");
    ?>



        <form action='contact_process.php' method="POST" class="contact-form">
            <div class="container">
                <h1>Contact Us</h1>

                <p>Need Some help?
                    We are looking for help your problems. </p>
                <h4>Send Message Directly</h4>
                <div>
                    <input type="text" name="fname" id="fname" placeholder="First Name" required>
                </div>

                <div>
                    <input type="text" name="lname" id="lname" placeholder="Last Name" required>
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div>
                    <input type="number" name="phone" id="phone" placeholder="Phone Number" required>
                </div>
                <div>
                    <textarea id="msg" name="msg" placeholder="Your Message"></textarea>
                </div>
                <div class="submit-container">
                    <input type="submit" value="Submit">
                </div>

                <a href=""></a>
            </div>

        </form>

        <?php
        include("footer.php");
    ?>
        <script type="text/javascript">
        document.getElementById('page-name').innerHTML = "You are at <b>Contact Page</b>";
        </script>
    </body>

    </html>