<head>
    <link rel="stylesheet" href="./style/style.css<?php echo time();?>">
</head>
<div class="nav-top" id="top">
    <div class="nav-bar">
        <div class="nav-left">
            <a class="active" id="logo" href="home.php"><img src="./photos/camp_logo.png">
            </a>
        </div>

        <?php
               
                echo "<div class='nav-bar-right'>";      

                
          
                if(isset($_SESSION['username']))
                {
                    
                    $username = $_SESSION['username'];
                    if($username == "admin")
                    {
                        echo "<a  class='nav-bar-link' href='pitchform.php'><span class='fade'>Create Camp</span></a> ";
                        echo "<a  class='nav-bar-link' href='feature.php'><span class='fade'>Add Features</span></a> ";
                    }   
                }
                 echo "<a  class='nav-bar-link' href='displaycamp.php'><span class='fade'>Camp List</span></a> ";
                 echo "<a  class='nav-bar-link' href='about.php'><span class='fade'>About</span></a> ";
                 echo "<a  class='nav-bar-link' href='contactform.php'><span class='fade'>Contact</span></a> ";


                echo "<div class='dropdown'>";
                    echo "<a class='dropbtn'><img src='./photos/user-icon.png'></a>";
                        echo "<div class='dropdown-content'>";
                            
                            if(isset($_SESSION['username'])){
                                echo "<a  class='nav-bar-link' href='logout.php'><span class='fade'>Logout</span></a>";
                            }
                            else
                            {
                                echo "<a  class='nav-bar-link' href='login.php'><span class='fade'>Login</span></a>";
                                echo "<a  class='nav-bar-link' href='user_registerationform.php'><span class='fade'>Sign Up</span></a> ";
                            }
                         echo "</div>";
                    echo "</div>";
                            
                echo "</div>";
                ?>
    </div>
</div>