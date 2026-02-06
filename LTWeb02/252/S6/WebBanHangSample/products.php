<!DOCTYPE html>
<html lang="vi" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Danh sách sản phẩm</title>

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
    include "layout/header.php";

    define("PDPP", 9);
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
                <h1 class="jumbotron-heading">Danh sách Sản phẩm</h1>
                <p class="lead text-muted">Các sản phẩm với chất lượng, uy tín, cam kết từ nhà Sản xuất, phân phối và
                    bảo hành chính hãng.</p>
            </div>
        </section>

        <!-- Giải thuật duyệt và render Danh sách sản phẩm theo dòng, cột của Bootstrap -->
        <!-- Pagination -->
        <div class="container">
            <div class="clearfix">
                <div class="row float-right">
                    <ul class="pagination justify-content-center w-100">
                        <?php
                        $conn = connectDB();
                        $madm = $_GET["danhmuc"];
                        $sql = "select * from sanpham sp join danhmuc dm on sp.MADM = dm.MADM where sp.MADM='$madm'";
                        $conn = connectDB();
                        $link = "products.php?danhmuc=" . $madm . "&";
                        // echo $link;
                        $resultPaging = getItemsPaging(
                            $sql,
                            $conn,
                            $link,
                            $_GET["pageNumber"] ?? "1",
                            PDPP,
                        );
                        echo $resultPaging["page_links"];
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="danhsachsanpham py-5 bg-light">
            <div class="container">
                <div class="row">
                    <?php // while ($row = $resultPaging->fetch()) {
                    if (is_array($resultPaging)) {

                        for ($i = 0; $i < count($resultPaging) - 1; $i++) { ?>
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <a href="product-detail.php?MASP=<?php echo $resultPaging[
                                        $i
                                    ]["MASP"]; ?>">
                                        <img class="bd-placeholder-img card-img-top" width="100%" height="350"
                                            src="<?php echo $resultPaging[$i][
                                                "HINHCOVER"
                                            ]; ?>">
                                    </a>
                                    <div class="card-body">
                                        <a href="product-detail.php?MASP=<?php echo $resultPaging[
                                            $i
                                        ]["MASP"]; ?>">
                                            <h5>
                                                <?php echo $resultPaging[$i][
                                                    "TENSP"
                                                ]; ?>
                                            </h5>
                                        </a>
                                        <h6>
                                            <?php echo $resultPaging[$i][
                                                "TENDM"
                                            ]; ?>
                                        </h6>
                                        <p class="card-text">
                                            <?php echo $resultPaging[$i][
                                                "GIOITHIEUSP"
                                            ]; ?>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-outline-secondary"
                                                    href="product-detail.php?MASP=<?php echo $resultPaging[
                                                        $i
                                                    ]["MASP"]; ?>">Xem
                                                    chi tiết</a>
                                            </div>
                                            <small class="text-muted text-right">
                                                <s>
                                                    <?php echo number_format(
                                                        $resultPaging[$i][
                                                            "GIADEXUAT"
                                                        ],
                                                        0,
                                                        "",
                                                        ".",
                                                    ); ?>
                                                </s>
                                                <b>
                                                    &nbsp;
                                                    <?php echo number_format(
                                                        $resultPaging[$i][
                                                            "GIATHAPNHAT"
                                                        ],
                                                        0,
                                                        "",
                                                        ".",
                                                    ); ?>
                                                    vnđ
                                                </b>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php }

                        $conn = null;
                        ?>
                    </div>
                </div>
            </div>

        <?php
                    } ?>

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
