<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="./style/style.css?<?php echo time();?>" rel="stylesheet">

</head>

<body>

    <?php
           include("navbar.php");
        ?>
    <div id="google_translate_element"></div>
    <header>
        <h1>Global Wild Swimming and Camping</h1>
    </header>

    <div class="content">
        <div class="Slideshow-container">
            <img class="Slide" src="./photos/slide-1.jpg">
            <img class="Slide" src="./photos/slide-2.jpg">
            <img class="Slide" src="./photos/slide-3.jpg">
            <img class="Slide" src="./photos/slide-4.jpg">
        </div>




        <div class="card-container">
            <div class="card">
                <div class="card-img">
                    <img src="./photos/mothervillage.jpg">
                </div>
                <div class="card-title">
                    <h3>Monther Village</h3>
                </div>
                <div class="card-bottom">
                    <p>Price</p>
                    <button class="card-btn">View Detail</button>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="./photos/yoma_camp.jpg">
                </div>
                <div class="card-title">
                    <h3>Yoma Horse Camp</h3>
                </div>
                <div class="card-bottom">
                    <p>Description</p>
                    <button class="card-btn">View Detail</button>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="./photos/Ben Nevis Holiday Park.jpg">
                </div>
                <div class="card-title">
                    <h3>Ben Nevis Holiday Park</h3>
                </div>
                <div class="card-bottom">
                    <p>Description</p>
                    <button class="card-btn">View Detail</button>
                </div>
            </div>
            <div class="card">
                <div class="card-img">
                    <img src="./photos/Monkey Tree Holiday Park.jpg">
                </div>
                <div class="card-title">
                    <h3>Monkey Tree Holiday Park</h3>
                </div>
                <div class="card-bottom">
                    <p>Description</p>
                    <button class="card-btn">View Detail</button>
                </div>
            </div>

        </div>

        <div class="about">
            <h2>Content</h2>
            <div class="content-text">
                <p>
                    With Global Wild Swimming and Camping, you can immerse yourself in the awe-inspiring world of wild
                    swimming and camping. Our website is your portal to a world of natural beauties, where you can
                    discover
                    hidden swimming holes and find the ideal camping locations to fuel your spirit of adventure.
                </p>
                <br>
                <p>
                    Set out on an adventure to explore breathtaking swimming spots throughout the world. From tranquil
                    alpine lakes to flowing rivers and coastal paradises, our carefully curated list of natural swimming
                    sites will take your breath away. Whether you're an experienced swimmer or new to the sport, our
                    thorough guidance and safety advice will ensure an unforgettable and safe voyage.
                </p>
            </div>

            <br>

            <h2>Wearble Techlonogy</h2>
            <div class="wear-tech">
                <div class="tech-container">
                    <img src="./photos/GPro Camera.png">
                    <p>G Pro Camera</p>
                </div>
                <div class="tech-container">
                    <img src="./photos/gps.png">
                    <p>GPS</p>
                </div>
                <div class="tech-container">
                    <img src="./photos/watch.jpg">
                    <p>Outdoor Watch</p>
                </div>
                <div class="tech-container">
                    <img src="./photos/headlamp.jpg">
                    <p>Head Lamp</p>
                </div>
                <div class="tech-container">
                    <img src="./photos/fitness tracker.jpg">
                    <p>Fitness Tracker</p>
                </div>
                <div class="tech-container">
                    <img src="./photos/Led Slaplit Bracelet.jpg">
                    <p>LED Bracelet</p>
                </div>
            </div>

            <br>

            <div class=" content-bottom">
                <div class="loaction">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.644496506624!2d103.84667717482941!3d1.389866798597011!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da17d2095c1be5%3A0x8f1adce24cacde4b!2sThe%20Camp%20Company!5e0!3m2!1sen!2smm!4v1687184416759!5m2!1sen!2smm"></iframe>
                </div>
                <br>
                <div>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/4YwDGz3fEpE"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>
            </div>

        </div>

    </div>

    <?php
            include("footer.php");
        ?>

    <script src="home.js"></script>
    <script src="footer.js "></script>

    <script type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }
    </script>


</body>

</html>