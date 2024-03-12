<div class="container-fluid mt-3">
    <nav class="navbar navbar-expand-lg rounded" style="background-color: #7ED7C1;">

        <a class="navbar-brand ms-2" href="index.php"> <img class="icons" src="src/images/icons.png" alt="Shop MK"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-5 mb-2">
                <li class="nav-item">
                    <a class="nav-link active fs-5 text-white" aria-current="page" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fs-5 text-white" href="index.php?HOT">HOT</a>
                </li>
                <li class="nav-item dropdown me-5">
                    <a class="nav-link active dropdown-toggle fs-5 text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Thể Loại
                    </a>


                    <ul class="dropdown-menu">
                        <?php

                        $sql_matl = "SELECT * FROM  `category`";
                        $result_tl = mysqli_query($conn, $sql_matl);
                        $i = 0;
                        if (mysqli_num_rows($result_tl) > 0) {
                            $i++;

                        ?>
                            <?php
                            while ($row = mysqli_fetch_array($result_tl)) {
                            ?>
                                <li><a class="dropdown-item" href="index.php?controller=category&category=<?php echo $row['code_cate'] ?>"><?php echo $row['name_cate'] ?></a></li>
                        <?php }
                        } ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="index.php?controller=category&trangthai=SachBanChay">Sách bán chạy</a></li>
                        <li><a class="dropdown-item" href="index.php?controller=category&trangthai=SachGiamGia">Sách giảm giá</a></li>
                        <li><a class="dropdown-item" href="index.php?controller=category&trangthai=SachMoiNhat">Sách Mới nhất</a></li>
                    </ul>
                </li>

            </ul>
            <form action="index.php?controller=search" method="post" class="d-flex w-50 me-5" role="search">
                <input class="form-control me-3" type="search" placeholder="Nhập tên sản phẩm" name="key" aria-label="Search">
                <button class="btn btn-outline-success" type="submit" name="search">Search</button>
            </form>



            <div class="d-flex">

                <?php
                if (isset($_SESSION['dangnhap']) != 0) {
                ?>
                    <button class=" rounded-pill me-4 position-relative">

                        <a href="index.php?controller=cart" class="me-3"><i class="fa-solid fa-cart-shopping" style="color: #0ae2ff"></i></a>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php

                            if (isset($_SESSION['cart'])) {

                                $i = 0;
                                foreach ($_SESSION['cart'] as $cart_item) {
                                    $i++;
                                }
                                echo $i;
                            } else {
                                echo '0';
                            }
                            ?>
                        </span>
                    </button>
                    <div class="dropdown ">
                        <p class="dropdown-toggle m-0 me-3 text-dark " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
                            <?= htmlspecialchars($_SESSION['dangnhap']) ?>
                        </p>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="index.php?controller=account">Tài khoản</a></li>
                            <li><a class="dropdown-item" href="#">Quản lý đơn hàng</a></li>
                            <li><a class="dropdown-item" href="model/accounts/handle.php?logout">Đăng xuất</a></li>
                        </ul>
                    </div>
                <?php
                } elseif (!isset($_SESSION['dangnhap'])) {
                ?>

                  
                        <button class="rounded me-2" name="login" style="background-color: #0ae2ff;">
                            <a href="index.php?controller=login" class="text-decoration-none text-white">Đăng nhập</a></button>
                        <button class="rounded" style="background-color: #0ae2ff;" name="signup">
                            <a href="index.php?controller=signup" class="text-decoration-none text-white">Đăng ký</a></button>
                    <?php } ?>




            </div>
    </nav>
</div>
</div>