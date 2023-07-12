<?php
    include("connection.php");

 

    function getUserIpAddr(){
            if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
            elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else{
        $ip = $_SERVER['REMOTE_ADDR'];
        }
         return $ip;
    }
     $ip = getUserIpAddr();     
     
    $qry = "SELECT * FROM visitedip WHERE ip = '$ip'";
    $result = mysqli_query($connection,$qry);
    $num = mysqli_num_rows($result);
    
        if ($num == 0){
            $qry3 = "INSERT INTO visitedip(ip) VALUES ('$ip')";
            mysqli_query($connection,$qry3);
            //echo "new ip register"; 

            $qry1 = "SELECT * FROM counter WHERE id = 0";
            $result1 = mysqli_query($connection,$qry1);

            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            $count = $row1['count'];
            $count = $count + 1;
      
            $qry2 = "UPDATE counter SET count='$count' WHERE id=0";
            $result2=mysqli_query($connection,$qry2);
        }else{
             $qry1 = "SELECT * FROM counter WHERE id = 0";
            $result1 = mysqli_query($connection,$qry1);
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            $count = $row1['count'];     
        }

 

$numlength = strlen((string)$count); 
?>
<?php 
     $count; 
     $stri = (string)$count;

 

     echo "view: " .$stri."<br>";
 ?>