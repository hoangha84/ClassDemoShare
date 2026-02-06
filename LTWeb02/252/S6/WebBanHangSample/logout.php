<?php
session_start();
unset($_SESSION["username"]);

echo 'You have cleaned session.';
header('refresh:3 ; url=index.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>

<body>
    Waiting for <b id="demo">3</b> sec...

    <script>
        let time = 2;
        setInterval(countDown, 1000);

        function countDown() {
            document.getElementById("demo").innerHTML = time;
            time--;
        }
    </script>
</body>

</html>