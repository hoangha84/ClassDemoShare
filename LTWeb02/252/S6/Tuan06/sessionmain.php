<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Start Page</title>
</head>

<body>
    <a href="sessionlink.php">Go to another page</a>
    <?php
    $_SESSION['name'] = "hmha";
    $_SESSION['email'] = "hmha@sgu.edu.vn";
    ?>
</body>

</html>