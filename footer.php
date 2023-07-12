<footer>
    <div class="footer-container">
        <div class="footer-column about">
            <h3>Social Media</h3>
            <p>Follow Our Social Media for more news about the campsite and activities.</p>
            <div class="social">
                <a href="https://www.facebook.com/" target="_blank">
                    <img src="./photos/facebook-logo.png" alt="facebook">
                </a>
                <a href="https://www.instagram.com/" target="_blank">
                    <img src="./photos/instagram-logo.png" alt="instagram">
                </a>
                <a href="https://www.twitter.com/" target="_blank">
                    <img src="./photos/twitter-logo.png" alt="twitter">
                </a>
                <a href="rss.php" target="_blank">
                    <img src="./photos/RSS-icon.png" alt="rss">
                </a>
            </div>
        </div>
        <div class="footer-column links">
            <h3>About</h3>
            <ul>
                <li><a href="#terms">Terms and Conditions</a></li>
                <li><a href="#faq">F.A.Q</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="policy.php">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="footer-column links">
            <h3>Support</h3>
            <ul>
                <li><a href="contactform.php">Contact Us</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2023 Camp. All rights reserved.</p>
    </div>


    <div id="page-name"></div>

    <div class="counter">
        <?php
            include("visitor_counter.php");
        ?>
    </div>

    <script src="footer.js"></script>
</footer>