<?php
$key = $_POST['key'];
$sql_search = "SELECT * FROM `product` WHERE name_pro LIKE '%$key%'";
$result = mysqli_query($conn, $sql_search);
$i = 0;
if (mysqli_num_rows($result) > 0) {
    $i++;
?>
    <div class="text-center text-white mt-3">
        <h3>Tìm kiếm sản phẩm</h3>
        <h4>Từ khóa tìm kiếm "<?= $key ?>"</h4>
    </div>

    <div class="gallery">
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>


            <div class="content">
                <img class="imgsp" src="src/images/<?php echo $row['image'] ?>" alt="">
                <div class="text-center">
                    <p>
                    <h3><?php echo $row['name_pro'] ?></h3> ( <?php echo $row['xuatxu'] ?> )</p>
                    <h6><?php echo number_format($row['price'], 0, ',', '.') . ' vnđ' ?></h6>
                    <button class="buybutton"><a href="index.php?Mua=<?php echo $row['id_pro'] ?>">Mua</a></button>
                </div>
            </div>

        <?php
        }
    } else {
        ?>
        <div class="text-center text-white my-5">
            <h3>Không tồn tại sách tên "<?= $key ?>"</h3>
            <h4 class="mt-4" >Vui lòng kiểm tra tên sách cần tìm</h4>
        </div>
    <?php } ?>
    </div>