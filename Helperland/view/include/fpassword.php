<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <link rel="stylesheet" href="assets/css/style3.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- IMPORT BOOTSTRAP SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


</head>

<body>
    <div class="fp_box">
        <form class="form_fp" action="http://localhost/helperland/index.php?function=changepassword&parameter=
                                <?php echo $_GET["parameter"] ?>" method="POST" onsubmit="return changepassword(this)">

            <div class="alert alert-danger login_error" role="alert" style="display: none;">

            </div>
            <div class="form-group">
                <label for="password" class="label_fp">New Password</label>
                <input type="password" class="form-control" id="email" name="password" placeholder="New Password" required>
            </div>
            <div class="form-group">
                <label for="cpassword" class="label_fp">Confirm Password</label>
                <input type="password" class="form-control" id="email" name="cpassword" placeholder="Confirm Password" required>
            </div>

            <button type="submit" class="save_fp">Save</button>
        </form>
    </div>

    <script src="assets/js/responsive.js"></script>
</body>

</html>