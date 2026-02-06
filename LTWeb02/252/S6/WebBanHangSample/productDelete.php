<?php
include "myFunction.php";

$masp = $_GET['masp'];

$conn = connectDB();
$rCheck = runQuery("select * from phienbansp where MASP='" . $masp . "'", $conn);
if ($rCheck->rowCount() == 0) {
    $deleteSP = runQuery("delete from sanpham where MASP='" . $masp . "'", $conn);
    echo 'Đã xóa sản phẩm ' . $masp . '!")';
} else {
    echo 'Sản phẩm đã tồn tại các phiên bản, không thể xóa!';
}

$conn = null;
?>