<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foreach in PHP</title>
    <style>
        body {
            font-size: 25px;
        }
    </style>
</head>

<body>
    <?php
    # Indexed Array
    $arr = array("PHP", "HTML", "CSS", "JavaScript");
    echo 'Sử dụng for:<br>';
    for ($i = 0; $i < count($arr); $i++) {
        echo "arr[$i] = " . $arr[$i] . '<br>';
    }

    echo 'Sử dụng foreach:<br>';
    foreach ($arr as $i => $x) {
        // echo "$x <br>";
        echo "arr[$i] = " . $x . '<br>';
    }

    # Associative Array
    $age = array("Peter"=>45, "Andy"=>32, "Cindy"=>18, "Alex"=>6);
    // echo $age['Cindy'];
    foreach($age as $key=>$value){
        echo "$key is $value years old!<br>";
    }

    # Byref in foreach

    // Không dùng tham chiếu
    foreach($arr as $x){
        $x = "C++";
    }
    var_dump($arr);
    echo "<br>";

    foreach($arr as &$x){
        $x = "C++";
    }
    var_dump($arr);

    
    ?>
</body>

</html>