<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_08_01
        Author: Eli Boblett
        Date: 11.02.18 
        CreateSubscribersTable.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Subscribers Table</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <h2>Create Subscribers Table</h2>
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
                $sql = "SHOW TABLES LIKE '$tableName'";
                $result = mysqli_query($DBConnect, $sql);
                if (mysqli_num_rows($result) == 0) {
                    echo "<p>The <strong>$tableName</strong>" . " table does not exist, creating table.</p>\n";
                    $sql = "CREATE TABLE $tableName" . " (subscriberID SMALLINT NOT NULL" .  
                        " AUTO_INCREMENT PRIMARY KEY," . 
                        " name VARCHAR(80), email VARCHAR(100)," . 
                        " subscribeDate DATE, confirmedDate DATE)";
                    $result = mysqli_query($DBConnect, $sql);
                    if (!$result) {
                        echo "<p>Unable to create the" . 
                            "<strong>$tableName</strong> table.</p>\n";
                        echo "Error:" . mysqli_error($DBConnect) . ".</p>\n";
                    }
                    else {
                        echo "<p>successfully created the" . 
                            "<strong>$tableName</strong> table.</p>\n";
                    }
                }
                else {
                    echo "<p>The <strong>$tableName</strong>" . " table already exists.</p>\n";
                }
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