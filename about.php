<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="./style/style.css?<?php echo time();?>" rel="stylesheet">
</head>

<body>
    <?php
    include("navbar.php");
?>
    <div class="about">
        <h1>About Us</h1>

        <h3>Global Wild Swimming and Camping welcomes you!</h3>

        <p>

            At Global Wild Swimming and Camping, we celebrate nature's beauty and the excitement of outdoor adventure.
            Our
            website is committed to giving you an immersive experience in wild swimming and camping, letting you to
            connect
            with nature in a genuinely unique and refreshing way.

            We understand the fascination of discovering pristine swimming locations and hidden gems around the world.
            That's why our team of adventurous souls has traversed the globe to compile a list of the most spectacular
            wild
            swimming spots. We offer a broad choice of sites that will leave you in amazement, from crystal-clear lakes
            and
            meandering rivers to isolated waterfalls and seaside coves.

        </p>
    </div>

    <?php
        include("footer.php");
?>
    <script type="text/javascript">
    document.getElementById('page-name').innerHTML = "You are at <b>About Page</b>";
    </script>
</body>

</html>