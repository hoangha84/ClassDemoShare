<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect database</title>
</head>
<body>
    <?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "demobanhang";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $sql = "SELECT * FROM danhmuc";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br>" . $row["MADM"]. " - " . $row["TENDM"]. " - " . $row["THONGTINDM"];
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</body>
</html>