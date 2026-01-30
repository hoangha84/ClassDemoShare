<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Constants in PHP</title>
    <style>
        body {
            font-size: 25px;
        }
    </style>
</head>

<body>
    <?php
    echo "<em>DIR: " . __DIR__ . "</em><br>";
    echo "<em>FILE: " . __FILE__ . "</em><br>";
    function makeSiteName()
    {
        define('siteName', "<em><b>Learning PHP</b></em>");
    }
    makeSiteName();

    function getSiteName()
    {
        # Parse error
        # const siteOwner = "hmha";
        return siteName;
    }

    echo "In " . __LINE__ . ": My site name is " . siteName . "<br>";

    const siteOwner = "<b style='color:red;text-decoration:underline;'>hmha</b>";

    echo "In " . __LINE__ . ": Get site name in function: " . getSiteName() . "<br>";
    echo "In " . __LINE__ . ": Owner of " . siteName . " is " . siteOwner . "<br>";
    ?>
</body>

</html>