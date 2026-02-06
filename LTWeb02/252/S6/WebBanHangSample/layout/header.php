<nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Nền tảng</a>
        <div class="navbar-collapse collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="pages/products.html">Sản phẩm</a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Danh mục
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu bg-dark">
                        <?php
                        // echo $_SERVER['HTTP_HOST'] . "/myFunction.php";
                        require "./myFunction.php";
                        $conn = connectDB();
                        $result = runQuery(
                            "select DISTINCT danhmuc.MADM, TENDM from danhmuc join sanpham where danhmuc.MADM=sanpham.MADM",
                            $conn,
                        );
                        while ($row = $result->fetch()) {
                            echo '<li class="nav-item"><a class="nav-link" href="products.php?danhmuc=' .
                                $row["MADM"] .
                                '">' .
                                $row["TENDM"] .
                                "</a></li>";
                        }
                        $conn = null;
                        ?>

                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0" method="get" action="pages/search.html">
                <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm" aria-label="Search"
                    name="keyword_tensanpham">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
        </div>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Giỏ hàng</a>
            </li>

            <!-- Nếu chưa đăng nhập thì hiển thị nút Đăng nhập -->
            <?php if (!isset($_SESSION["username"])) {
                echo '<li class="nav-item text-nowrap">';
                echo '<a class="nav-link" href="login.php">Đăng nhập</a>';
                echo "</li>";
            } else {
                 ?>
                 <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Quản trị</a>
                            <ul class="dropdown-menu bg-dark">
                                <li class="nav-item"><a class="nav-link" href="productsAdmin.php">Quản lý sản phẩm</a></li>
                                <li class="nav-item"><a class="nav-link" href="categoriesAdmin.php">Quản lý danh mục</a></li>
                            </ul>
                        </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $_SESSION["username"]; ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu bg-dark">
                        <li class="nav-item"><a class="nav-link" href="customer.php">Thông tin tài khoản</a></li>



                        <li class="nav-item"><a class="nav-link" href="logout.php">Đăng xuất</a></li>
                    </ul>
                </li>

                <?php
            } ?>
            <!-- <a class="nav-link" href="login.php">Đăng nhập</a> -->

        </ul>
    </div>
</nav>
