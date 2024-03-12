<?php
session_start();
include_once('../../../connect.php');
if (isset($_POST['login'])) {

    // session_destroy();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql_login = "SELECT * FROM account WHERE username='$username' AND password='$password'";
    $row =  mysqli_query($conn, $sql_login);
    $result_login = mysqli_fetch_array($row);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $row_data = $result_login;
        $_SESSION['dangnhap'] = $row_data['username'];
        if ($row_data['admin'] > 0) {
            echo '<script>alert("Đăng nhập thành công tài khoản Admin")</script>';
            echo '<script>window.open("../../admin/admin.php","_self")</script>';
        } elseif ($row_data['admin'] == 0) {
            echo '<script>alert("Đăng nhập thành công")</script>';
            echo '<script>window.open("../../index.php","_self")</script>';
        } else {
            echo '<script>alert("Tài khoản hoặc mật khẩu không đúng")</script>';
            echo '<script>window.open("../../index.php?Login","_self")</script>';
        }
    }else{
        echo '<script>alert("Tài khoản hoặc mật khẩu không đúng, vui lòng kiểm tra lại tài khoản")</script>';
        echo '<script>window.open("../../index.php?Login","_self")</script>';
    }
} elseif (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password2 = $_POST['password2'];
    if ($password == $password2) {
        $sql_register = "INSERT INTO `account` (`username`, `password`, `phone`, `email`, `admin`) VALUES ('$username', '$password', '$phone', '$email', '0');";
        $result_register = mysqli_query($conn, $sql_register);
        if ($result_register) {
            echo '<script>alert("Tạo tài khoản thành công")</script>';
            $_SESSION['dangky'] = $username;
            $_SESSION['id_khachhang'] = mysqli_insert_id($conn);
            echo '<script>window.open("../../index.php?controller=login","_self")</script>';
        } else {
            echo '<script>alert("Tên đăng nhập đã được sử dụng hãy sử dụng tên khác")</script>';
            echo '<script>window.open("../../index.php?controller=signup","_self")</script>';
        }
    } else {
        echo '<script>alert("Mật khẩu nhập lại không đúng")</script>';
        echo '<script>window.open("../../index.php?controller=signup","_self")</script>';
    }
} elseif (isset($_GET['logout'])) {
    unset($_SESSION['dangnhap']);
    echo '<script>window.open("../../index.php?controller=login","_self")</script>';
} elseif (isset($_POST['updateacc'])) {
    $username = $_GET['tk'];
    $name = $_POST['changename'];
    $phone = $_POST['changephone'];
    $email = $_POST['changeemail'];
    $sql_acc = "UPDATE account SET name='$name', phone='$phone', email='$email' WHERE username='$username'";
    $result_acc = mysqli_query($conn, $sql_acc);
    if ($result_acc) {
        echo "<script>alert('Cập nhật thông tin thành công')</script>";
        echo "<script>window.open('../../index.php?controller=account','_self')</script>";
    } else {
        echo "<script>alert('Cập nhật không thành công kiểm tra lại thông tin')</script>";
        echo "<script>window.open('../../index.php?controller=account','_self')</script>";
    }
} elseif (isset($_POST['admin'])) {
    $username = $_GET['user'];
    $admin = 1;
    $sql_admin = "UPDATE `account` SET admin=$admin WHERE username = '$username'";
    $result_admin = mysqli_query($conn, $sql_admin);
    echo '<script>alert("Tên tài khoản \"' . $username . '\" được cấp quyền Admin thành công")</script>';
    echo '<script>window.open("../../admin/admin.php?controller=account","_self")</script>';
} elseif (isset($_GET['user'])) {
    $username = $_GET['user'];
    $admin = 0;
    $sql_admin = "UPDATE `account` SET admin=$admin WHERE username = '$username'";
    $result_admin = mysqli_query($conn, $sql_admin);
    echo '<script>alert("Tên tài khoản \"' . $username . '\" xóa quyền Admin thành công")</script>';
    echo '<script>window.open("../../admin/admin.php?controller=account","_self")</script>';
} elseif (isset($_POST['changepw'])) {
    $username = $_SESSION['dangnhap'];
    $password = $_POST['password'];
    $new_password =  $_POST['new_password'];
    $new_confirm_password = $_POST['new_confirm_password'];
    $sql = "SELECT * FROM account WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        if ($new_password == $new_confirm_password) {
            $sql_update = "UPDATE account SET password='$new_password' WHERE username='$username'";
            $result_update = mysqli_query($conn, $sql_update);
        }
        echo "<script>alert('Cập nhật mật khẩu thành công')</script>";
        echo "<script>window.open('../../index.php?controller=changepw','_self')</script>";
    } else {
        echo "<script>alert('Cập nhật mật khẩu thất bại, kiểm tra lại mật khẩu')</script>";
        echo "<script>window.open('../../index.php?controller=changepw','_self')</script>";
    }
}
