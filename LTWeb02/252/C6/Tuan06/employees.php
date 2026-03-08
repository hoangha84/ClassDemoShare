<?php
$q = intval($_GET['id']);
function connectDB($svn, $usn, $pwd, $dbms)
{
    if ($dbms == "mysql")
        $conn = new PDO("mysql:host=$svn", $usn, $pwd);
    elseif ($dbms == "sqlsrv")
        $conn = new PDO("sqlsrv:server=$svn", $usn, $pwd);
    return $conn;
}

try {
    $conn = connectDB('localhost', 'root', '', 'mysql');
    $selectDBsql = "use classicmodels";
    $conn->exec($selectDBsql);
    $sql = "select * from employees where employeeNumber = '" . $q . "'";
    $result = $conn->query($sql);

    $colCount = $result->columnCount();

    echo "<table><tr>";
    for ($i = 0; $i < $colCount; $i++) {
        echo "<th>" . $result->getColumnMeta($i)['name'] . "</th>";
    }
    echo "</tr>";

    // output data of each row
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            echo "<tr>";
            for ($i = 0; $i < $colCount; $i++) {
                echo "<td>" . $row[$result->getColumnMeta($i)['name']] . "</td>";
            }
            echo "</tr>";
        }
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

?>