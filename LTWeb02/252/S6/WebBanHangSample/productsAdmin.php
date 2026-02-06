<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nền tảng - Kiến thức cơ bản về WEB | Bảng tin</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="assets/css/app.css" type="text/css">

</head>

<body>
    <!-- header -->
    <?php
    include ("./layout/header.php");
    define("PAPP", 30);
    // if (isset($_GET["ACT"]) && $_GET["ACT"] == "DELETE") {
    //     echo "DELETE:" . $_GET["MASP"];
    //     $conn = connectDB();
    //     $rCheck = runQuery("select * from phienbansp where MASP='" . $_GET["MASP"] . "'", $conn);
    //     if ($rCheck->rowCount() == 0) {
    //         // $deleteSP = runQuery("delete from sanpham where MASP='" . $_GET["MASP"] . "'", $conn);
    //         echo '<script>
    //         alert("Đã xóa sản phẩm ' . $_GET["MASP"] . '!");
    //         location.href = "productsAdmin.php";
    //         </script>';
    //     } else {
    //         echo '<script>alert("Sản phẩm đã tồn tại các phiên bản, không thể xóa!");</script>';
    //     }
    // }
    
    ?>
    <!-- end header -->
    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <!-- Carousel - Slider -->
        <?php
        //include("layout/slider.php"); 
        ?>

        <!-- Tính năng Marketing -->
        <?php
        // include("layout/marketing.php"); 
        ?>

        <!-- Danh sách sản phẩm -->
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Quản trị hệ thống</h1>
                <p class="lead text-muted">Quản lý sản phẩm</p>
            </div>
        </section>

        <!-- Giải thuật duyệt và render Danh sách sản phẩm theo dòng, cột của Bootstrap -->
        <div class="container">

            <?php
            // $conn = connectDB();
            // $result = runQuery("select MASP,MADM,TENSP,GIADEXUAT,GIATHAPNHAT,HINHCOVER from sanpham", $conn);
            // echo $result->rowCount();
            $sql = "select MASP,MADM,TENSP,GIADEXUAT,GIATHAPNHAT,HINHCOVER from sanpham";
            $conn = connectDB();

            $rs = getItemsPaging($sql, $conn, "productsAdmin.php?", $_GET["pageNumber"] ?? "1", PAPP);

            ?>
            <!-- Pagination -->
            <div class="container">
                <div class="clearfix">
                    <div class="row float-right">
                        <ul class="pagination justify-content-center w-100">
                            <?php echo $rs["page_links"]; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <?php
                        // echo "hello";
                        // for ($i = 0; $i < $result->columnCount(); $i++) {
                        //     echo '<th>' . $result->getColumnMeta($i)["name"] . '</th>';
                        // }
                        if (is_array($rs)) {
                            foreach ($rs[0] as $r => $r_value) {
                                echo '<th>' . $r . '</th>';
                            }
                            ?>
                            <th>
                                QUẢN LÝ
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($rs) - 1; $i++) {
                            echo "<tr>";
                            foreach ($rs[$i] as $row => $row_value) {
                                if ($row == "HINHCOVER") {
                                    echo '<td><img src="' . $row_value . '" style="width:50px;"></td>';
                                    // echo '<td><img src="' . $rs[$i]["HINHCOVER"] . '" style="width:50px;"></td>';
                                } elseif ($row == "GIATHAPNHAT" || $row == "GIADEXUAT") {
                                    echo "<td>" . number_format($row_value, 0, '', '.') . "</td>";
                                } else {
                                    echo "<td>" . $row_value . "</td>";
                                }
                            }

                            ?>
                            <td>
                                <a href="productEdit.php?MASP=<?php echo $rs[$i]["MASP"] ?>&ACT=VIEW" <i
                                    class="fa fa-bars text-left"> View/Edit</i> </a>
                                <!-- <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?MASP=" . $rs[$i]["MASP"] ?>&ACT=DELETE"
                                    <i class="fa fa-close text-left"
                                    onClick="return confirm('Bạn có chắc muốn xóa SP <?php echo $rs[$i]["MASP"] ?> ?')">
                                    Delete</i></a> -->
                                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?MASP=" . $rs[$i]["MASP"] ?>&ACT=DELETE"
                                    <i class="fa fa-close text-left"
                                    onClick="return deleteSP('<?php echo $rs[$i]["MASP"] ?>');">
                                    Delete</i></a>
                            </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>



            <?php
                        }
                        ?>
        </div>
        <!-- End block content -->
    </main>

    <!-- footer -->
    <footer class="footer mt-auto py-3">
        <div class="container">
            <span>Bản quyền © bởi <a href="https://nentang.vn">Nền Tảng</a> -
                <script>document.write(new Date().getFullYear());</script>.
            </span>
            <span class="text-muted">Hành trang tới Tương lai</span>

            <p class="float-right">
                <a href="#">Về đầu trang</a>
            </p>
        </div>
    </footer>
    <!-- end footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popperjs/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom script - Các file js do mình tự viết -->
    <script src="assets/js/app.js"></script>
    <script>
        function deleteSP(masp) {
            if (confirm('Bạn có chắc muốn xóa SP ' + masp + ' ?')) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        // document.getElementById("txtHint").innerHTML = this.responseText;
                        alert(this.responseText);
                    }
                };
                xmlhttp.open("GET", "productDelete.php?masp=" + masp, true);
                xmlhttp.send();
            }
            else {
                return false;
            }

        }

    </script>
</body>

</html>