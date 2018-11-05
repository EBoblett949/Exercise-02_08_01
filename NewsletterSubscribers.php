<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_08_01
        Author: Eli Boblett
        Date: 11.02.18 
        NewsletterSubscribers.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Subscribers</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <h2>Newsletter Subscribers</h2>
    <?php
        $hostName = "localhost";
        $userName = "adminer";
        $password = "south-proud-55";
        $DBName = "newsletter1";
        $tableName = "subscribers";
        $DBConnect = mysqli_connect($hostName, $userName, $password);
        if (!$DBConnect) {
            echo "<p>Connection Error:" . mysqli_connect_error() ."</p>\n";
        }
        else {
            if (mysqli_select_db($DBConnect, $DBName)) {
                echo "<p>You successfully selected the \"$DBName\"" . "database.</p>\n";
                $sql = "SELECT * FROM $tableName";
                $result = mysqli_query($DBConnect, $sql);
                echo "<p>Number of rows in <strong>$tableName</strong>: " . mysqli_num_rows($result) . ".</p>\n";
                echo "<table width='100%' border='1'>\n";
                echo "<tr>";
                echo "<th> Subscriber ID";
                echo "<th> Subscriber Name";
                echo "<th> Subscriber E-Mail";
                echo "<th> Subscriber Date";
                echo "<th> Subscriber Confirm";
                echo "<tr>";
                echo "</table>\n";
                mysqli_free_result($result);
                }
            else {
                echo "<p>Could not select the \"$DBName\"" . "database:" . mysqli_error($DBConnect) . ".</p>\n";
            }
            echo "<p>Closing Database Connection</p>\n";
            mysqli_close($DBConnect);
        }
    ?>
</body>
</html>