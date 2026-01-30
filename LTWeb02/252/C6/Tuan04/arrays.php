<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays in PHP</title>
    <style>
        body {
            font-size: 25px;
        }
    </style>
</head>

<body>
    <?php
    $lang = array("Tiếng Việt", "Tiếng Anh", "Tiếng Pháp", "Tiếng Tây Ban Nha");
    echo "There are " . count($lang) . " languages.";
    echo "The first Language is $lang[0]<br>";
    // for ($i = 0; $i < count($lang); $i++) {
    //     echo $lang[$i] . " ";
    // }
    // echo "<br>";
    foreach($lang as &$v){
        $v = "Unknowned";
    }

    foreach($lang as $k => $v){
        echo "\$lang[$k] = $v<br>";
    }
    echo "<br>";

    $age = array("Peter Pan" => 18, "David" => 32, "Cindy" => 19, "Ronal" => 80);
    echo "Peter Pan is " . $age["Peter Pan"] . " years old!<br>";
    # Không truy xuất giá trị mảng Associative bằng index được
    # echo "Peter Pan is " . $age[0] . " years old!";
    foreach($age as $k => $v){
        echo "$k is $v years old!<br>";
    }
    echo "<br>";
    ?>
</body>

</html>