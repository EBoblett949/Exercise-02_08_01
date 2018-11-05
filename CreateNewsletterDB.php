<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_08_01
        Author: Eli Boblett
        Date: 11.02.18 
        CreateNewsletterDB.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Newsletter DB</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <h2>Create Newsletter DB</h2>
    <?php
        $hostName = "localhost";
        $userName = "adminer";
        $password = "south-proud-55";
        $BDName = "newsletter1";
        $DBConnect = mysqli_connect($hostName, $userName, $password);
        if (!$DBConnect) {
            echo "<p>Connection Error:" . mysql_connect_error() ."</p>\n";
        }
        else {
            $sql = "CREATE DATABASE $BDName";
            if (mysqli_query($DBConnect, $sql)) {
                echo "<p>You successfully created the \"$BDName\"" . "database.</p>\n";
            }
            else {
                echo "<p>Could not create the \"$BDName\"" . "database:" . mysqli_error($DBConnect) . ".</p>\n";
            }
            echo "<p>Closing Database Connection</p>\n";
            mysqli_close($DBConnect);
        }
    ?>
</body>
</html>