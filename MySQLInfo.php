<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_08_01
        Author: Eli Boblett
        Date: 11.01.18 
        MySQLInfo.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <h2>MySQL Database Server Information</h2>
    <?php
        echo "<p>MYSQL Client Version: " . mysqli_get_client_info() . "</p>\n";
        $hostName = "localhost";
        $userName = "adminer";
        $password = "south-proud-55";
        $DBConnect = mysqli_connect($hostName, $userName, $password);
        if (!$DBConnect) {
            echo "<p>Connection Failed</p>\n";
        }
        else {
            echo "<p>MySQL Connection: " . mysqli_get_host_info($DBConnect) . "</p>\n";
            echo "<p>MySQL Protocol Version: " . mysqli_get_proto_info($DBConnect) . "</p>\n";
            echo "<p>MySQL Server Version: " . mysqli_get_server_info($DBConnect) . "</p>\n";
            echo "<p>Closing Database Connection</p>\n";
            mysqli_close($DBConnect);
        }
    ?>
</body>
</html>