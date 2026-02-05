<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Management Form</title>
    <style>
        .notify {
            margin-top: 10px;
            color: red;
            font-weight: bold;
        }

        label {
            display: inline-block;
            width: 120px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="svName">Server name:</label><input type="text" id="svName" name="svName"
            value="<?php echo isset($_POST['svName']) ? $_POST['svName'] : 'localhost'; ?>">
        <label for="username">Username:</label><input type="text" id="username" name="username"
            value="<?php echo isset($_POST['username']) ? $_POST['username'] : 'root'; ?>">
        <label for="password">Password:</label><input type="password" id="password" name="password"
            value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
        <input type="submit" value="Check connection" name="checkCon">
        <br>
        <label for="dbName">Database name:</label><input type="text" id="dbName" name="dbName"
            value="<?php echo isset($_POST['dbName']) ? $_POST['dbName'] : 'demo252'; ?>">
        <input type="submit" value="Create database" name="createDB">
        <input type="submit" value="Make sample data" name="createSample">
        <input type="submit" value="Show sample data" name="showSample">
        <br>
    </form>
    <div class="notify">
        <?php
        function connectDB($svName, $username, $password, $dbName)
        {
            $conn = new mysqli($svName, $username, $password, $dbName);
            if ($conn->connect_error) {
                return null;
            } else {
                return $conn;
            }
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['checkCon'])) {
                $conn = connectDB($_POST['svName'], $_POST['username'], $_POST['password'], '');
                if ($conn->connect_error) {
                    echo "Connection failed: " . $conn->connect_error;
                } else {
                    echo "Connected successfully";
                }
                $conn->close();
            }
            if (isset($_POST['createDB'])) {
                $sqlCreateDB = "CREATE DATABASE " . $_POST['dbName'];
                $conn = connectDB($_POST['svName'], $_POST['username'], $_POST['password'], '');
                if ($conn->connect_error) {
                    echo "Connection failed: " . $conn->connect_error;
                } else {
                    if ($conn->query($sqlCreateDB) === TRUE) {
                        echo "Database '" . $_POST['dbName'] . "' created successfully";
                    } else {
                        echo "Error creating database: " . $conn->error;
                    }
                }
                $conn->close();
            }
            if (isset($_POST['createSample'])) {
                $conn = connectDB($_POST['svName'], $_POST['username'], $_POST['password'], $_POST['dbName']);
                if ($conn->connect_error) {
                    echo "Connection failed: " . $conn->connect_error;
                } else {
                    $sqlCreateTable = "CREATE TABLE sanpham (
                        masp INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        tensp VARCHAR(100) NOT NULL,
                        giadx FLOAT NOT NULL
                    )";
                    if ($conn->query($sqlCreateTable) === TRUE) {
                        echo "Table 'sanpham' created successfully. ";
                    } else {
                        echo "Error creating table: " . $conn->error;
                    }

                    $sqlInsertData = "INSERT INTO sanpham (tensp, giadx) VALUES
                        ('iPhone 14', 15000000),
                        ('Samsung Galaxy S23', 12000000),
                        ('MacBook Pro', 25000000)";
                    if ($conn->query($sqlInsertData) === TRUE) {
                        echo "Sample data inserted successfully.";
                    } else {
                        echo "Error inserting data: " . $conn->error;
                    }
                }
                $conn->close();
            }
            if (isset($_POST['showSample'])) {
                $conn = connectDB($_POST['svName'], $_POST['username'], $_POST['password'], $_POST['dbName']);
                if ($conn->connect_error) {
                    echo "Connection failed: " . $conn->connect_error;
                } else {
                    $sqlSelectData = "SELECT * FROM sanpham";
                    $result = $conn->query($sqlSelectData);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<br>" . $row["masp"] . " - " . $row["tensp"] . " - " . $row["giadx"];
                        }
                    } else {
                        echo "0 results";
                    }
                }
                $conn->close();
            }
        }
        ?>
    </div>
</body>

</html>