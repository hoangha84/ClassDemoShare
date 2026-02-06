<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database in PHP</title>
    <style>
        body {
            font-size: 25px;
        }

        input {
            font-size: 25px;
        }

        .notify {
            margin: 20px auto;
            font-size: 30px;
            font-weight: bold;
            color: green;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="text" name="dbname" value="demodb252S6">
        <input type="submit" value="Create Database" name="createDB">
        <input type="submit" value="Drop Database" name="dropDB">
        <br><br>
        <input type="submit" value="Create Table 'account'" name="createTable">
        <input type="submit" value="Insert sample data for 'account' table" name="insertSample">
        <br><br>
        <input type="submit" value="Select data from table" name="selectData">
    </form>
    <div class="notify">
        <?php

        # mysqli
// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
        
        // // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
// $conn ->close();
        
        # PDO
        function connectDB($servername, $username, $password, $dbname = "")
        {
            try {
                if ($dbname !== "")
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                else
                    $conn = new PDO("mysql:host=$servername;", $username, $password);
                // echo "Connected successfully<br>";
                return $conn;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage() . "<br>";
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['createDB'])) {
                $conn = connectDB($servername, $username, $password);
                try {
                    $dbname = $_POST['dbname'];
                    $sql = "create database $dbname";
                    $conn->exec($sql);
                    echo "Database $dbname created successfully<br>";
                } catch (PDOException $e) {
                    // Handle errors during db creation
                    echo "Error creating database: " . $sql . "<br>" . $e->getMessage() . "<br>";
                }

                $conn = null;
            }
            if (isset($_POST['dropDB'])) {
                // echo "This is drop db";
                // var_dump($_POST);
                $conn = connectDB($servername, $username, $password);
                try {
                    $dbname = $_POST['dbname'];
                    $sql = "drop database $dbname";
                    $conn->exec($sql);
                    echo "Database $dbname dropped successfully<br>";
                } catch (PDOException $e) {
                    // Handle errors during db creation
                    echo "Error droping database: " . $sql . "<br>" . $e->getMessage() . "<br>";
                }

                $conn = null;
            }
            if (isset($_POST['createTable'])) {
                // var_dump($_POST);
                $conn = connectDB($servername, $username, $password, $_POST['dbname']);
                try {
                    $sql = "create table account (username varchar(50) primary key, password varchar(50))";
                    $conn->exec($sql);
                    echo "Table 'account' created successfully<br>";
                } catch (PDOException $e) {
                    // Handle errors during db creation
                    echo "Error creating table: " . $sql . "<br>" . $e->getMessage() . "<br>";
                }
                $conn = null;
            }

            if (isset($_POST['insertSample'])) {
                // var_dump($_POST);
                $conn = connectDB($servername, $username, $password, $_POST['dbname']);
                try {
                    $urn = 'user' . rand(1, 10000);
                    $pwd = rand(100000, 999999);
                    $sql = "insert into account values('$urn', '$pwd')";
                    $conn->exec($sql);
                    echo "Insert sample data successfully: $urn - $pwd<br>";
                } catch (PDOException $e) {
                    // Handle errors during db creation
                    echo "Error inserting sample data: " . $sql . "<br>" . $e->getMessage() . "<br>";
                }
                $conn = null;
            }

        }

        if (isset($_POST['selectData'])) {
            $conn = connectDB($servername, $username, $password, $_POST['dbname']);
            try {
                $sql = "select * from account";
                // $sql = "select * from myguests";
                $result = $conn->query($sql);
                # Get column name
                // var_dump($result->getColumnMeta(1));
                // for($i=0; $i<$result->columnCount(); $i++){
                //     echo $result->getColumnMeta($i)['name'] . " - ";
                // }
                // echo "<br>";
                echo "<table><tr>";
                for ($i = 0; $i < $result->columnCount(); $i++) {
                    echo "<th>" . $result->getColumnMeta($i)['name'] . "</th>";
                }
                echo "</tr>";
                // output data of each row
                if ($result->rowCount() > 0) {
                    while ($row = $result->fetch()) {
                        // echo $row['username'] . " - " . $row['password'] . "<br>";
                        // echo "<tr><td>" . $row['username'] . "</td><td>" . $row['password'] . "</td></tr>";
                        echo "<tr>";
                        for ($i = 0; $i < $result->columnCount(); $i++) {
                            echo "<td>" . $row[$result->getColumnMeta($i)['name']] . "</td>";
                        }
                        echo "</tr>";
                    }
                }
                echo "</table>";
            } catch (PDOException $e) {
                // Handle errors during db creation
                echo "Error inserting sample data: " . $sql . "<br>" . $e->getMessage() . "<br>";
            }
            $conn = null;
        }
        ?>
    </div>
</body>

</html>