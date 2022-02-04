<form action="<?php echo "$base_url?function=forgotPasswordMail"  ?>" method="POST">
    <div class="bg-modal-fp">
        <div class="modal_fp">

            <?php
            if (isset($_SESSION["fp_error"])) {
            ?>

                <div class="alert alert-danger mr-4" role="alert">
                    Email is Invalid
                </div>

            <?php
            }
            // unset($_SESSION["fp_error"]);
            ?>

            <?php
            if (isset($_SESSION["fp_email_sucess"])) {
            ?>

                <div class="alert alert-success mr-4" role="alert">
                    <?= $_SESSION["fp_email_sucess"] ?>
                </div>

            <?php
            }
            // unset($_SESSION["fp_email_sucess"]);
            ?>

            <p class="login mt-2">Forgot Password</p>
            <div class="email_login">
                <input type="email" name="fp_email" placeholder="Email" required>
            </div>
            <button type="submit" class="login_btn" name="fp_send">Send</button>
            <div class="no_account">
                <p><a id="login_fp">Login Now</a></p>
            </div>
            <div class="modal_close">
                <p>+</p>
            </div>
        </div>
    </div>
</form>