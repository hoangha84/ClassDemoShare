<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form PHP</title>
</head>

<body>
    <!-- <form action="formresult.php" method="post"> -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="nameID" name="name"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="emailID" name="email"><br><br>
        <input type="submit" value="Submit">
    </form>
    <div>
        <?php
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        echo "Hello $name ($email)<br>";
        var_dump($_POST);
        ?>
    </div>
</body>

</html>