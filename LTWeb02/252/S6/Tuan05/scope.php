<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP variable scopes</title>
    <style>
        body {
            font-size: 30px;
        }
    </style>
</head>
<body>
    <?php 
        $x = "An";
        function sayHello(){
            echo "Inside function, hello $x<br>";
        } 
        sayHello();

        echo "Outside function, hello $x<br>";

        // static
        function plus10(){
            static $x = 5;
            $x += 10;
            echo "x: $x<br>";
        }

        function printValue(){
            // Cách 1:
            global $x;
            echo "printValue(), x: $x<br>";
            // Cách 2:            
            echo "printValue(), x: $GLOBALS[x]<br>";
            echo "printValue(), x: " . $GLOBALS["x"] . "<br>";
        }

        plus10();
        plus10();
        plus10();
        plus10();
        plus10();
        echo "Outside, x: $x<br>";
        printValue();
    ?>
</body>
</html>