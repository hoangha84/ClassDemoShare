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
            $conn = connectDB();
            $madm = $_POST["MADM"];
            $tendm = $_POST["TENDM"];
            $thongtin = $_POST["THONGTINDM"];
            $sql = "update danhmuc set TENDM='$tendm', THONGTINDM='$thongtin' where MADM='$madm'";
            // echo $sql;
            $stmt = runQuery($sql, $conn);
            echo ("<script>location.href = 'categoriesAdmin.php';</script>");
        }
        $conn = connectDB();
        $stmt = runQuery("select * from danhmuc where MADM='" . ($_GET["MADM"] ?? $_POST["MADM"]) . "'", $conn);
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
                                <h1 class="text-center mb-3">Thông tin danh mục</h1>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-child text-left" style="width: 120px;"> Mã danh mục</i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="Mã danh mục" name="MADM"
                                        value="<?php echo $row["MADM"]; ?>" readonly>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-id-badge text-left" style="width: 120px;"> Tên danh mục</i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="Tên danh mục" name="TENDM"
                                        value="<?php echo $row["TENDM"]; ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user text-left" style="width: 120px;"> Thông tin</i>
                                        </span>
                                    </div>
                                    <textarea name="THONGTINDM" id="THONGTINDM" cols="65%"
                                        rows="10"><?php echo $row["THONGTINDM"]; ?></textarea>
                                </div>

                                <button class="btn btn-block btn-success" name="btnUpdate">Cập nhật thông tin</button>
                                <a class="btn btn-block btn-info" href="categoriesAdmin.php">Trở về</a>
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