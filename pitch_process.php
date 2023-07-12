<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitch Register</title>
</head>

<body>
    <?php
            session_start();

            if(isset($_SESSION['username']))
            {
                $username = $_SESSION['username'];
            }

            if($username == "admin")
            {

            include("connection.php");

            

            $pname = mysqli_real_escape_string($connection,trim($_POST['pname']));
            $location = mysqli_real_escape_string($connection,trim($_POST['location']));
            $address = mysqli_real_escape_string($connection,trim($_POST['address']));
            $general = mysqli_real_escape_string($connection,trim($_POST['general']));
      //    $general = trim($_POST['general']);           
            $country = $_POST['country'];

            $price = mysqli_real_escape_string($connection,trim($_POST['price']));
            $description = mysqli_real_escape_string($connection,trim($_POST['description']));
            
            $checkboxes = $_POST;

            unset($checkboxes['pname'], $checkboxes['location'],$checkboxes['address'],$checkboxes['general'],$checkboxes['country'],$checkboxes['submit'],$checkboxes['price'],$checkboxes['description']);
        
            // Get the string value of the checked checkboxes
            $string = implode(',', array_keys($checkboxes));
    
            
            $photo_name = $_FILES['photo']['name'];

            $path = "photos/".$photo_name;

            $copied = copy($_FILES['photo']['tmp_name'],$path);
            
            if($copied){
                echo "Photo uploaded";
                echo $copied;
            }


            $lattr_photo_name = $_FILES['localphoto']['name'];

            $lapath = "photos/".$lattr_photo_name;

            $lacopied = copy($_FILES['localphoto']['tmp_name'],$lapath);
            
            if($lacopied){
                echo "Local Attr Photo uploaded";
            }
            

                    $sql_existing_name = "Select * from pitch_info where pitch_name='$pname' ";

                    $result = mysqli_query($connection,$sql_existing_name);

                    $num_rows = mysqli_num_rows($result);

                    if($num_rows == 0)
                    {
                        
                  
                        $sql = "insert into pitch_info(pitch_name,location,address,photo,general_info,price,country,feature) 
                        values('$pname', '$location', '$address','$path','$general','$price','$country','$string')";
                    
                        if(mysqli_query($connection, $sql)){
                            echo "Pitch registration complete"."<br>";
                            echo "<a href='pitchform.php'>OK</a>";

                            $isql = "SELECT * FROM pitch_info WHERE id = (SELECT MAX(id) FROM pitch_info)";
                            $iresult = mysqli_query($connection,$isql);
                            $irecord = mysqli_fetch_assoc($iresult);
                            $id = $irecord['id'];
                            echo $id;

                            $lsql = "insert into localattraction (camp_id,image,description)values('$id','$lapath','$description')";

                            mysqli_query($connection,$lsql);
                        }
                            
                        
                        else
                            echo "Error  registrarion";
                    }
                    else{
                        echo "This pitch is already Exist!";
                    }
                }
                else
                    echo "Only Admin Can Access";
                
        ?>
</body>

</html>