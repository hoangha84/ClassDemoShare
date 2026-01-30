<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Variables Scope</title>
    <style>
        body {
            font-size: 25px;
        }
    </style>
</head>
<body>
    <?php 
    # Global scope
    $name = "Alex";
    echo "Hello $name!<br>";
    function sayHello(){
        # Local scope
        # echo "Hello $name!<br>"; 
        echo "Hello $GLOBALS[name]!<br>"; 
        echo "Hello ". $GLOBALS['name']. "!<br>"; 
    }

    function appendName(){
        static $name = "David";
        $name .= " Copperfield";
        echo "Hello $name!<br>";
    }

    sayHello();

    appendName();
    appendName();
    appendName();
    appendName();
    appendName();

    echo "Hello $name!<br>";

    # print vs echo
    echo "<h2>echo & print</h2>";
    #echo "Hello $name!<br>";
    // echo "Hello " . $name . "!<br>";
    echo "Hello " , $name , "!<br>","A ","A ","A ","A ","A ","A ","A ","A ","A ","A ","A ","A ","A ","A ","A ";

    #echo("Hello $name!<br>");
    // echo("Hello " . $name . "!<br>");
    

    #print("Hello $name!<br>");
    print("Hello " . $name . "!<br>");
    

    ?>
</body>
</html>