<?php

$id = $_GET['idproduct'];
$sql_update = "SELECT * FROM `product` s, `category` tl WHERE s.code_cate=tl.code_cate AND id_pro = $id LIMIT 1";
$result_update = mysqli_query($conn, $sql_update);
?>

<div>
    <h2 class="text-center text-white my-4">Sửa Thông Tin Sản Phẩm</h2>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($result_update)) {
        $i++;
    ?>
        <form action="../model/products/handle.php?idproduct=<?= $row['id_pro'] ?>" method="post" enctype="multipart/form-data">
            <div>
                <table class="table table-bordered">
                    <tr>
                        <td class="text-center table-info">Tên Sách</td>
                        <td><input type="text" value="<?php echo $row['name_pro'] ?>" name="name_pro" class="w-100"></td>
                    </tr>
                    <tr>
                        <td class="text-center table-info">Mã TLS</td>
                        <td>
                            <select name="code_cate">
                                <option value="<?= $row['code_cate']?>" selected><?= $row['name_cate']?></option>
                                <?php
                                $sql_code_cates = "SELECT * FROM `category` ORDER BY code_cate DESC";
                                $query_code_cates = mysqli_query($conn, $sql_code_cates);
                                while ($row_code_cates = mysqli_fetch_array($query_code_cates)) {
                                ?>
                                    <option value="<?php echo $row_code_cates['code_cate'] ?>"><?php echo $row_code_cates['name_cate'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center table-info">Hình Ảnh</td>
                        <td>
                            <input type="file" value="<?php echo $row['image'] ?>" name="image" class="w-100">
                            <img width="100px" height="150px" src="../../src/images/<?php echo $row['image'] ?>" alt="<?php echo $row['image'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center table-info">Giá Tiền</td>
                        <td><input type="text" style="resize: none;" value="<?php echo $row['price'] ?>" name="price" class="w-100"></td>
                    </tr>
                    <tr>
                        <td class="text-center table-info">Mô Tả</td>
                        <td><textarea name="mota" cols="100" rows="10"><?php echo $row['motasp'] ?></textarea></td>
                    </tr>
                    <tr>
                        <td class="text-center table-info">Xuất Xứ</td>
                        <td><input type="text" value="<?php echo $row['xuatxu'] ?>" name="xuatxu" class="w-100"></td>
                    </tr>
                    <tr>
                        <td class="text-center table-info">Trạng Thái</td>
                        <td><input type="text" value="<?php echo $row['trangthai'] ?>" name="trangthai" class="w-100"></td>
                    </tr>
                    <tr>
                        <td class="text-center table-info">Số Lượng</td>
                        <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong" class="w-100"></td>
                    </tr>
                    <tr>
                        <td class="text-center table-info">Tác Giả</td>
                        <td><input type="text" value="<?php echo $row['tacgia'] ?>" name="tacgia" class="w-100"></td>
                    </tr>
                    <tr>
                        <td class="text-center table-info">NXB</td>
                        <td><input type="text" value="<?php echo $row['nxb'] ?>" name="nxb" class="w-100"></td>
                    </tr>
                    <tr>
                        <td class="text-center table-info">Năm XB</td>
                        <td><input type="text" value="<?php echo $row['namxb'] ?>" name="namxb" class="w-100"></td>
                    </tr>
                    <tr>
                        <td class="text-center table-info">Ngôn Ngữ</td>
                        <td><input type="text" value="<?php echo $row['ngonngu'] ?>" name="ngonngu" class="w-100"></td>
                    </tr>
                    <tr>
                        <td class="text-center table-info">Kích Thước Bao Bì</td>
                        <td><input type="text" value="<?php echo $row['kichthuoc'] ?>" name="kichthuoc" class="w-100"></td>
                    </tr>
                    <tr>
                        <td class="text-center table-info">Số Trang</td>
                        <td><input type="text" value="<?php echo $row['sotrang'] ?>" name="sotrang" class="w-100"></td>
                    </tr>

                </table>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center ">
                    <button class="btn btn-primary w-25" type="submit" name="update">Cập nhật</button>
                </div>
            </div>
        </form>
    <?php
    }
    ?>
</div>