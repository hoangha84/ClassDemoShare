<?php
session_start();
/**
 * Summary of connectDB
 * @return PDO|null
 */
function connectDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "demobanhang";
    try {
        // MySQL
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // SQL Server
        //$conn = new PDO("sqlsrv:Server=$servername;Database=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return null;
    }
}
// function runQuery($query, $conn)
// {
//     $conn = connectDB();
//     if (isset($conn)) {
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         // echo "Connected successfully<br>";    
//         $stmt = $conn->prepare($query);
//         $stmt->setFetchMode(PDO::FETCH_ASSOC);
//         $stmt->execute();
//         return $stmt;
//     }
//     return null;
// }

/**
 * Summary of runQuery
 * @param mixed $query
 * @param mixed $conn
 * @return mixed
 */
function runQuery($query, $conn)
{
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully<br>";    
    $stmt = $conn->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    return $stmt;
}
class TableRows extends RecursiveIteratorIterator
{
    function __construct($it)
    {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current()
    {
        return "<td>" . parent::current() . "</td>";
    }

    function beginChildren()
    {
        echo "<tr>";
    }

    function endChildren()
    {
        echo "</tr>" . "\n";
    }
}

/**
 * Summary of uploadFile
 * @param mixed $target_dir
 * @param mixed $fileToUpload
 * @return void
 */
function uploadFile($target_dir, $fileToUpload)
{
    // $target_dir = "uploads/";
    $target_file = $target_dir . basename($fileToUpload["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($fileToUpload["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($fileToUpload["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($fileToUpload["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($fileToUpload["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
function paginateResults($sql, $href, $pageNumber, $itemPerPage)
{
    $conn = connectDB();
    $result = runQuery($sql, $conn);
    $count = $result->rowCount();
    $page_links = pagination($count, $href, $pageNumber, $itemPerPage);
    return $page_links;
}
function pagination($count, $href, $pageNumber, $itemPerPage)
{
    $output = '';
    if (!isset($pageNumber))
    $pageNumber = 1;
    if ($itemPerPage != 0)
        $pages = ceil($count / $itemPerPage);

    // if pages exists after loop's lower limit
    // <li class="page-item"><a class="page-link" href="#">1</a></li>
    if ($pages > 1) {
        if (($pageNumber - 3) > 0) {
            $output = $output . '<li class="page-item"><a class="page-link" href="' . $href . 'pageNumber=1">1</a></li>';
        }
        if (($pageNumber - 3) > 1) {
            $output = $output . '<li class="page-item"><span class="page-link">...</span></li>';
        }

        // Loop for provides links for 2 pages before and after current page
        for ($i = ($pageNumber - 2); $i <= ($pageNumber + 2); $i++) {
            if ($i < 1)
                continue;
            if ($i > $pages)
                break;
            if ($pageNumber == $i)
                //<li class="page-item active"><a class="page-link" href="#">2</a></li>
                // $output = $output . '<span id=' . $i . ' class="current">' . $i . '</span>';
                $output = $output . '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
            else
                $output = $output . '<li class="page-item"><a class="page-link" href="' . $href . "pageNumber=" . $i . '">' . $i . '</a></li>';
        }

        // if pages exists after loop's upper limit
        if (($pages - ($pageNumber + 2)) > 1) {
            $output = $output . '<li class="page-item"><span class="page-link">...</span></li>';
        }
        if (($pages - ($pageNumber + 2)) > 0) {
            if ($pageNumber == $pages)
                $output = $output . '<span id=' . ($pages) . ' class="current">' . ($pages) . "<script>alert('Hello');</script>" . '</span>';
            else
                $output = $output . '<li class="page-item"><a class="page-link" href="' . $href . "pageNumber=" . ($pages) . '">' . ($pages) . '</a></li>';
        }
    }
    return $output;
}
function getItemsPaging($sql, $conn, $link, $pageNumber, $itemPerPage)
{
    // getting parameters required for pagination
    $currentPage = 1;
    // if (isset($_GET['pageNumber'])) {
    //     $currentPage = $_GET['pageNumber'];
    // }
    if (isset($pageNumber)) {
        $currentPage = $pageNumber;
    }
    $startPage = ($currentPage - 1) * $itemPerPage;
    if ($startPage < 0)
        $startPage = 0;
    $href = $link;

    // adding limits to select query
    $query = $sql . " limit " . $startPage . "," . $itemPerPage;
    $result = runQuery($query, $conn);
    while ($row = $result->fetch()) {
        $questions[] = $row;
    }

    if (is_array($questions)) {
        $questions["page_links"] = paginateResults($sql, $href, $pageNumber, $itemPerPage);
        return $questions;
    }
}
?>