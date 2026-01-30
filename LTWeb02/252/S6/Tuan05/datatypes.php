<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datatypes in PHP</title>
    <style>
        body {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <h1>Int</h1>
    <?php 
    $x = 9_223_372_036_854_775_807;
    var_dump($x);
    echo "<br>";
    $x+=1;
    var_dump($x);
    echo "<br>";
    ?>
    <h1>String</h1>
    <?php 
    $s = "This function performs a case-sensitive search.";
    var_dump(str_contains($s, "Case"));
    echo "<br>";
    var_dump(strpos($s, "function"));
    echo "<br>";
    echo "\$s: '$s'<br>";
    echo 'substr($s, 5, 8): ' . substr($s, 5, 8) . '<br>';
    echo 'substr($s, -22): ' . substr($s, -22) . '<br>';
    echo 'substr($s, -17, -8): ' . substr($s, -17, -8) . '<br>';    
    ?>
</body>
</html>