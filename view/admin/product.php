<?php
$sql_pro = "SELECT * FROM `product` s JOIN `category` tl ON s.code_cate=tl.code_cate";
$result_pro = mysqli_query($conn, $sql_pro);
// $row = mysqli_fetch_array($result);
$count_pro = mysqli_num_rows($result_pro);
$page = ceil($count_pro / 5);

if (isset($_GET['number_page'])) {
    $number_page = $_GET['number_page'];
} else {
    $number_page = '';
}
if ($number_page == '' || $number_page == 1) {
    $begin = 0;
} else {
    $begin = ($number_page * 5) - 5;
}

$sql = "SELECT * FROM `product` s JOIN `category` tl ON s.code_cate=tl.code_cate ORDER BY id_pro DESC LIMIT $begin,5";
$result = mysqli_query($conn, $sql);
?>
<div>
    <h3 class="text-center text-white">Danh Sách Sản Phẩm</h3>
    <div class="p-3">
        <form action="admin.php?controller=product&action=add" method="post">
            <button class="btn btn-primary" name="add" type="submit">
                <i class="fa-solid fa-plus"></i> Thêm sách
            </button>
        </form>
    </div>
    <table class="table table-bordered fs-5">
        <thead class="text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên SP</th>
                <th scope="col">Mã TLS</th>
                <th scope="col">Hình Ảnh</th>
                <th scope="col">Giá Tiền</th>
                <th scope="col">Tác Giả</th>
                <th scope="col">Xuất Xứ</th>
                <th scope="col">Tồn kho</th>
                <th scope="col">NXB</th>
                <th scope="col">Năm XB</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $i = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $i++;
            ?>
                    <tr>
                        <td><?php echo $row['id_pro'] ?></td>
                        <td><?php echo $row['name_pro'] ?></td>
                        <td><?php echo $row['name_cate'] ?></td>
                        <td> <img width="100px" height="150px" src="../../src/images/<?php echo $row['image'] ?>" alt="<?php echo $row['name_pro'] ?>.jpg"> </td>
                        <td><?php echo number_format($row['price'], 0, ',', '.') . ' vnđ' ?></td>
                        <td class="text-start"><?php echo $row['tacgia'] ?></td>
                        <td><?php echo $row['xuatxu'] ?></td>
                        <td><?php
                            if ($row['soluong'] == 0) {
                                echo "Hết hàng";
                            } else {
                                print_r($row['soluong']);
                            }
                            ?></td>
                        <td><?php echo $row['nxb'] ?></td>
                        <td><?php echo $row['namxb'] ?></td>
                        <td style="width: 130px;" class="text-center">
                            <button class="btn btn-primary mt-5" name="update">
                                <a href="admin.php?controller=product&action=update&idproduct=<?= $row['id_pro'] ?>" class="text-decoration-none text-white">
                                    Cập nhật <i class="fa-solid fa-pencil" style="color: #e6e6e6;"></i></a>
                            </button>

                        </td>
                        <td style="width:100px">
                            <form action="../model/products/handle.php?idproduct=<?= $row['id_pro'] ?>" method="post">

                                <button style="width: 100%;" onclick="return confirm('Bạn có muốn xóa sản phẩm này?');" class="btn btn-danger mt-5" name="delete" type="submit">
                                    Xóa <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                </button>
                        </td>

                        </form>
                    </tr>
            <?php
                }
            }

            ?>
        </tbody>
    </table>
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
                                            endif ?>  page-item p-0"><a class="text-decoration-none page-link" href="admin.php?controller=product&number_page=<?= $i ?>"><?= $i ?></a></li>
                        <?php else : ?>
                            <li class="me-2 <?php if ($i == $number_page) : echo 'active';
                                            endif ?>  page-item p-0"><a class="text-decoration-none page-link" href="admin.php?controller=product&number_page=<?= $i ?>"><?= $i ?></a></li>
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