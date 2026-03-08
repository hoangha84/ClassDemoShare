<?php
function connectDB($svn, $usn, $pwd, $dbms)
{
  if ($dbms == "mysql")
    $conn = new PDO("mysql:host=$svn", $usn, $pwd);
  elseif ($dbms == "sqlsrv")
    $conn = new PDO("sqlsrv:server=$svn", $usn, $pwd);
  return $conn;
}

?>
<!doctype html>
<html>

<head>
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
  <script>
    function showUser(str) {
      if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
      }
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "employees.php?id=" + str, true);
      xmlhttp.send();
    }
  </script>
</head>

<body>
  <div id="txtHint"><b>Person info will be listed here.</b></div>
  <form>
    <select name="users" onchange="showUser(this.value)">
      <option value="">Select a person:</option>
      <?php
      $con = mysqli_connect('localhost', 'root', '', 'classicmodels');

      $sql = "SELECT employeeNumber FROM `employees`";
      $result = mysqli_query($con, $sql);

      while ($row = mysqli_fetch_array($result)) {
        echo "<option value=" . $row['employeeNumber'] . ">" . $row['employeeNumber'] . "</option>";
      }
      echo "</table>";

      mysqli_close($con);

      ?>

    </select>
  </form>
  <br />

</body>

</html>