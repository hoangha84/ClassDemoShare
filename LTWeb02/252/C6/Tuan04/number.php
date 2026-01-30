<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number in PHP</title>
    <style>
        body{
            font-size: 25px;
        }
    </style>
</head>
<body>
    <?php 
    $a = 9_223_372_036_854_775_807;
    $b = 9.5;
    $c = "30km50";
    var_dump($a+1);
    echo "<br>";
    var_dump(PHP_INT_MAX);
    echo "<br>";
    var_dump(PHP_INT_MIN);
    echo "<br>";
    var_dump(PHP_INT_SIZE);
    echo "<br>";
    ?>
</body>
</html>