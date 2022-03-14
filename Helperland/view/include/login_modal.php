<?php $base_url = "http://localhost/helperland/index.php";  ?>

<div class="bg-modal">
    <div class="modal_login">

        <?php
        if (isset($_SESSION["login_error"])) {
        ?>

            <div class="alert alert-danger mr-4" role="alert">
                Username or password is Invalid
            </div>

        <?php
        }
        // unset($_SESSION["login_error"]);
        ?>

        <p class="login">Login to your Account</p>

        <form onsubmit="return loginValidation(this)" method="POST" action="<?php echo "$base_url?function=login" ?>">
            <div class="email_login">
                <input type="email" name="login_email" placeholder="Email" required 
                    value="<?php  if (isset($_COOKIE["email"])) { echo $_COOKIE["email"]; }?>">
                <i class="fas fa-user"></i>
            </div>
            <div class="email_login">
                <input type="password" name="login_password" placeholder="Password" required 
                value="<?php  if (isset($_COOKIE["password"])) { echo $_COOKIE["password"]; }?>">
                <i class="fas fa-lock"></i>
            </div>
            <div class="remember_me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remembar Me</label>
            </div>
            <button type="submit" class="login_btn" name="login">Login</button>
            <div class="no_account">
                <p><a id="forgot_password">Forgot Password?</a></p>
                <p>Don't have a account ? <a id="create_acc"> Create an account</a></p>
            </div>
        </form>

        <div class="modal_close">
            <p>+</p>
        </div>

    </div>
</div>