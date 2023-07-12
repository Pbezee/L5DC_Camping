<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>

<body>
    <form action="search_process.php" method="POST">

        <?php
            echo "<form action='search_process.php' method='POST' class='middle-search'>";
             echo "<div class='search-container'>";
            echo "<input type='text' placeholder='Search Camp' name='country'>";
        
            echo "</div>";
            echo "</form>";
        ?>


    </form>
    <script type="text/javascript">
    document.getElementById('page-name').innerHTML = "You are at <b>Camp List Page</b>";
    </script>
</body>

</html>