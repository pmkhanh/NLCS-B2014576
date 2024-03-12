<div class="mt-5">

    <div class="wrapper">
        <div class="form-box login">
            <span class="icon-close"><a href="index.php" class="text-white" ><ion-icon name="close-outline"></a></ion-icon></span>
            <h3 class="text-center">Đăng Nhập</h3>
            <form action="model/accounts/handle.php" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                    <input type="text" name="username" required>
                    <label>Tài Khoản</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Mật Khẩu</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Ghi nhớ tôi</label>
                    <a href="#">Quên mật khẩu?</a>
                </div>
                <button type="submit" class="btnlogin" name="login">Đăng nhập</button>
                <div class="login-register">
                    <p>Không có tài khoản?
                        <a href="index.php?controller=signup" class="register-link">Đăng ký</a>
                    </p>
                </div>
            </form>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </div>
</div>
<script src="js/script.js"></script>