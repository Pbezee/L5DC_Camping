<?php

if (isset($_POST['submit'])) {

    $checkboxes = $_POST;

    // Remove the 'submit' key and 'uname' key from the checkboxes array
    unset($checkboxes['submit'], $checkboxes['uname']);

    // Get the string value of the checked checkboxes
    $string = implode(',', array_keys($checkboxes));

    echo $string;

}
?>

<form action="featurelist.php" method="POST">

    Enter Name:<input type="text" name='uname'>

    <?php
        include("connection.php");

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
    ?>
    <div>
        <input type="submit" value="Save" name="submit">
    </div>

</form>