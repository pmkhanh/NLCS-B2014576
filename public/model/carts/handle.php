<?php
include_once('../../../connect.php');
session_start();
if (isset($_POST["addcart"])) {
    //   session_destroy();
    $id = $_GET['idproduct'];
    $soluong = 1;
    $sql = "SELECT * FROM product WHERE id_pro='$id' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $new_product =
            array(array(
                'name_pro' => $row['name_pro'], 'id_pro' => $id, 'soluong' => $soluong,
                'price' => $row['price'], 'image' => $row['image']
            ));

        if (isset($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                if ($cart_item['id_pro'] == $id) {
                    $product[] =
                        array(
                            'name_pro' => $cart_item['name_pro'], 'id_pro' => $cart_item['id_pro'],
                            'soluong' => $cart_item['soluong'] + 1, 'price' => $cart_item['price'], 'image' => $cart_item['image']
                        );
                    $found = true;
                } else {
                    $product[] =
                        array(
                            'name_pro' => $cart_item['name_pro'], 'id_pro' => $cart_item['id_pro'],
                            'soluong' => $cart_item['soluong'], 'price' => $cart_item['price'], 'image' => $cart_item['image']
                        );
                }
            }
            if ($found == false) {
                $_SESSION['cart'] = array_merge($new_product,$product);
            } else {

                $_SESSION['cart'] = $product;
            }
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    echo '<script>window.open("../../index.php?controller=cart","_self")</script>';
}elseif (isset($_POST['delete'])) {
    $id = $_GET['idproduct'];
    if ($id == 'all') {
        unset($_SESSION['cart']);
        echo "<script>alert('Xóa tất cả sản phẩm có trong giỏ hàng thành công')</script>";
        echo "<script>window.open('../../index.php?controller=cart','_self')</script>";
    } else {
        foreach ($_SESSION['cart'] as $cart_item) {
            if ($cart_item['id_pro'] != $id) {
                $product[] =
                    array(
                        'name_pro' => $cart_item['name_pro'], 'id_pro' => $cart_item['id_pro'],
                        'soluong' => $cart_item['soluong'], 'price' => $cart_item['price'], 'image' => $cart_item['image']
                    );
            }
            $_SESSION['cart'] = $product;
            echo '<script>alert("Xóa thành công", "_self")</script>';
            echo '<script>window.open("../../index.php?controller=cart","_self")</script>';
        }
    }
}elseif(isset($_POST['updatecart'])){
    $id = $_GET['idproduct'];
    $soluong = $_POST['soluong'];
    $i = 0;
    $count = count($_SESSION['cart']);
    foreach ($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id_pro'] == $id) {
            $update_product[] = array(
                'name_pro' => $cart_item['name_pro'], 'id_pro' => $cart_item['id_pro'],
                'soluong' => $soluong, 'price' => $cart_item['price'], 'image' => $cart_item['image']
            );
        } else {
            $product[] = array(
                'name_pro' => $cart_item['name_pro'], 'id_pro' => $cart_item['id_pro'],
                'soluong' => $cart_item['soluong'], 'price' => $cart_item['price'], 'image' => $cart_item['image']
            );
        }
    }
    if ($count == 1) {
        $_SESSION['cart'] = $update_product;
    } else {
        $_SESSION['cart'] = array_merge($update_product, $product);
    }
    // print_r ($_SESSION['cart']);
    echo '<script>alert("Cập nhật sản phẩm thành công")</script>';
    echo '<script>window.open("../../index.php?controller=cart","_self")</script>';
}
