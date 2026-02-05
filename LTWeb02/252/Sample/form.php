<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demobanhang";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form in PHP</title>
    <style>
        .message {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        Name: <input type="text" name="name">        
        <input type="submit" value="Submit" name="submit">
        <br>
        <input type="submit" value="Connect to DB" name="connectDB">
        <div class="message">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['connectDB'])) {
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    echo "Connected successfully";
                }
                if (isset($_POST['submit'])) {
                    // collect value of input field
                    $name = htmlspecialchars($_POST['name']);
                    if (empty($name)) {
                        echo "Name is empty";
                    } else {
                        echo "Hello, " . $name;
                    }
                }
            }
            ?>
        </div>
    </form>
</body>

</html>