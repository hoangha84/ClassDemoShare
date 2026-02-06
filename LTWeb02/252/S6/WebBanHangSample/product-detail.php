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
        <div class="container mt-4">
            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="card">
                <div class="container-fliud">
                    <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                        action="/php/twig/frontend/giohang/themvaogiohang">
                        <input type="hidden" name="sp_ma" id="sp_ma" value="5">
                        <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
                        <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
                        <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="samsung-galaxy-tab-10.jpg">

                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <?php
                                    $conn = connectDB();
                                    $masp = $_GET["MASP"] ?? "IP14ProMax";
                                    $result = runQuery("select * from hinhsp where MASP = '$masp'", $conn);
                                    while ($row = $result->fetch()) {
                                        echo '<div class="tab-pane" id="pic-' . $row["IDHINHSP"] . '">';
                                        echo '<img src="' . $row["LINKHINHSP"] . '" style="width:80%;">';
                                        echo '</div>';
                                    }
                                    ?>
                                    <script>
                                        // document.getElementById("pic-1").classList.add("active");
                                        document.getElementsByClassName("tab-pane")[0].classList.add("active");
                                    </script>
                                </div>
                                <ul class="preview-thumbnail nav nav-tabs">
                                    <?php
                                    $result = runQuery("select * from hinhsp where MASP = '$masp'", $conn);
                                    while ($row = $result->fetch()) {
                                        echo '<li class="">';
                                        echo '<a data-target="#pic-' . $row["IDHINHSP"] . '" data-toggle="tab" class="">';
                                        echo '<img src="' . $row["LINKHINHSP"] . '" style="width:200px;">';
                                        echo '</a>';
                                        echo '</li>';
                                    }
                                    ?>

                                </ul>
                            </div>
                            <?php
                            $result = runQuery("select * from sanpham where MASP = '$masp'", $conn);
                            $thongtinsp = "";
                            while ($row = $result->fetch()) {
                                $thongtinsp = $row["THONGTINSP"];
                                ?>
                                <div class="details col-md-6">
                                    <h3 class="product-title"><?php echo $row["TENSP"]; ?></h3>
                                    <div class="rating">
                                        <div class="stars">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <span class="review-no">999 reviews</span>
                                    </div>
                                    <p class="product-description"><?php echo $row["GIOITHIEUSP"]; ?></p>
                                    <small class="text-muted">Giá cũ: <s><span><?php echo number_format($row["GIADEXUAT"], 0, '', '.'); ?> vnđ</span></s></small>
                                    <h4 class="price">Giá hiện tại: <span><?php echo number_format($row["GIATHAPNHAT"], 0, '', '.'); ?> vnđ</span></h4>
                                    <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                        <strong>Uy tín</strong>!
                                    </p>
                                    <h5 class="sizes">Phiên bản:<br><br>
                                        <?php
                                        $pb = runQuery("select * from phienbansp where MASP = '$masp'",$conn);
                                        while ($r = $pb->fetch()) {
                                            echo '<span class="size" data-toggle="tooltip" title="' . $r["THONGTINPB"] . '" style="border: 1px solid red;margin-right:10px;padding:2px;">'. $r["TENPB"] .'</span>';
                                        }
                                        ?>
                                    </h5>
                                    <br>
                                    <h5 class="colors">Màu sắc:<br><br>
                                    <?php    
                                    $c = runQuery("select * from phienbansp pb join hinhpb hpb on pb.MAPB=hpb.MAPB where MASP = '$masp'",$conn);
                                    while ($r = $c->fetch()) {
                                        echo '<img src="' . $r["LINKHINHPB"] . '" style="width:10%">';
                                        echo '<span class="color orange not-available" data-toggle="tooltip" title="' . $r["MAUSAC"] . '">'. $r["MAUSAC"] . '</span>';
                                        }
                                        ?>
                                    </h5>
                                    <div class="form-group">
                                        <label for="soluong">Số lượng đặt mua:</label>
                                        <input type="number" class="form-control" id="soluong" name="soluong">
                                    </div>
                                    <div class="action">
                                        <a class="add-to-cart btn btn-default" id="btnThemVaoGioHang">Thêm vào giỏ hàng</a>
                                        <a class="like btn btn-default" href="#"><span class="fa fa-heart"></span></a>
                                    </div>
                                </div>
                                <?php
                            }
                            $conn = null;
                            ?>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="container-fluid">
                    <h3>Thông tin chi tiết về Sản phẩm</h3>
                    <div class="row">
                        <div class="col">
                        <?php echo $thongtinsp; ?>
                        </div>
                    </div>
                </div>
            </div>
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

</body>

</html>