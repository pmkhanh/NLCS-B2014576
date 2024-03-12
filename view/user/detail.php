<?php
$id_pro = $_GET['idproduct'];
$sql_chitiet = "SELECT * FROM `product` WHERE id_pro='$id_pro'";
$result = mysqli_query($conn, $sql_chitiet);
$i = 0;
if (mysqli_num_rows($result) > 0) {
    $i++;
    while ($row = mysqli_fetch_array($result)) {
?>
        <div class="row">
            <style>
                .tbsp {
                    font-size: 20px;
                    width: 620px;
                    height: 480px;
                    border: 2px solid #fff;
                    text-align: center;
                    justify-content: center;
                    border-width: 2px;
                }

                .tbsp td {
                    width: 50%;
                }
            </style>

            <div class="col pt-5 ps-5 ms-5 mt-3">
                <img width="380px" height="480px" src="src/images/<?php echo $row['image'] ?>" alt="">
            </div>
            <div class="col p-3 mt-3">
                <h3 class="text-center text-white">
                    <?php echo $row['name_pro'] ?>
                </h3>
                <table class="tbsp table table-bordered bg-success bg-opacity-50 text-white">
                    <tr>
                        <td>Tác giả</td>
                        <td><?php echo $row['tacgia'] ?></td>
                    </tr>
                    <tr>
                        <td>NXB</td>
                        <td><?php echo $row['nxb'] ?></td>
                    </tr>
                    <tr>
                        <td>Năm XB</td>
                        <td><?php echo $row['namxb'] ?></td>
                    </tr>
                    <tr>
                        <td>Ngôn Ngữ</td>
                        <td><?php echo $row['ngonngu'] ?></td>
                    </tr>
                    <tr>
                        <td>KÍch Thước Bao Bì</td>
                        <td><?php echo $row['kichthuoc'] ?></td>
                    </tr>
                    <tr>
                        <td>Số Trang</td>
                        <td><?php echo $row['sotrang'] ?></td>
                    </tr>
                    <tr>
                        <td>Xuất Xứ</td>
                        <td><?php echo $row['xuatxu'] ?></td>
                    </tr>
                    <tr>
                        <td>Giá Tiền</td>
                        <td><?php echo number_format($row['price'], 0, ',', '.') . ' vnđ' ?></td>
                    </tr>
                    <tr>
                        <td>Tồn Kho</td>
                        <td><?php echo $row['soluong'] ?></td>
                    </tr>
                </table>

            </div>
            <div class="row ">
                <div class="col text-white">
                    <h2>Mô tả sản phẩm</h2>
                        <hr>
                </div>
                <p class="text-body fs-5 bg-opacity-30 bg-secondary ">
                    <?php echo $row['motasp'] ?>
                </p>
            </div>
            <div class="text-center rounded">
                <form action="model/carts/handle.php?idproduct=<?= $id_pro ?>" method="post">
                    <button type="submit" name="addcart" class="buybutton w-25 rounded mb-5">Mua</button>
                </form>
            </div>

    <?php }
} ?>
        </div>