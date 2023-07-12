<?php 

    include("connection.php");    
    header("Content-type: text/xml"); 

    echo "<?xml version='1.0' encoding='UTF-8'?>
<rss version='2.0'>
    <channel>
        <title>Global Wild Swimming and Camping</title>
        <description>Global Wild Swimming and Camping provides camping and swimming information for visitors.
        </description>
        <link>http://localhost/camping</link>";

        $sql = "select * from rss order by id desc";

        $result = mysqli_query($connection,$sql);
        $num_rows=mysqli_num_rows($result);

        for($i=0;$i<$num_rows;$i++) { $row=mysqli_fetch_assoc($result); echo "<item>" ; echo "<title>"
            .$row['title']."</title>
            ";
            echo "<description>".$row['description']."</description>";
            echo "
            <link>".$row['link']."</link>";

            echo "</item>";
            }

            echo "
    </channel>
</rss>";
?>