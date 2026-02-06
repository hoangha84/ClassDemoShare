<?php 
session_start();
$active = $_SESSION['username']??"GUEST";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Information</title>
</head>
<body>
    <?php 
        echo "Hello $active!!!<br>";
        phpinfo();
    ?>
    <a href="form.php">Back to login</a>
</body>
</html>