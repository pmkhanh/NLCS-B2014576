<?php
$trangthai = $_GET['trangthai'];
$sql_trangthai = "SELECT * FROM `product` WHERE trangthai='$trangthai'";
$result = mysqli_query($conn, $sql_trangthai);

?>

<div class="text-center">
    <?php 
    if($trangthai == 'SachBanChay'){
        echo '<h3 class="text-white mt-5">Sách Bán Chạy </h3>';
    }elseif($trangthai == 'SachGiamGia'){
        echo '<h3 class="text-white mt-5">Sách Giảm Giá </h3>';
    }else{
        echo '<h3 class="text-white mt-5">Sách Mới Nhất </h3>';

    }
    ?>
    
</div>

<div class="gallery">
    <?php while ($row = mysqli_fetch_array($result)) { ?>

        <div class="content">
            <form action="model/carts/handle.php?idproduct=<?= $row['id_pro'] ?>" method="post">
                <a href="index.php?controller=detail&idproduct=<?= $row['id_pro'] ?>"><img class="imgsp" src="src/images/<?php echo $row['image'] ?>" alt=""></a>
                <div class="text-center">
                    <p>
                    <h3><?php echo $row['name_pro'] ?></h3> ( <?php echo $row['tacgia'] ?> )</p>
                    <h6><?php echo number_format($row['price'], 0, ',', '.') . ' vnđ' ?></h6>
                    <button class="buybutton" name="addcart" type="submit">Mua</button>
                </div>
            </form>
        </div>

    <?php } ?>
</div>