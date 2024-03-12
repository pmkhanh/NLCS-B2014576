<div class="container-fluid col-5">
    <h2 class="text-center p-3 text-white">Thêm Sách</h2>
    <form action="../model/products/handle.php" method="post" enctype="multipart/form-data">
        <div>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center table-info">Tên SP</td>
                    <td><input type="text" name="name_pro" class="w-100"></td>
                </tr>
                <tr>
                    <td class="text-center table-info">Mã TLS</td>
                    <td>
                        <select name="code_cates">
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
                    <td><input type="file" name="image" class="w-100"></td>
                </tr>
                <tr>
                    <td class="text-center table-info">Giá Tiền</td>
                    <td><input type="text" name="price" class="w-100"></td>
                </tr>
                <tr>
                    <td class="text-center table-info">Mô Tả</td>
                    <td><textarea name="mota" cols="50" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td class="text-center table-info">Xuất Xứ</td>
                    <td><input type="text" name="xuatxu" class="w-100"></td>
                </tr>
                <tr>
                    <td class="text-center table-info">Trạng Thái</td>
                    <td><input type="text" name="trangthai" class="w-100"></td>
                </tr>
                <tr>
                    <td class="text-center table-info">Số Lượng</td>
                    <td><input type="text" name="soluong" class="w-100"></td>
                </tr>
                <tr>
                    <td class="text-center table-info">Tác Giả</td>
                    <td><input type="text" name="tacgia" class="w-100"></td>
                </tr>
                <tr>
                    <td class="text-center table-info">NXB</td>
                    <td><input type="text" name="nxb" class="w-100"></td>
                </tr>
                <tr>
                    <td class="text-center table-info">Năm XB</td>
                    <td><input type="text" name="namxb" class="w-100"></td>
                </tr>
                <tr>
                    <td class="text-center table-info">Ngôn Ngữ</td>
                    <td><input type="text" name="ngonngu" class="w-100"></td>
                </tr>
                <tr>
                    <td class="text-center table-info">Kích Thước Bao Bì</td>
                    <td><input type="text" name="kichthuoc" class="w-100"></td>
                </tr>
                <tr>
                    <td class="text-center table-info">Số Trang</td>
                    <td><input type="text" name="sotrang" class="w-100"></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center ">
                <button class="btn btn-primary w-50" type="submit" name="add">Thêm</button>
            </div>
        </div>
    </form>
</div>