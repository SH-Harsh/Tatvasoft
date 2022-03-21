<?php $base_url = "http://localhost/helperland/index.php";  ?>

<div class="bg-modal-create">
    <div class="modal-create">
        <p class="login text-center mb-1">Create an account</p>

        <div style="text-align: center;">
            <div class="star_side_line"></div>
            <img src="assets/images/separator.png" class="separator_img">
            <div class="star_side_line"></div>
        </div>

        <form onsubmit="return checkPassword(this)" method="POST" action="<?php echo "$base_url?function=insertaccountdetails"  ?>">

            <div class="alert alert-danger login_error" role="alert" style="display: none;">

            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="First name" name="fname" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Last name" name="lname" required>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col">
                    <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                </div>
                <div class="col">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+91</div>
                        </div>
                        <input type="text" class="form-control" name="phone_no" placeholder="Mobile No" required maxlength="10" pattern="[7-9]{1}[0-9]{9}" title="Enter valid 10 digit number">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="password" class="form-control" placeholder="Password" required name="password1">
                </div>
                <div class="col">
                    <input type="password" class="form-control" placeholder="Confirm Password" required name="password2">
                </div>
            </div>

            <div class="remember_me ml-2 my-3">
                <input type="checkbox" id="remember" name="remember" required>
                <label for="remember">I have read the <span>privacy policy</span></label>
            </div>

            <div class="register_account">
                <button type="submit" name="register">Register</button>
            </div>

        </form>

        <div class="already_reg">
            <p>Already registered? <a id="login_create">Login Now</a></p>
        </div>
    </div>
</div>