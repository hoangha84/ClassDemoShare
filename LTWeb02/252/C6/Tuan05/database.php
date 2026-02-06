<?php
function connectDB($svn, $usn, $pwd, $dbms)
{
    // try {
    if ($dbms == "mysql")
        $conn = new PDO("mysql:host=$svn", $usn, $pwd);
    elseif ($dbms == "sqlsrv")
        $conn = new PDO("sqlsrv:server=$svn", $usn, $pwd);
    return $conn;
    // } catch (PDOException $e) {
    //     echo "Connection failed: " . $e->getMessage() . "<br>";
    // }
}

$savedSvn = $_REQUEST['svname'] ?? "localhost";
$savedUsn = $_REQUEST['usn'] ?? "root";
$savedPwd = $_REQUEST['pwd'] ?? "";
$savedDBMS = $_REQUEST['dbms'] ?? "mysql";
$savedDBN = $_REQUEST['dbname'] ?? "c6_demo252";
$savedTBN = $_REQUEST['tbname'] ?? "accounts";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database management</title>
    <style>
        label {
            display: inline-block;
            width: 200px;
            margin-top: 10px;
        }

        .notify {
            font-size: 25px;
            color: red;
        }

        input {
            margin-top: 10px;
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
        <fieldset>
            <legend>Server information</legend>
            <label for="svnameID">Servername:</label><input type="text" id="svnameID" name="svname"
                value="<?php echo $savedSvn; ?>">
            <br>
            <label for="usnID">Username:</label><input type="text" id="usnID" name="usn"
                value="<?php echo $savedUsn; ?>">
            <br>
            <label for="pwdID">Password:</label><input type="text" id="pwdID" name="pwd" value="">
            <br>
            <label for="mysqlID">MySQL</label>
            <input type="radio" name="dbms" id="mysqlID" value="mysql" onclick="mysql()" <?php if ($savedDBMS == "mysql")
                echo "checked"; ?>>
            <label for="sqlsrvID">SQL Server</label>
            <input type="radio" name="dbms" id="sqlsrvID" value="sqlsrv" onclick="sqlsrv()" <?php if ($savedDBMS == "sqlsrv")
                echo "checked"; ?>>
            <br>
            <input type="submit" value="Check connection" name="checkConn">
            <div class="notify">
                <?php

                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (isset($_REQUEST['checkConn'])) {
                        echo "Checking connection...<br>";
                        try {
                            // $conn = connectDB($svn, $usn, $pwd, $dbms);
                            $conn = connectDB($savedSvn, $savedUsn, $savedPwd, $savedDBMS);
                            echo "Connection successfully!<br>";
                        } catch (PDOException $e) {
                            echo "Connection failed: " . $e->getMessage() . "<br>";
                        }
                    }
                }
                ?>
            </div>
        </fieldset>
        <fieldset>
            <legend>Make data</legend>
            <label for="dbnameID">Database name:</label><input type="text" id="dbnameID" name="dbname"
                value="<?php echo $savedDBN; ?>">
            <br>
            <input type="submit" name="createDB" value="Create database">
            <input type="submit" name="dropDB" value="Drop database">
            <br>
            <label for="tbnameID">Table name:</label><input type="text" id="tbnameID" name="tbname"
                value="<?php echo $savedTBN; ?>">
            <input type="submit" name="createTable" value="Create table">
            <input type="submit" name="addSampleData" value="Add sample data">
            <br>
            <input type="submit" name="selectData" value="Select all data">
            <div class="notify">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (isset($_REQUEST['createDB'])) {
                        // echo "Create db";
                        try {
                            $conn = connectDB($savedSvn, $savedUsn, $savedPwd, $savedDBMS);
                            $sql = "create database $savedDBN";
                            $conn->exec($sql);
                            echo "Create $savedDBN database successfully!<br>";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage() . "<br>";
                        }
                    }
                    if (isset($_REQUEST['dropDB'])) {
                        // echo "Drop db";
                        try {
                            $conn = connectDB($savedSvn, $savedUsn, $savedPwd, $savedDBMS);
                            $sql = "drop database $savedDBN";
                            $conn->exec($sql);
                            echo "Drop $savedDBN database successfully!<br>";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage() . "<br>";
                        }
                    }
                    if (isset($_REQUEST['createTable'])) {
                        try {
                            $conn = connectDB($savedSvn, $savedUsn, $savedPwd, $savedDBMS);
                            $selectDBsql = "use $savedDBN";
                            $conn->exec($selectDBsql);

                            $sql = "create table $savedTBN (username varchar(50) primary key, password varchar(50) )";
                            $conn->exec($sql);
                            echo "Create '$savedTBN' table successfully!<br>";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage() . "<br>";
                        }
                    }

                    if (isset($_REQUEST['addSampleData'])) {
                        try {
                            $conn = connectDB($savedSvn, $savedUsn, $savedPwd, $savedDBMS);
                            $selectDBsql = "use $savedDBN";
                            $conn->exec($selectDBsql);
                            $u = "user" . rand(1000, 9999);
                            $p = rand(10000, 99999);

                            $sql = "insert into $savedTBN value('$u', '$p')";
                            $conn->exec($sql);
                            echo "Add sample ($u,$p) successfully!<br>";
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage() . "<br>";
                        }
                    }
                }
                ?>
            </div>
        </fieldset>
        <fieldset>
            <legend>Get data</legend>

            <div>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    if (isset($_REQUEST['selectData'])) {
                        try {
                            $conn = connectDB($savedSvn, $savedUsn, $savedPwd, $savedDBMS);
                            $selectDBsql = "use $savedDBN";
                            $conn->exec($selectDBsql);

                            $sql = "select * from $savedTBN";
                            $result = $conn->query($sql);
                            $colCount = $result->columnCount();

                            ###
                            echo "<table><tr>";
                            for ($i = 0; $i < $colCount; $i++) {
                                echo "<th>" . $result->getColumnMeta($i)['name'] . "</th>";
                            }
                            echo "</tr>";
                            // output data of each row
                            if ($result->rowCount() > 0) {
                                while ($row = $result->fetch()) {
                                    // echo $row['username'] . " - " . $row['password'] . "<br>";
                                    // echo "<tr><td>" . $row['username'] . "</td><td>" . $row['password'] . "</td></tr>";
                                    echo "<tr>";
                                    for ($i = 0; $i < $colCount; $i++) {
                                        echo "<td>" . $row[$result->getColumnMeta($i)['name']] . "</td>";
                                    }
                                    echo "</tr>";
                                }
                            }
                            echo "</table>";

                            ###
                
                            // if ($result->rowCount() > 0) {
                            //     while ($row = $result->fetch()) {
                            //         echo $row["username"] . " - " . $row["password"] . "<br>";
                            //     }
                            // }
                
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage() . "<br>";
                        }
                    }
                }

                $conn = null;
                ?>
            </div>
        </fieldset>


    </form>
    <script>
        function mysql() {
            document.getElementById("usnID").value = "root";
        }
        function sqlsrv() {
            document.getElementById("usnID").value = "";
        }
    </script>
</body>

</html>