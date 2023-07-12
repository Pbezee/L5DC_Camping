<html>

<head>
    <link href="./style/style.css?<?php echo time();?>" rel="stylesheet">
</head>

<body>

    <?php
    session_start();

    include("connection.php");

    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
    }

    if($username == "admin")
    {
        echo "<h1>Camp Update</h1>";

    if(isset($_POST['submit']))
    {
        include("connection.php");

    $id = $_POST['id'];

    $pname = $_POST['pitch_name'];
    $country = $_POST['country'];
    $general = $_POST['general'];
    $price = $_POST['price'];
    $photo = $_POST['photo'];
    $description = $_POST['description'];

    $checkboxes = $_POST;

    var_dump($checkboxes);

    // Remove the key from the checkboxes array
    unset($checkboxes['pname'], $checkboxes['location'],$checkboxes['address'],$checkboxes['general'],$checkboxes['country'],$checkboxes['submit'],$checkboxes['id'],$checkboxes['pitch_name']);

    // Get the string value of the checked checkboxes
    $string = implode(',', array_keys($checkboxes));

    $lsql = "update localattraction set image='$photo', description='$description' ";

    mysqli_query($connection,$sql);
    
    $sql = "update pitch_info set  pitch_name = '$pname',country='$country',general_info='$general',feature='$string' where id=$id ";   //value

    if(mysqli_query($connection,$sql)){
        echo "Successfully Updated<br>";
        header("Location:displaycamp.php");
    }
    else{
        echo"Error in Update! <br>";
    }
    }
    else{


    $id = $_GET['id'];

    $sql = "select * from pitch_info where id=$id ";

    $result = mysqli_query($connection,$sql);

    $record = mysqli_fetch_assoc($result);

    $cname = $record['pitch_name'];     //$record htl ka name ka table htl ka name phit ya ml!

    $country = $record['country'];

    $general = $record['general_info'];

    $price = $record['price'];

    $lsql = "Select * from localattraction where camp_id='$id' ";  

    $lresult = mysqli_query($connection,$lsql);

    $lrecord = mysqli_fetch_assoc($lresult);

    $description = $lrecord['description'];

    $localphoto = $lrecord['image'];

?>


    <form action="updateform.php" method="POST">

        <?php
        echo "<input type='hidden' name='id'  value='$id'>";
    ?>

        <div>
            Camp Name:
            <?php
        echo "<input type='text' name='pitch_name' value='$cname'>"
    ?>
        </div>

        <div>
            General:
            <?php
       echo "<textarea name ='general' >$general</textarea>";
    ?>
        </div>

        <div>
            Price:
            <?php
            echo "<input type='text' name='price' value='$price'>"
            ?>
        </div>

        <div>
            Country:

            <select name="country">
                <option>Choose Ur country</option>


                <?php
                 
                 $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
  
  
                // sort($country);
             
                 foreach ($countries as $key => $value) 
                 {
                      if($country==$value)
                      {
                          echo "<option value='$value' selected>$value</opiton>";
                      }
                      else
                          echo "<option value='$value'>$value</opiton>";
              
                 }
  
             ?>
            </select>
        </div>


        <br>


        <?php
                echo "<div>";

                echo "<h4>Features</h4>";
                echo "<br>";
                
                $sql = "Select feature_name from featurelist";

                $result = mysqli_query($connection,$sql);

                $num_rows = mysqli_num_rows($result);  

                for($i=0; $i<$num_rows; $i+=1)
                {
                $record = mysqli_fetch_assoc($result);

                foreach($record as $key => $value){
                    echo "<input type='checkbox' name='$value'>$value";
                }
                }
                        
                echo "</div>";
            ?>
        <br>
        <br>
        <div>
            <h4>Local Attraction</h4>

            <label for="photo">Photo: </label>
            <?php
                echo "<img class='localphoto' src='$localphoto'>";
            ?>
            <br> <input type="file" name="photo" id="photo">
        </div>
        <br>
        <div>
            Description:
            <?php
            echo "<input type='text' name='description' value='$description'>"
            ?>
        </div>

        <div>
            <input type="submit" name='submit' value="Update">
        </div>
        <div>
            <?php
            echo "<button><a class='cancel' href='detail.php?id=$id '>Cancel</a></button>";
            ?>
        </div>




    </form>

    <?php 
    }
}
else{
    echo "Only Admin Can Access";
}
?>
    <script type="text/javascript">
    document.getElementById('page-name').innerHTML = "You are at <b>Camp Update Page</b>";
    </script>
</body>

</html>