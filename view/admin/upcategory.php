<?php

$code_cate = $_GET['code_cate'];
$sql_update = "SELECT * FROM `category` WHERE code_cate = '$code_cate' LIMIT 1";
$result = mysqli_query($conn, $sql_update);

?>
<div class="container" style="width: 700px;">
    <h3 class="text-center text-white mt-5">Thay Đổi Thông Tin</h3>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
    ?>
            <form action="../model/categorys/handle.php?idcategory=<?= $row['id_cate'] ?>" method="post" enctype="multipart/form-data">
                <table class="table mt-5 p-3">
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>
                                <?php echo $row['id_cate'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Mã TLS</td>
                            <td>
                                <input class="w-75" type="text" name="code_cate" value="<?php echo $row['code_cate'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Tên TLS</td>
                            <td class=>
                                <input class="w-75" type="text" value="<?php echo $row['name_cate'] ?>" name="name_cate">
                            </td>
                        </tr>
                        <tr>
                            <td>Chi tiết</td>
                            <td>
                                <textarea name="description" cols="50" rows="5"><?php echo $row['description'] ?></textarea>
                            </td>
                        </tr>
                        <div class="row">
                    <?php
                }
            }

                    ?>
                    </tbody>

                </table>
                <div class="d-flex justify-content-center ">
                    <button class="btn btn-primary w-50" type="submit" name="update">Cập nhật</button>
                </div>
            </form>
</div>