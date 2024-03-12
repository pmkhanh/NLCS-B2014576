<?php
require_once("../connect.php");
$user = $_SESSION['dangnhap'];
$sql_select_acc = "SELECT * FROM account WHERE username = '$user'";
$result_tk = mysqli_query($conn, $sql_select_acc);
$row = $result_tk->fetch_array();
?>
<form id="changeacc" action="./model/orders/handle.php?user=<?= $user ?>" method="post">
    <div class="container dangky">
        <div class="row my-5">
            <div class="col-sm-7 offset-sm-3 my-5">
                <div class="card my-5">
                    <div class="card-header text-center">
                        <h3>Thông tin người nhận</h3>
                    </div>
                    <div class="card-body">
                        <form id="signupForm" method="post" class="form-horizontal" action="#">
                            <div class="form-group row">
                                <label class="col-sm-4 offset-1 col-form-label" for="name">Tên người nhận</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($row['name']) ?>" />
                                </div>
                            </div>

                            <div class="form-group row my-2">
                                <label class="col-sm-4 offset-1 col-form-label" for="phone">Số điện thoại người nhận</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($row['phone']) ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 offset-1 col-form-label" for="address">Địa chỉ giao hàng</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control w-100" id="address" name="address" value="<?= htmlspecialchars($row['address']) ?>" />
                                </div>
                            </div>
                            <div class="form-group row my-2">
                                <label class="col-sm-4 offset-1 col-form-label" for="payment">Phương thức thanh toán</label>
                                <div class="col-sm-5">
                                    <select class="form-select" name="payment" aria-label="Default select example">
                                        <option value="<?= $row['payment'] ?>" selected><?= $row['payment'] ?></option>
                                        <option value="Tiền mặt">Tiền mặt</option>
                                        <option value="Momo">Momo</option>
                                        <option value="Visa">Visa</option>
                                        <option value="Thẻ ngân hàng">Thẻ ngân hàng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-sm-5 offset-sm-4 text-center">
                                    <button type="submit" class="btn btn-primary py-2 px-3 my-2" name="updateacc">
                                        Cập nhật thông tin
                                    </button>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container ">
        <h3 class="text-center mb-3 text-white">Xác nhận đơn hàng</h3>
        <table class="table table-bordered border-dark table-info ">
            <thead class="text-center">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th class="w-25">Hình ảnh</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $thanhtien = 0;
                $tongtien = 0;
                $i = 0;
                if (isset($_SESSION['cart'])) :

                    foreach ($_SESSION['cart'] as $cart_item) :
                        $id_pro = $cart_item['id_pro'];
                        $sql_product = "SELECT * FROM product WHERE id_pro = $id_pro LIMIT 1";
                        $result_pro = mysqli_query($conn, $sql_product);
                        $product = $result_pro->fetch_array();
                        $thanhtien = $cart_item['price'] * $cart_item['soluong'];
                        $tongtien += $thanhtien;
                        $i++;
                ?>
                        <tr class="text-center">
                            <th><?= $i ?></th>
                            <td> <?= htmlspecialchars($cart_item['name_pro']) ?> </td>
                            <td> <img class="img-thumbnail w-50" src="src/images/<?= htmlspecialchars($cart_item['image']) ?>" alt=""> </td>
                            <td> <?= htmlspecialchars(number_format($cart_item['price'], 0, ',', '.') . ' vnđ') ?> </td>
                            <td> <?= htmlspecialchars($cart_item['soluong']) ?> </td>
                            <td> <?= htmlspecialchars(number_format($thanhtien, 0, ',', '.')) . ' vnđ' ?> </td>
                        </tr>
            </tbody>


    <?php endforeach;
                endif;
    ?>
        </table>
        <div class="row">
            <div class="col d-flex flex-row-reverse">
                <strong class="order-1 m-0 pt-2 me-3 fs-4 bg-secondary bg-gradient rounded">Tổng tiền: <?= number_format($tongtien, 0, ',', '.') . ' vnđ' ?></strong>
                <button class="btn btn-primary py-2 px-3" name="agree" type="submit">
                    Đặt hàng
                </button>
            </div>
        </div>
<?php

$_SESSION['total'] =  $tongtien;

?>


    </div>

</form>
</form>