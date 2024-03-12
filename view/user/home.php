<?php

$sql_select_pro = "SELECT * FROM product";
$result_select_pro = mysqli_query($conn, $sql_select_pro);

$count_pro = mysqli_num_rows($result_select_pro);
$page = ceil($count_pro / 8);

if (isset($_GET['number_page'])) {
    $number_page = $_GET['number_page'];
} else {
    $number_page = '';
}
if ($number_page == '' || $number_page == 1) {
    $begin = 0;
} else {
    $begin = ($number_page * 8) - 8;
}


$sql = "SELECT * FROM `product` LIMIT $begin,8";
$result = mysqli_query($conn, $sql);
$i = 0;
if (mysqli_num_rows($result) > 0) {
    $i++;
?>

    <div class="container-fluid">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="src/images/slide1.jpg" class="d-block w-100" alt="slide1">
                </div>
                <div class="carousel-item">
                    <img src="src/images/slider2.jpg" class="d-block w-100" alt="slide2">
                </div>
                <div class="carousel-item">
                    <img src="src/images/slider3.jpg" class="d-block w-100" alt="slide3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container border-bottom border-top mb-3 mt-5   ">
        <h3 class="mt-3 text-center"><strong > SẮP PHÁT HÀNH</strong></h3>
        <div id="carouselExampleIndicatorsphathanh" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicatorsphathanh" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicatorsphathanh" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex">
                        <div class="col text-center">
                            <img src="src/images/dieuconlaigiuachungta.jpg" alt="" width="255px">
                            <h3>Điều còn lại giữa <br> chúng ta</h3>
                        </div>
                        <div class="col text-center">
                            <img src="src/images/phamgiaquyco2.jpg" alt="" width="255px">
                            <h3>Phẩm giá quý cô</h3>
                        </div>
                        <div class="col text-center">
                            <img src="src/images/ngaynang.jpg" alt="" width="255px">
                            <h3>Ngày nắng đem nỗi buồn <br> ra khơi</h3>
                        </div>
                        <div class="col text-center">
                            <img src="src/images/nhieunam1.jpg" alt="" width="255px">
                            <h3>Đã nhiều năm như thế tập 1</h3>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex">
                        <div class="col text-center">
                            <img src="src/images/nhieunam2.jpg" alt="" width="255px">
                            <h3>Đã nhiều năm như thế <br> tập 2</h3>
                        </div>
                        <div class="col text-center">
                            <img src="src/images/duongve.jpg" alt="" width="255px">
                            <h3>Đường về <br> gặp lại dưới nắng mai</h3>
                        </div>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicatorsphathanh" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicatorsphathanh" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <h3 class="text-center mt-3"><strong>SẢN PHẨM MỚI NHẤT</strong></h3>
    <div class="gallery">

        <?php
        while ($row = mysqli_fetch_array($result)) {
            if ($row['soluong'] != 0) {
        ?>


                <div class="content">
                    <form action="model/carts/handle.php?idproduct=<?= $row['id_pro'] ?>" method="post">
                        <a href="index.php?controller=detail&idproduct=<?= $row['id_pro'] ?>"><img class="imgsp" src="src/images/<?php echo $row['image'] ?>" alt=""></a>
                        <div class="text-center">
                            <p>
                            <h3><?php echo $row['name_pro'] ?></h3> ( <?php echo $row['tacgia'] ?> )</p>
                            <h6><?php echo number_format($row['price'], 0, ',', '.') . ' vnđ' ?></h6>
                            <button class="buybutton" name="addcart" type="submit">Mua</button>
                        </div>
                    </form>
                </div>

    <?php
            }
        }
    }
    ?>
    </div>

    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="text-center ms-5 ps-5">
                <nav aria-label="Page navigation example ">
                    <ul class="pagination mx-2">
                        <li class="page-item me-2 mt-1 rounded">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php
                        for ($i = 1; $i <= $page; $i++) :
                            if ($number_page == '') :
                                $number_page = 1;
                        ?>
                                <li class="me-2 <?php if ($i == $number_page) : echo 'active';
                                                endif ?>  page-item p-0"><a class="text-decoration-none page-link" href="index.php?number_page=<?= $i ?>"><?= $i ?></a></li>
                            <?php else : ?>
                                <li class="me-2 <?php if ($i == $number_page) : echo 'active';
                                                endif ?>  page-item p-0"><a class="text-decoration-none page-link" href="index.php?number_page=<?= $i ?>"><?= $i ?></a></li>
                        <?php
                            endif;
                        endfor
                        ?>
                        <li class="page-item">
                            <a class="page-link mt-1 rounded" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col"></div>

    </div>