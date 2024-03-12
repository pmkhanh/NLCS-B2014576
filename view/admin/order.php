<?php
$sql_hd = "SELECT * FROM `order` order by name ASC ";
$result = mysqli_query($conn, $sql_hd);

?>

<div>
    <h3 class="text-center text-white my-5">Danh Sách Đơn Hàng</h3>
    <table class="table  ">
        <thead>
            <tr class="text-center">
                <th>STT</th>
                <th  >Code</th>
                <th>Khách Hàng</th>
                <th>Địa chỉ</th>
                <th >Tổng tiền</th>
                <th>Phương thức thanh toán</th>
                <th></th>
            </tr>
        </thead>
        <?php
        $i = 0;
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {     
                $i++;
        ?>
                <tbody class="table-group-divider">
                    <tr>
                        <th class="text-center" scope="row"><?php echo $i ?></th>
                        <td  ><?php echo $row['code'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td  ><?php echo $row['address'] ?></td>
                        <td  ><?php echo number_format($row['total'],0,',','.') .' vnđ'?></td>
                        <td  ><?php echo $row['payment'] ?></td>
                        <td class="text-center"><a class="p-1 bg-info rounded text-decoration-none text-white" href="admin.php?controller=order&action=detail&code=<?php echo $row['code'] ?>">Chi tiết</a></td>
                    </tr>
                </tbody>
        <?php }
        } ?>
    </table>

</div>