<?php
$code_cate = $_GET['category'];
$sql_ten = "SELECT * FROM `category` WHERE code_cate='$code_cate'";
$result_tl = mysqli_query($conn, $sql_ten);
$row_ten = mysqli_fetch_array($result_tl);
?>
<div class="text-center">
    <h3 class="text-white mt-5">Thể loại <?php echo $row_ten['name_cate'] ?> </h3>
</div>
<div class="gallery">

    <?php

    $sql_category = "SELECT * FROM `product` sp JOIN `category` tl ON sp.code_cate=tl.code_cate WHERE sp.code_cate='$code_cate';";
    $result = mysqli_query($conn, $sql_category);

    while ($row = mysqli_fetch_array($result)) {
    ?>


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

    <?php
    }
    ?>
</div>