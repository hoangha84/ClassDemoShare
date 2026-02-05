<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO connection</title>
</head>

<body>

    <?php
    $dbname = "demobanhang";
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception --> This is the default mode as of PHP 8.0.0
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully<br>";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "<br>";
    }

    $sql = "SELECT * FROM danhmuc";
    $stmt = $conn->query($sql);
    $danhmucs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($danhmucs);
    foreach ($danhmucs as $dm) {
        echo "<br>" . $dm['MADM'] . " - " . $dm['TENDM'] . " - " . $dm['THONGTINDM'];
    }
    $conn = null;

    ?>

</body>

</html>