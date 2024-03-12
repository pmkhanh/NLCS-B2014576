<?php
include_once('../../../connect.php');
session_start();
if(isset($_POST['updateacc'])){
    $user = $_GET['user'];
    $name =  $_POST['name'];
    $phone= $_POST['phone'];
    $address = $_POST['address'];
    $payment = $_POST['payment'];
    
    $sql_update = "UPDATE `account` SET 
    name='$name',phone='$phone',address='$address', payment='$payment' WHERE username='$user'";
    $result_update = mysqli_query($conn, $sql_update);
    echo "<script>alert('Cập nhật thông tin thành công')</script>";
    echo '<script>window.open("../../index.php?controller=buy","_self")</script>';
}elseif(isset($_POST['agree'])){
    $username = $_GET['user'];
    $name = $_POST['name'];
    $code = $username.rand(0,9999);
    $phone =$_POST['phone'];
    $address=$_POST['address'];
    $total = $_SESSION['total'];
    $payment = $_POST['payment'];
    $sql_order  = "INSERT INTO `order`(code, username, name, address, total, payment) VALUES ('$code', '$username', '$name', '$address', $total, '$payment')";
    $sql_select_amount = "SELECT * FROM statistic";
    $result_order = mysqli_query($conn, $sql_order);
    if($result_order){
        foreach($_SESSION['cart'] as $cart_item){
            $id_pro = $cart_item['id_pro'];
            $name_pro = $cart_item['name_pro'];
            $quantity = $cart_item['soluong'];
            $price = $cart_item['price'];
            $sql_id_cate = "SELECT * FROM category c JOIN product p ON c.code_cate = p.code_cate WHERE p.name_pro='$name_pro'";
            $result_id_cate = mysqli_query($conn, $sql_id_cate);
            $row_id_cate = mysqli_fetch_array($result_id_cate);
            $id_cate = $row_id_cate['id_cate'];
            $sql_insert = "INSERT INTO detail_or (code, id_pro, name_pro, quantity, price, id_cate) VALUES ('$code', '$id_pro', '$name_pro', '$quantity',  '$price', '$id_cate')";
            $sql_update = "UPDATE product SET soluong=soluong-$quantity WHERE id_pro=$id_pro";
            $sql_insert_sta = "UPDATE statistic SET amount=amount+$quantity WHERE id_cate='$id_cate'";
            mysqli_query($conn,  $sql_insert);
            mysqli_query($conn,  $sql_update);
            mysqli_query($conn, $sql_insert_sta);
            
        }
    }

    unset($_SESSION['cart']);
    echo "<script>alert('Đặt hàng thành công')</script>";
    echo "<script>window.open('../../index.php?controller=thanks','_self')</script>";
}
?>
