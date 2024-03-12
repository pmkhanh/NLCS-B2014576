<div class="container">
    <h2 class="text-center text-white my-2">Thể Loại Sách</h2>
    <?php
    $sql = "SELECT * FROM `category`";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Lỗi" . mysqli_error($conn));
    }
    ?>
    <div class="p-3">
        <a class="btn btn-primary" href="admin.php?controller=category&action=add"> <i class="fa-solid fa-plus"></i> Thêm Thể Loại</a>
    </div>
    <table class="table table-bordered border-primary ">
        <thead class="text-center">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã TLS</th>
                <th scope="col">Tên TLS</th>
                <th scope="col">Chi tiết</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </th>

            </tr>
        </thead>
        <tbody>

            <?php
            if (mysqli_num_rows($result) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <th scope="col" class="text-center"><?php echo $i ?></th>
                        <td style="width: 100px" class="text-center"><?php echo $row['code_cate'] ?></td>
                        <td class="text-center"><?php echo $row['name_cate'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td style="width: 130px;" class="text-center">
                            <button class="btn btn-primary mt-2">
                                <a class="text-decoration-none text-white" href="admin.php?controller=category&action=update&code_cate=<?php echo $row['code_cate'] ?>">
                                    Cập nhật <i class="fa-solid fa-pencil" style="color: #e6e6e6;"></i></a>
                            </button>
                        </td>
                        <td style="width: 100px;" class="text-center">
                            <form action="../model/categorys/handle.php?idcategory=<?= $row['id_cate'] ?>" method="post" enctype="multipart/form-data">
                                <button class="btn btn-danger mt-2" onclick="return confirm('Bạn có muốn xóa thể loại sách này?');">
                                    Xóa <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
            <?php
                    $i++;
                }
            }
            ?>

        </tbody>
    </table>

</div>