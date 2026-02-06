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
    include("./layout/header.php");
    ?>
    <!-- end header -->

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <?php
        if (isset($_POST["act"])) {
            $conn = connectDB();
            $makh = $_POST["MAKH"];
            $hoten = $_POST["HOTEN"];
            $ngaytg = $_POST["NGAYTHAMGIA"];
            $hangtv = $_POST["HANGTHANHVIEN"];
            $dtl = str_replace(".", "", $_POST["DIEMTICHLUY"]);
            $tendangnhap = $_POST["TENDANGNHAP"];
            $matkhau = $_POST["MATKHAU"];
            $email = $_POST["EMAIL"];
            $dt = $_POST["DIENTHOAI"];
            $sql = "update khachhang set HOTEN='$hoten', NGAYTHAMGIA='$ngaytg', HANGTHANHVIEN='$hangtv', DIEMTICHLUY='$dtl', TENDANGNHAP='$tendangnhap', MATKHAU='$matkhau', EMAIL='$email', DIENTHOAI='$dt' where MAKH='$makh'";
            // echo $sql;
            $stmt = runQuery($sql, $conn);
        }
        $conn = connectDB();
        $stmt = runQuery("select * from khachhang where TENDANGNHAP='" . $_SESSION["username"] . "'", $conn);
        $row = $stmt->fetch()
            ?>
        <form name="frmdangky" id="frmdangky" method="post"
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- Tạo input hidden để kiểm tra trạng thái khi load trang từ đầu hay do nhấn nút submit -->
            <input type="hidden" name="act" value="UPDATE">
            <div class="container mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card mx-3">
                            <div class="card-body p-4">
                                <h1 class="text-center mb-3">Thông tin khách hàng</h1>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-child text-left" style="width: 120px;"> Mã khách hàng</i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="Mã khách hàng" name="MAKH"
                                        value="<?php echo $row["MAKH"]; ?>" readonly>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-id-badge text-left" style="width: 120px;"> Họ tên</i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="Họ tên" name="HOTEN"
                                        value="<?php echo $row["HOTEN"]; ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user text-left" style="width: 120px;"> Tên đăng nhập</i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="Tên đăng nhập"
                                        name="TENDANGNHAP" value="<?php echo $row["TENDANGNHAP"]; ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-key text-left" style="width: 120px;"> Mật khẩu</i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="password" placeholder="Tên đăng nhập"
                                        name="MATKHAU" id="MATKHAU" value="<?php echo $row["MATKHAU"]; ?>">
                                    <div class="input-group-append">
                                        <div class="custom-control custom-switch mt-1">
                                            <input type="checkbox" class="custom-control-input" id="switchShowPass"
                                                onchange="SwitchTurn();">
                                            <label class="custom-control-label" for="switchShowPass">Show
                                                Password</label>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    function SwitchTurn() {
                                        let t = document.getElementById('MATKHAU')['type'];
                                        if (t == 'password')
                                            document.getElementById('MATKHAU')['type'] = 'text';
                                        else
                                            document.getElementById('MATKHAU')['type'] = 'password';
                                    }
                                </script>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-diamond text-left" style="width: 120px;"> Hạng thành viên</i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="Hạng thành viên"
                                        name="HANGTHANHVIEN" value="<?php echo $row["HANGTHANHVIEN"]; ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-bar-chart text-left" style="width: 120px;"> Điểm tích lũy</i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="Điểm tích lũy"
                                        name="DIEMTICHLUY"
                                        value="<?php echo number_format($row["DIEMTICHLUY"], 0, "", "."); ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-envelope text-left" style="width: 120px;"> Email</i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="email" placeholder="Email" name="EMAIL"
                                        value="<?php echo $row["EMAIL"]; ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-phone-square text-left" style="width: 120px;"> Số điện thoại</i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" placeholder="Số điện thoại" name="DIENTHOAI"
                                        value="<?php echo $row["DIENTHOAI"]; ?>">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar text-left" style="width: 120px;"> Ngày tham gia</i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="date" placeholder="Ngày tham gia"
                                        name="NGAYTHAMGIA" value="<?php echo $row["NGAYTHAMGIA"]; ?>">
                                </div>


                                <button class="btn btn-block btn-success" name="btnUpdate">Cập nhật thông tin</button>
                            </div>

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