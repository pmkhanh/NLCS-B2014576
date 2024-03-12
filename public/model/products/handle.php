<?php
include_once("../../../connect.php");
if (isset($_POST['add'])) {
    $name_pro = $_POST['name_pro'];
    $code_cate = $_POST['code_cates'];
    $price = $_POST['price'];
    $motasp = $_POST['mota'];
    $xuatxu = $_POST['xuatxu'];
    $trangthai = $_POST['trangthai'];
    $soluong = $_POST['soluong'];
    $tacgia = $_POST['tacgia'];
    $nxb = $_POST['nxb'];
    $namxb = $_POST['namxb'];
    $ngonngu = $_POST['ngonngu'];
    $kichthuoc = $_POST['kichthuoc'];
    $sotrang = $_POST['sotrang'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image = time() . '_' . $image;
    move_uploaded_file($image_tmp, '../../src/images/' . $image);

    $sql = "INSERT INTO `product` (`name_pro`,`code_cate`,`image`,`price`,`motasp`,`xuatxu`,`trangthai`,`soluong`,`tacgia`,`nxb`,`namxb`,`ngonngu`,`kichthuoc`,`sotrang`)
            VALUES ('$name_pro','$code_cate','$image',$price,'$motasp','$xuatxu','$trangthai','$soluong','$tacgia','$nxb','$namxb','$ngonngu','$kichthuoc','$sotrang')";
    $result = mysqli_query($conn, $sql);
    move_uploaded_file($image_tmp, 'upload/' . $image);
    echo "<script>alert('Thêm sản phẩm thành công')</script>";
    echo "<script>window.open('../../admin/admin.php?controller=product','_self')</script>";
} elseif (isset($_GET['deletesach'])) {

    $id_pro = $_GET['deletesach'];
    $sql_delete = "DELETE FROM `product` WHERE id_pro='$id_pro'";
    $result = mysqli_query($conn, $sql_delete);
    if ($result) {
        header("Location: ../index.php?product");
    } else {
        echo "Không thành công";
    }
} elseif (isset($_POST['update'])) {
    $id_pro = $_GET['idproduct'];
    $name_pro = $_POST['name_pro'];
    $code_cate = $_POST['code_cate'];
    $price = $_POST['price'];
    $motasp = $_POST['mota'];
    $xuatxu = $_POST['xuatxu'];
    $trangthai = $_POST['trangthai'];
    $soluong = $_POST['soluong'];
    $tacgia = $_POST['tacgia'];
    $nxb = $_POST['nxb'];
    $namxb = $_POST['namxb'];
    $ngonngu = $_POST['ngonngu'];
    $kichthuoc = $_POST['kichthuoc'];
    $sotrang = $_POST['sotrang'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    if ($image != '') {
        move_uploaded_file($image_tmp, '../../src/images/' . $image);
        $sql_updateimage = "SELECT * FROM product WHERE id_pro='$id_pro'";
        $result_updateimage = mysqli_query($conn, $sql_updateimage);
        while ($row = $result_updateimage->fetch_array()) {
            unlink('../../src/images/' . $row['image']);
        }
        $sql_update = "UPDATE product SET name_pro='" . $name_pro . "',  code_cate='" . $code_cate . "', price='" . $price . "', 
        motasp='$motasp', xuatxu='$xuatxu', trangthai='$trangthai', soluong = '$soluong', tacgia='$tacgia', nxb='$nxb', namxb='$namxb', ngonngu='$ngonngu', kichthuoc='$kichthuoc',
        sotrang='$sotrang', image='$image' WHERE id_pro=$id_pro";
    } else {
        $sql_update = "UPDATE product SET name_pro='" . $name_pro . "',  code_cate='" . $code_cate . "', price='" . $price . "', 
        motasp='$motasp', xuatxu='$xuatxu', trangthai='$trangthai', soluong = '$soluong', tacgia='$tacgia', nxb='$nxb', namxb='$namxb', ngonngu='$ngonngu', kichthuoc='$kichthuoc',
        sotrang='$sotrang' WHERE id_pro=$id_pro";
    }
    $result = mysqli_query($conn, $sql_update);
    echo "<script>alert('Cập nhật thành công')</script>";
    echo "<script>window.open('../../admin/admin.php?controller=product','_self')</script>";
    
} elseif (isset($_POST["delete"])) {
    $id_pro = $_GET["idproduct"];
    $sql_deleteimage = "SELECT * FROM product WHERE id_pro=$id_pro";
    $result_del = mysqli_query($conn, $sql_deleteimage);
    while ($row = $result_del->fetch_array()) {
        unlink('../../src/images/' . $row['image']);
    }
    $sql_delete = "DELETE FROM product WHERE id_pro='$_GET[idproduct]'";
    $result_delete = mysqli_query($conn, $sql_delete);
    echo "<script>alert('Xóa sản phẩm thành công')</script>";
    echo "<script>window.open('../../admin/admin.php?controller=product','_self')</script>";
}
