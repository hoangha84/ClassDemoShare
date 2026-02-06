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
    ?>
    <!-- end header -->

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <?php
        if (isset($_POST["ACT"])) {
            $tgdir = "assets/img/product/";
            $conn = connectDB();
            $masp = $_POST["MASP"];
            $madm = $_POST["MADM"];
            $tensp = $_POST["TENSP"];
            $gioithieu = $_POST["GIOITHIEUSP"];
            $thongtin = $_POST["THONGTINSP"];
            $giadx = str_replace(".", "", $_POST["GIADEXUAT"]);
            $giatn = str_replace(".", "", $_POST["GIATHAPNHAT"]);
            if (basename($_FILES["fileCover"]["name"] == "")) {
                $hinhcover = $_POST["HINHCOVER"];
            } else {
                $hinhcover = $tgdir . basename($_FILES["fileCover"]["name"]);
            }
            // $hinhcover = $tgdir . (basename($_FILES["fileCover"]["name"]) ?? "newproduct.jpg");
            $sql = "update sanpham set MASP='$masp', MADM='$madm', TENSP='$tensp', GIOITHIEUSP='$gioithieu', THONGTINSP='$thongtin',
            GIADEXUAT='$giadx', GIATHAPNHAT='$giatn', HINHCOVER='$hinhcover' where MASP='$masp'";
            // echo $sql;
        
            // echo $tgdir . basename($_FILES["fileCover"]["name"]);
            uploadFile($tgdir, $_FILES["fileCover"]);
            $stmt = runQuery($sql, $conn);
            echo ("<script>location.href = 'productsAdmin.php';</script>");
        }
        $conn = connectDB();
        $stmt = runQuery("select * from sanpham where MASP='" . ($_GET["MASP"] ?? $_POST["MASP"]) . "'", $conn);
        $row = $stmt->fetch();
        ?>
        <form name="frmdangky" id="frmdangky" method="post"
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <!-- Tạo input hidden để kiểm tra trạng thái khi load trang từ đầu hay do nhấn nút submit -->
            <input type="hidden" name="ACT" value="UPDATE">
            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card mx-3">
                            <div class="card-body p-4">
                                <h1 class="text-center mb-3">Thông tin sản phẩm</h1>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-child text-left" style="width: 120px;"> Mã sản phẩm</i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="Mã sản phẩm" name="MASP"
                                        value="<?php echo $row["MASP"]; ?>" readonly>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-id-badge text-left" style="width: 120px;"> Tên sản phẩm</i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="Tên sản phẩm" name="TENSP"
                                        value="<?php echo $row["TENSP"]; ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-id-badge text-left" style="width: 120px;"> Danh mục</i>
                                        </span>
                                    </div>
                                    <select class="form-control" id="MADM" name="MADM">
                                        <?php
                                        $conn = connectDB();
                                        $rDanhMuc = runQuery("select * from danhmuc", $conn);
                                        while ($r1 = $rDanhMuc->fetch()) {
                                            if ($r1["MADM"] == $row["MADM"])
                                                echo '<option value="' . $r1["MADM"] . '" selected>' . $r1["TENDM"] . '</option>';
                                            else
                                                echo '<option value="' . $r1["MADM"] . '">' . $r1["TENDM"] . '</option>';
                                        }
                                        ?>

                                    </select>

                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user text-left" style="width: 120px;"> Giới thiệu</i>
                                        </span>
                                    </div>
                                    <textarea name="GIOITHIEUSP" id="GIOITHIEUSP" cols="65%"
                                        rows="10"><?php echo $row["GIOITHIEUSP"]; ?></textarea>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-key text-left" style="width: 120px;"> Thông tin</i>
                                        </span>
                                    </div>
                                    <textarea name="THONGTINSP" id="THONGTINSP" cols="65%"
                                        rows="10"><?php echo $row["THONGTINSP"]; ?></textarea>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-bar-chart text-left" style="width: 120px;"> Giá đề
                                                    xuất</i>
                                            </span>
                                        </div>
                                        <input class="form-control" type="text" placeholder="Giá đề xuất"
                                            name="GIADEXUAT"
                                            value="<?php echo number_format($row["GIADEXUAT"], 0, "", "."); ?>">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-bar-chart text-left" style="width: 120px;"> Giá thấp
                                                    nhất</i>
                                            </span>
                                        </div>
                                        <input class="form-control" type="text" placeholder="Giá đề xuất"
                                            name="GIATHAPNHAT"
                                            value="<?php echo number_format($row["GIATHAPNHAT"], 0, "", "."); ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-id-badge text-left" style="width: 120px;"> Hình
                                                    cover</i>
                                            </span>
                                        </div>
                                        <input type="hidden" name="HINHCOVER" value="<?php echo $row["HINHCOVER"]; ?>">
                                        <img src="<?php echo $row["HINHCOVER"]; ?>" alt="hinhcover" style="width:100%;">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend mb-1">
                                            <span class="input-group-text">
                                                <i class="fa fa-id-badge text-left" style="width: 120px;"> Hình
                                                    cover</i>
                                            </span>
                                        </div>
                                        <input type="file" class="form-control-file border" name="fileCover"
                                            id="fileCover">
                                    </div>


                                    <button class="btn btn-block btn-success" name="btnUpdate">Cập nhật thông
                                        tin</button>
                                    <a class="btn btn-block btn-info" href="productsAdmin.php">Trở về</a>
                                </div>
                                <?php $conn = null ?>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
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

</body>

</html>