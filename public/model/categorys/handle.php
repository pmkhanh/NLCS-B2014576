
<?php
include_once('../../../connect.php');


if (isset($_POST['add'])) {
    $code_cate = $_POST['code_cate'];
    $name_cate = $_POST['name_cate'];
    $description = $_POST['description'];
    if (!empty($code_cate) && !empty($name_cate) && !empty($description)) {

        $sql = "INSERT INTO `category` (`code_cate`,`name_cate`,`description`) VALUES ('$code_cate','$name_cate','$description')";
        $result = $conn->query($sql);
        if ($result) {
            $sql_select = "SELECT * FROM category WHERE code_cate='$code_cate'";
            $row = mysqli_fetch_array(mysqli_query($conn, $sql_select));
            $id_cate = $row['id_cate'];
            $sql_insert = "INSERT INTO statistic (id_cate, name_cate) VALUES ('$id_cate', '$name_cate')";
            mysqli_query($conn, $sql_insert);
            echo "<script>alert('Thêm thành công')</script>";
            echo "<script>window.open('../../admin/admin.php?controller=category','_self')</script>";
        }
    } else {
        echo "<script>alert('Thông tin còn trống')</script>";
        echo "<script>window.open('../../admin/admin.php?controller=category&action=add','_self')</script>";
    }
} elseif (isset($_POST["update"])) {
    $id = $_GET["idcategory"];
    $code_cate = $_POST['code_cate'];
    $name_cate = $_POST['name_cate'];
    $description = $_POST['description'];
    if (!empty($code_cate) && !empty($name_cate) && !empty($description)) {

        $sql = "UPDATE `category` SET 
        code_cate='$code_cate',name_cate='$name_cate',description='$description' WHERE id_cate='$id'";
        $result = $conn->query($sql);
        if ($result) {
            echo "<script>alert('Cập nhật hành công!')</script>";
            echo "<script>window.open('../../admin/admin.php?controller=category','_self')</script>";
        } else {
            echo "Cập nhật thất bại!";
            echo "<script>window.open('../../admin/admin.php?controller=category&action=update','_self')</script>";
        }
    } else {
        echo "<script>alert('Thông tin còn trống')</script>";
        echo "<script>window.open('../../admin/admin.php?controller=category','_self')</script>";
    }
} else {
    $id_cate = $_GET["idcategory"];
    $sql_delete = "DELETE FROM statistic WHERE id_cate='$id_cate'";
    $result_delete = mysqli_query($conn, $sql_delete);
    if ($result_delete) {
        $sql = "DELETE FROM `category` WHERE id_cate='$id_cate'";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Xóa thành công')</script>";
        echo "<script>window.open('../../admin/admin.php?controller=category','_self')</script>";
    } else {
        echo "<script>alert('Xóa không thành công')</script>";
        echo "<script>window.open('../../admin/admin.php?controller=category','_self')</script>";
    }
}
