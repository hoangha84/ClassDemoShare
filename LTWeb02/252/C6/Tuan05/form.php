<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with PHP</title>
</head>

<body>
    <a href="account.php">Go to account page</a>
    <?php
    echo $_SERVER['PHP_SELF'];
    ?>
    <!-- <form action="form.php" method="get"> -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" id="usernameID" name="username">
        <input type="password" id="passwordID" name="password">
        <input type="submit" value="Login" name="login">
        <input type="submit" value="Forget password?" name="forget">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // if (isset($_GET['username'])) {
        if (isset($_REQUEST['login'])) {
            $urs = htmlspecialchars($_REQUEST['username']);
            $pwd = htmlspecialchars($_REQUEST['password']);
            echo "Your username is $urs and password is $pwd. <br>";
            $_SESSION['username'] = $urs;
        }
        if (isset($_REQUEST['forget'])) {
            echo "Need to reset password?<br>";
        }
    }
    ?>

</body>

</html>