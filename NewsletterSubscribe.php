<!doctype html>
<html>
<head>
    <!-- 
        Exercise 02_08_01
        Author: Eli Boblett
        Date: 11.02.18 
        NewsletterSubscribe.php
     -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Subscribe</title>
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <h2>Newsletter Subscribe</h2>
    <?php
        $hostName = "localhost";
        $userName = "adminer";
        $password = "south-proud-55";
        $DBName = "newsletter1";
        $tableName = "subscribers";
        $subscriberName = "";
        $subscriberEmail = "";
        $showForm = false;
        if (isset($_POST['submit'])) {
            $formErrorCount = 0;

            // check for name
            if (!empty($_POST['subName'])) {
                $subscriberName = stripslashes($_POST['subName']);
                $subscriberName = trim($subscriberName);
                if (strlen($subscriberName) == 0) {
                    ++$formErrorCount;
                    echo "<p>You must include your" . " <strong>Name</strong>.</p>\n";
                }
            }
            else {
                ++$formErrorCount;
                echo "<p> Form submittal error, no" . " <strong>Name</strong> field!</p>\n";
            }
            // check for email
            if (!empty($_POST['subEmail'])) {
                $subscriberEmail = stripslashes($_POST['subEmail']);
                $subscriberEmail = trim($subscriberEmail);
                if (strlen($subscriberEmail) == 0) {
                    ++$formErrorCount;
                    echo "<p>You must include your" . " <strong>Email</strong>.</p>\n";
                }
            }
            else {
                ++$formErrorCount;
                echo "<p> Form submittal error, no" . " <strong>Email</strong> field!</p>\n";
            }

            if ($formErrorCount == 0) {
                $showForm = false;
                $DBConnect = mysqli_connect($hostName, $userName, $password);
                if (!$DBConnect) {
                    echo "<p>Connection Error:" . mysqli_connect_error() ."</p>\n";
                }
                else {
                    if (mysqli_select_db($DBConnect, $DBName)) {
                        echo "<p>You successfully selected the \"$DBName\"" . " database.</p>\n";
                        $subscriberDate = date("Y-m-d");
                        $sql = "INSERT INTO $tableName" . " (name, email, subscribeDate)" . 
                        " VALUES ('$subscriberName'," . 
                        " '$subscriberEmail'," . 
                        " '$subscriberDate')";
                        $result = mysqli_query($DBConnect, $sql);
                        if (!$result) {
                            echo "<p>Unable to insert the values" . 
                            " into the <strong>$tableName</strong> table.</p>\n";
                            echo "<p>Error code <strong>" . mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . 
                            " </strong></p>\n";
                        }
                        else {

                        }
                    }
                    else {
                        echo "<p>Could not select the \"$DBName\"" . " database:" . mysqli_error($DBConnect) . ".</p>\n";
                        }
                    echo "<p>Closing Database Connection</p>\n";
                    mysqli_close($DBConnect);
                }
            }
            else {
                $showForm = true;
            }
        }
        else {
            $showForm = true;
        }
        if ($showForm) {
    ?>
    <form action="NewsletterSubscribe.php" method="POST">
        <p><strong>Your Name:</strong><br>
        <input type="text" name="subName" 
        value="<?php echo "$subscriberName"; ?>">
        </p>

        <p><strong>Your Email:</strong><br>
        <input type="text" name="subEmail" 
        value="<?php echo "$subscriberEmail"; ?>">
        </p>

        <p>
        <input type="submit" name="submit" value="Submit">
        </p>
    </form>
    <?php
        }
    ?>
</body>
</html>