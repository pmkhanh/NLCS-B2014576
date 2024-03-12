<?php
include_once "../../connect.php";
$code = $_GET['code'];

$sql_select = "SELECT * FROM `order` o JOIN `detail_or` d ON o.code=d.code JOIN product s ON d.id_pro=s.id_pro WHERE o.code='$code'";
$result_select = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_array($result_select);
$name = $row['name'];

?>

<div class="text-white border w-50 rounded my-4">
  <div class="row">
    <h3>Thông tin người nhận</h3>


    <?php
    $sql_select_acc = "SELECT * FROM account WHERE name='$name'";
    $result_select_acc  = mysqli_query($conn, $sql_select_acc);
    $row_select_acc = mysqli_fetch_array($result_select_acc);
    ?>
    <div class="col-6 fs-4 text-start">
      <p>
        <strong> Tên người nhận:</strong>
      </p>
      <p>
        <strong> Địa chỉ:</strong>
      </p>
      <p>
        <strong> Số điện thoại:</strong>
      </p>
      <p>
        <strong> Phương thức thanh toán:</strong>
      </p>
    </div>
    <div class="col-5 fs-4 text-start">
      <p> <?= htmlspecialchars($row_select_acc['name']) ?></p>
      <p> <?= htmlspecialchars($row_select_acc['address']) ?></p>
      <p> <?= htmlspecialchars($row_select_acc['phone']) ?></p>
      <p class="mt-3" > <?= htmlspecialchars($row_select_acc['payment']) ?></p>
    </div>

  </div>
</div>

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên SP</th>
      <th scope="col">Hình Ảnh</th>
      <th scope="col">Số Lượng</th>
      <th scope="col">Giá Tiền</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql_or = "SELECT * FROM `order` o JOIN `detail_or` d ON o.code=d.code JOIN product s ON d.id_pro=s.id_pro WHERE o.code='$code'";
    $result_or = mysqli_query($conn, $sql_or);
    $i = 0;
    if (mysqli_num_rows($result_or) > 0) {
      while ($row_or = mysqli_fetch_array($result_or)) {
        $i++;
    ?>
        <tr class="justify-content-center">
          <th ><?php echo $i ?></th>
          <td ><?php echo $row_or['name_pro'] ?></td>
          <td> <img width="100px" height="150px" src="../../src/images/<?php echo $row_or['image'] ?>" alt="<?php echo $row_or['image'] ?>.jpg"> </td>
          <td ><?php echo $row_or['quantity'] ?></td>
          <td ><?php echo  number_format($row_or['price'], 0, ',', '.') . ' vnđ' ?></td>
        </tr>
    <?php
      }
    }

    ?>
  </tbody>
</table>
<div class="bg-secondary text-white w-25 rounded">
  <h4>Tổng tiền: <?php echo number_format($row['total'], 0, ',', '.') . ' vnđ' ?></h4>
</div>