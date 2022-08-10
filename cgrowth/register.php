<?php include ("includes/controllerUserData.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Registration Form - Child Growth and Malnutrition Monitoring System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login_style.css">
</head>
<body>
    <div class="container" style="width: 72%; height: 400px; margin-top: -90px;">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <div class="logo">
                    <img src="img/img1.png" style="width: 250px; margin-top: -20px; margin-bottom: -20px; margin-left: 13px;">
                <form action="register.php" method="POST" autocomplete="">
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <label><br>Full Name:</label>
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password:</label>
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="register" value="Register">
                    </div>
                    <div class="link login-link text-center">Already registered? <a href="index.php">Login here</a></div>
                </form>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html>