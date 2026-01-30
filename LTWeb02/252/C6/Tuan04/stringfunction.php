<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-size: 25px;
        }
    </style>
</head>
<body>
    <?php 
    $s = "PHP has many built-in string functions. Many. Many more. Much more.";
    # String Length
    echo 'strlen: ' . strlen($s) . "<br>";
    # Word Count
    echo 'str_word_count: ' . str_word_count($s) . "<br>";
    # Search For Text Within a String (PHP 7)
    echo 'strpos: ' . strpos($s, "Many") . "<br>"; 
    # Replace String
    echo 'str_replace: ' . str_replace("many", "much", $s) . "<br>"; 
    # Convert String into Array
    $arr = explode(".", $s);
    // print_r($arr);
    var_dump($arr);
    echo "<br>";
    echo $s;
    echo "<br>";
    # Slice a String
    // echo 'substr: ' . substr($s, 29, 9) . "<br>"; 
    $f = "built-in";
    echo 'substr: ' . substr($s, strpos($s, $f), strlen($f)) . "<br>"; 
    
    echo 'substr: ' . substr($s, strpos($s, $f)) . "<br>"; 
    
    echo 'substr: ' . substr($s, -21) . "<br>"; 

    echo 'substr: ' . substr($s, -21, -11) . "<br>"; 
    ?>
</body>
</html>