<?php

$user = $_SESSION['dangnhap'];
$sql_selectacc = "SELECT * FROM account WHERE username = '$user'";
$result_acc = mysqli_query($conn, $sql_selectacc);
$row = mysqli_fetch_array($result_acc);


?>

<div class="container-fluid">
    <div class="row">
        <h1 class="text-center my-3 text-white"><i class="fa-solid fa-cube fs-4" style="color: #fff;"></i> Thông tin tài khoản <i class="fa-solid fa-cube fs-4" style="color: #fff;"></i></h1>

        <div class="col-6 offset-3 border my-5">
            <div class="row">
                <div class="col-3">
                    <div class="m-2">
                        <a class="btn btn-success disabled w-100" href="">Tài khoản</a>

                    </div>
                    <div class="m-2">
                        <a class="btn btn-success w-100" href="index.php?controller=changepw">Đổi mật khẩu</a>
                    </div>
                </div>

                <div class="col fs-5 my-2">
                    <form action="model/accounts/handle.php?tk=<?= $row['username'] ?>" method="post">
                        <table class="my-2">
                            <tr>
                                <td><strong>Tên đăng nhập : </strong></td>
                                <td class="text-white" ><?= htmlspecialchars($row['username']) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tên người dùng: </strong></td>
                                <td><input type="text" value="<?= htmlspecialchars($row['name']) ?>" name="changename"></td>
                            </tr>
                            <tr>
                                <td><strong>Số điện thoại : </strong></td>
                                <td><input type="text" value="<?= htmlspecialchars($row['phone']) ?>" name="changephone"></td>
                            </tr>
                            <tr>
                                <td><strong>Email : </strong></td>
                                <td><input type="email" value="<?= htmlspecialchars($row['email']) ?>" name="changeemail"></td>
                            </tr>
                        </table>
                        <div class="text-center my-3">
                            <button class="btn" type="submit" name="updateacc" style="background-color: #0ae2ff;">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>