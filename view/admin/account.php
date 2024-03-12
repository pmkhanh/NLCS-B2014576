<?php
$sql = "SELECT * FROM `account`";
$result = mysqli_query($conn, $sql);

?>

<div>
    <h3 class="text-center text-white my-5">Danh Sách Tài Khoản KH</h3>
    <table class="table table-striped-columns">
        <thead>
            <tr class="text-center">
                <th>STT</th>
                <th >Chủ sở hữu</th>
                <th >Username</th>
                <th >Phone</th>
                <th >Email</th>
                <th >Admin</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            $i = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $name = $row['name'];
                    $i++;
            ?>
                    <tr>
                        <form action="../model/accounts/handle.php?user=<?= $row['username'] ?>" method="post">
                            <th class="text-center" scope="row"><?php echo $i ?></th>
                            <td ><?= $row['name'] != '' ? "$name" : "Chưa cập nhật" ?></td>
                            <td ><?php echo $row['username'] ?></td>
                            <td ><?php echo $row['phone'] ?></td>
                            <td ><?php echo $row['email'] ?></td>
                            <td class="text-center"><?php echo $row['admin'] == 1 ? 'Admin' : 'User' ?></td>
                            <td class="text-center">
                                <?php
                                if ($row['admin'] == 0) {
                                ?>
                                    <button onclick="return confirm('Bạn có chắc muốn cấp quyền tài khoản này?')" class=" btn btn-danger bg-opacity-75 rounded text-white" name="admin" type="submit"> > Cấp Quyền < </button>
                                        <?php
                                    } elseif ($row['admin'] == 1) {
                                        ?>
                                            <button class="btn btn-success bg-opacity-75 rounded text-white" name="user" type="submit">> Xóa Quyền < </button>
                                                <?php } ?>
                            </td>
                        </form>
                    </tr>
            <?php
                }
            } ?>
        </tbody>
    </table>

</div>