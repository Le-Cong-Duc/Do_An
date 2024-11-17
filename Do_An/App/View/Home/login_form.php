<?php include('App/View/Home/header.php') ?>
<?php include('App/View/Home/navbar.php') ?>

<link rel="stylesheet" href="Public/css/signIn.css">

<div class="container">

    <div class="form-col">
        <div class="btn-box">
            <button class="btn btn-login" id="login">Sign In</button>
            <button class="btn btn-register" id="register">Sign Up</button>
        </div>
    </div>

    <form class="form-box login-form" action="index.php?action=sign_in" method="post" enctype="multipart/form-data">
        <div class="form-title">
            <span>Sign In</span>
        </div>

        <div class="form-inputs">
            <div class="input-box">
                <input type="text" class="inputs input-field" name="sign_user" placeholder="Username" required>
                <ion-icon name="person-circle-outline" class="icons"></ion-icon>
            </div>
            <div class="input-box">
                <input type="password" oninput="changeIcon(this.value)" id="logPass" class="inputs input-field"
                    name="sign_pass" placeholder="Password" required>
                <ion-icon name="eye-off-outline" class="icons" id="logPass-icon" onclick="myLogPass()"></ion-icon>
            </div>

            <div class="forgot-pass">
                <a href="#">Forgot Password?</a>
            </div>

            <input type="submit" name="dangnhap" class="inputs submit-btn" value="Đăng nhập">

        </div>
    </form>

    <form class="form-box register-form" action="index.php?action=register" method="post" enctype="multipart/form-data">
        <div class="form-title">
            <span>Register</span>
        </div>

        <div class="form-inputs">
            <div class="input-box">
                <input type="text" class="inputs input-field" name="regis_name" placeholder="Name" required>
                <ion-icon name="person-circle-outline" class="icons"></ion-icon>
            </div>
            <div class="input-box">
                <input type="text" class="inputs input-field" name="regis_user" placeholder="Username" required>
                <ion-icon name="person-circle-outline" class="icons"></ion-icon>
            </div>
            <div class="input-box">
                <input type="password" oninput="changeIcon(this.value)" id="regisPass" class="inputs input-field"
                    name="regis_pass" placeholder="Password" required>
                <ion-icon name="lock-closed-outline" class="icons" id="regisPass-icon" onclick="myRegisPass()">
                </ion-icon>
            </div>
            <div class="input-box">
                <input type="text" class="inputs input-field" name="regis_email" placeholder="Email" required>
                <ion-icon name="mail-outline" class="icons"></ion-icon>
            </div>
            <div class="input-box">
                <input type="text" class="inputs input-field" name="regis_phone" placeholder="Phone number" required>
                <ion-icon name="call-outline" class="icons"></ion-icon>
            </div>
            <div class="input-box">
                <input type="text" class="inputs input-field" name="regis_address" placeholder="Address" required>
                <ion-icon name="call-outline" class="icons"></ion-icon>
            </div>
            <div class="forgot-pass">
                <input type="checkbox">
                <label>Remember me?</label>
            </div>
            <input type="submit" name="dangki" class="inputs submit-btn" value="Đăng Kí">
        </div>
    </form>

</div>

<script src="Public/js/signIn.js"></script>
</body>

</html>