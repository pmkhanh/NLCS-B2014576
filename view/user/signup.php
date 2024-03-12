<?php

?>

<div class="mt-3 wrapper-register">
    <div class="form-box register">
        <h3 class="text-center">Đăng Ký</h3>
        <form id="signupForm" action="model/accounts/handle.php" method="POST">
            <div class="input-box">
                <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                <input type="text" id="username" name="username" required>
                <label for="username" >Tài Khoản</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                <input type="email" id="email" name="email" required>
                <label for="email" >Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="call-outline"></ion-icon></span>
                <input type="text" id="phone" name="phone" required>
                <label for="phone" >Số Điện Thoại</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" id="password" name="password" required >
                <label for="password" >Mật Khẩu</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                <input type="password" id="password2" name="password2" required>
                <label for="password2" >Xác Nhận Mật Khẩu</label>
            </div>
            <div class="remember-forgot">
            <input class="form-check-input" type="checkbox" id="agree" name="agree" value="agree" required/>
                <label for="agree" >Tôi đồng ý với các điều khoản và dịch vụ</label>
            </div>
            <button type="submit" class="btnlogin" name="signup">Đăng Ký</button>
            <div class="login-register">
                <p class="text-dark" >Đã có tài khoản?
                    <a href="index.php?controller=login" class="login-link">Đăng Nhập</a>
                </p>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</div>
<script src="js/script.js"></script>