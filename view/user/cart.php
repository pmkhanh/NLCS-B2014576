<?php

if (isset($_SESSION["dangnhap"])) {

?>
    <div>
        <div class="text-center text-white my-5">
            <h3>Giỏ hàng</h3>
        </div>
    <div>
        <form action="model/carts/handle.php?idproduct=all" method="post">

            <button type="submit" name="delete" class="btn btn-primary" onclick="return confirm('Bạn có muốn xóa tất cả sản phẩm trong giỏ hàng?');">
                Xóa tất cả
            </button>
        </form>

    </div>
    <table class="table table-bordered border-dark table-info my-3" >
       
        <thead>

            <tr>
                <th scope="col" class="text-center">STT</th>
                <th scope="col" class="text-center">Tên SP</th>
                <th scope="col">Hình Ảnh</th>
                <th scope="col" class="text-center">Giá Tiền</th>
                <th scope="col" class="text-center">Số lượng</th>
                <th scope="col">Thành Tiền</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $tongtien = 0;
            $i = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $cart_item) {
                    $id_pro = $cart_item['id_pro'];
                    $sql_select_pro = "SELECT * FROM product WHERE id_pro = $id_pro";
                    $result_select_pro = mysqli_query($conn, $sql_select_pro);
                    $row = mysqli_fetch_array($result_select_pro);
                    $i++;
                    $thanhtien = $cart_item['price'] * $cart_item['soluong'];
                    $tongtien = $tongtien + $thanhtien;

            ?>
                    <tr>
                        <form action="model/carts/handle.php?idproduct=<?= $cart_item['id_pro'] ?>" method="post">
                            <td><?php echo $i ?></td>
                            <td><?php echo $cart_item['name_pro'] ?></td>
                            <td> <img width="100px" height="150px" src="src/images/<?php echo $cart_item['image'] ?>" alt="<?php echo $cart_item['image'] ?>"> </td>
                            <td class="text-center"><?php echo  number_format($cart_item['price'], 0, ',', '.') . ' vnđ' ?></td>
                            <td><input type="number" min="1" max="<?= $row['soluong'] ?>" value="<?= $cart_item['soluong'] ?>" name="soluong"></td>
                            <td><?php echo number_format($thanhtien, 0, ',', '.') . ' vnđ' ?></td>
                            <td>
                                <button type="submit" name="updatecart" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-nib" style="color: #ffffff;"></i>
                                </button>
                                <button onclick="return confirm('Bạn có muốn xóa sản phẩm?');" class="btn btn-danger" name="delete" type="submit">
                                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                </button>
                            </td>
                        </form>
                    <?php


                }
            } else { ?>
                    <td colspan="7">
                        <div class="p-3 m-5">
                            <h3 class="text-center">Giỏ hàng còn trống</h3>
                        </div>
                    </td>;
                <?php } ?>
                    </tr>




        </tbody>


    </table>

    <h4 class="fs-3 bg-secondary bg-gradient w-25 rounded">Tổng tiền: <?php echo  number_format($tongtien, 0, ',', '.') . ' vnđ' ?></h4>

    <div class="text-center ">
        <button class="btn btn-primary mb-5" name="pay" style="width: 30%; background-color: blue;">
            <a href="index.php?controller=buy" class="text-white">Thanh toán</a>
        </button>
    </div>
    <?php
    }else{
        echo "<script>alert('Bạn cần đăng nhập trước thêm sản phẩm vào giỏ hàng')</script>";
        echo "<script>window.open('index.php?controller=login','_self')</script>";
    }
    ?>
    </div>