<?php

$user = $_SESSION['dangnhap'];
$sql_selectacc = "SELECT * FROM account WHERE username ='$user'";
$result = mysqli_query($conn, $sql_selectacc);
$row = mysqli_fetch_all($result);

foreach ($row as $row) :
?>

    <div class="container-fluid">
        <div class="row">
            <h1 class="text-center my-3 text-white"><i class="fa-solid fa-cube fs-4" style="color: #fff;"></i> Thông tin tài khoản <i class="fa-solid fa-cube fs-4" style="color: #fff;"></i></h1>

            <div class="col-6 offset-3 border my-5">
                <div class="row">
                    <div class="col-3">
                        <div class="m-2">
                            <a class="btn btn-success w-100" href="index.php?controller=account">Tài khoản</a>

                        </div>
                        <div class="m-2">
                            <a class="btn btn-success disabled w-100 " href="index.php?controller=changpw">Đổi mật khẩu</a>
                        </div>
                    </div>
                    <div class="col-9 justify-content-center">
                        <h3 class="text-center text-white my-3">Đổi mật khẩu</h3>
                        <div class="d-flex justify-content-center">

                            <form id="changepwForm" action="model/accounts/handle.php" method="POST">
                                <input type="password" id="oldpassword" name="password" class="form-control" placeholder="Nhập mật khẩu cũ">
                                <input type="password" id="password" name="new_password" class="form-control my-2" placeholder="Nhập mật khẩu mới">
                                <input type="password" id="confirm_password" name="new_confirm_password" class="form-control" placeholder="Xác nhận mật khẩu mới">
                                <button type="submit" name="changepw" class="btn btn-primary my-3 p-2 ms-5">Xác nhận</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    </div>