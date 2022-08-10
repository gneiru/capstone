<?php include ("includes/controllerUserData.php"); 
if ($_SESSION['name']) {
  header("Location: admin_home.php");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="img/tabicon.png">
    <script>
    history.pushState(null, null, null);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, null);
    });
</script>
    <meta charset="UTF-8">
    <title>User Login Form - Child Growth and Malnutrition Monitoring</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login_style.css">
</head>
<body>
    <div class="container" style="width: 72%; height: 450px;">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <div class="logo">
                    <img src="img/img1.png" style="width: 250px; margin-left: 13px;">
                <form action="index.php" method="POST" autocomplete="">
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group"><br>
                        <label>Email Address:</label>
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>" >
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet registered? <a href="register.php">Register now</a></div>
                </form>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html>