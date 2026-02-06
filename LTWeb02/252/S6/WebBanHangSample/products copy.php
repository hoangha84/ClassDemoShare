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

    define("PERPAGE_LIMIT", 9);
    function getFAQ()
    {
        $madm = $_GET["danhmuc"];
        $sql = "select * from sanpham sp join danhmuc dm on sp.MADM = dm.MADM where sp.MADM='$madm'";
        $conn = connectDB();

        // getting parameters required for pagination
        $currentPage = 1;
        if (isset($_GET['pageNumber'])) {
            $currentPage = $_GET['pageNumber'];
        }
        $startPage = ($currentPage - 1) * PERPAGE_LIMIT;
        if ($startPage < 0)
            $startPage = 0;
        $href = "/php_samples/perpage.php?";

        // adding limits to select query
        $query = $sql . " limit " . $startPage . "," . PERPAGE_LIMIT;
        $result = runQuery($query, $conn);
        while ($row = $result->fetch()) {
            $questions[] = $row;
        }

        if (is_array($questions)) {
            $questions["page_links"] = paginateResults($sql, $href);
            return $questions;
        }
    }
    function paginateResults($sql, $href)
    {
        $conn = connectDB();
        $result = runQuery($sql, $conn);
        $count = $result->rowCount();
        $page_links = pagination($count, $href);
        return $page_links;
    }

    function pagination($count, $href)
    {
        $output = '';
        if (!isset($_REQUEST["pageNumber"]))
            $_REQUEST["pageNumber"] = 1;
        if (PERPAGE_LIMIT != 0)
            $pages = ceil($count / PERPAGE_LIMIT);

        // if pages exists after loop's lower limit
        if ($pages > 1) {
            if (($_REQUEST["pageNumber"] - 3) > 0) {
                $output = $output . '<a href="' . $href . 'pageNumber=1" class="page">1</a>';
            }
            if (($_REQUEST["pageNumber"] - 3) > 1) {
                $output = $output . '...';
            }

            // Loop for provides links for 2 pages before and after current page
            for ($i = ($_REQUEST["pageNumber"] - 2); $i <= ($_REQUEST["pageNumber"] + 2); $i++) {
                if ($i < 1)
                    continue;
                if ($i > $pages)
                    break;
                if ($_REQUEST["pageNumber"] == $i)
                    $output = $output . '<span id=' . $i . ' class="current">' . $i . '</span>';
                else
                    $output = $output . '<a href="' . $href . "pageNumber=" . $i . '" class="page">' . $i . '</a>';
            }

            // if pages exists after loop's upper limit
            if (($pages - ($_REQUEST["pageNumber"] + 2)) > 1) {
                $output = $output . '...';
            }
            if (($pages - ($_REQUEST["pageNumber"] + 2)) > 0) {
                if ($_REQUEST["pageNumber"] == $pages)
                    $output = $output . '<span id=' . ($pages) . ' class="current">' . ($pages) . '</span>';
                else
                    $output = $output . '<a href="' . $href . "pageNumber=" . ($pages) . '" class="page">' . ($pages) . '</a>';
            }
        }
        return $output;
    }

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
        <div class="danhsachsanpham py-5 bg-light">
            <div class="container">
                <div class="row">
                    <?php
                    $conn = connectDB();
                    $madm = $_GET["danhmuc"];
                    // echo $madm;
                    $result = runQuery("select * from sanpham sp join danhmuc dm on sp.MADM = dm.MADM where sp.MADM='$madm'", $conn);
                    while ($row = $result->fetch()) {
                        ?>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <a href="product-detail.php?MASP=<?php echo $row["MASP"]; ?>">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="350"
                                        src="<?php echo $row["HINHCOVER"]; ?>">
                                </a>
                                <div class="card-body">
                                    <a href="product-detail.php?MASP=<?php echo $row["MASP"]; ?>">
                                        <h5>
                                            <?php echo $row["TENSP"]; ?>
                                        </h5>
                                    </a>
                                    <h6>
                                        <?php echo $row["TENDM"]; ?>
                                    </h6>
                                    <p class="card-text">
                                        <?php echo $row["GIOITHIEUSP"]; ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-outline-secondary"
                                                href="product-detail.php?MASP=<?php echo $row["MASP"]; ?>">Xem chi tiết</a>
                                        </div>
                                        <small class="text-muted text-right">
                                            <s>
                                                <?php echo number_format($row["GIADEXUAT"], 0, '', '.'); ?>
                                            </s>
                                            <b>
                                                &nbsp;
                                                <?php echo number_format($row["GIATHAPNHAT"], 0, '', '.'); ?> vnđ
                                            </b>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    $conn = null;
                    ?>



                </div>


            </div>
            <!-- Pagination -->
            <div class="container">
                <div class="row">
                    <ul class="pagination justify-content-center w-100">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
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