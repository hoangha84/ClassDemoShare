<?php declare(strict_types = 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strict types in PHP</title>
</head>
<body>
    <?php 
    function add(int $a, int $b){
        return $a+$b;
    }
    echo add(5, "123");
    ?>
</body>
</html>