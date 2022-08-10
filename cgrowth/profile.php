<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");

$error="";
$email=$_SESSION['email'];
  $query = "SELECT * FROM `usertable` where email='$email'";

  $results = mysqli_query($Connection, $query);
  $row = mysqli_fetch_assoc($results);
  $e_mail=$row['email'];
  $n_ame=$row['name'];

if (isset($_POST['addAdmin'])) {
  $name=ValidateFormData($_POST['name']);
  $email=ValidateFormData($_POST['email']);
  $password=ValidateFormData($_POST['password']);
  $cpassword=ValidateFormData($_POST['cpassword']);
  if($password!=$cpassword){
   $error="Password don't match";
  }else{
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($Connection, $email_check);
    if(mysqli_num_rows($res) > 0 and $email != $e_mail){
      $error = "User already exists!";
      
    }else{
    $encpass = password_hash($password, PASSWORD_BCRYPT);
    mysqli_query($Connection, "UPDATE `usertable` SET `name`='$name',email='$email',password='$encpass' WHERE email='$e_mail'");
    $error="Profile Updated Successfully!";
    }
  }
  
}

mysqli_close($Connection);
$title = "Profile - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
<style> <?php include "css/style.css"?></style>
      <main>
      <div class="container">
        <?php
      
        if (!empty($error)) { ?>
        <div class="alert ">
          <div class="alert-success">
            <?php echo $error; 
            
            ?>

          </div>

        </div>
        <?php } ?>
      <div class="container-admin">
        <div class="table-container">
          <div class="title-page">
            <h3>My Profile</h3>
          </div>
          <div class="">
          <form action="" method="POST">
            <div class="admin-details">
              <div class="admin-data">
                <?php
                  if ($_SESSION['role']=='enumerator') {?>
                    <label>Barangay Nutrition Scholar <?php echo " of ".$_SESSION['barangay'];?></label><br>
                  <?php
                  }
                ?>
                  
               <div class="admin-input">
                  <label for="name">Name:</label>
                  <input type="text" class="admin-name" name="name" required value="<?php echo $n_ame;?>"><br>
               </div>
               <div class="admin-input">
                  <label for="email">Email:</label>
                  <input type="text" class="admin-name" name="email" required value="<?php echo $e_mail;?>"><br>
               </div>
               <div class="admin-input">
                  <label for="password">Password:</label>
                  <input type="password" class="admin-name" name="password" required value=""><br>
                </div>
                <div class="admin-input">
                  <label for="cpassword">Re-type Password:</label>
                  <input type="password" class="admin-name" name="cpassword" required value="">
                </div>
              <div class="submit-data" style="padding-top: 10px; padding-left: 75px;">
                <button class="submit-btn" name="addAdmin" type="submit">Update</button>
                <button class="cancel-btn" type="reset" onclick="goBack()">Cancel</button>
              </div>
            </div>
          </form>
           </div>
        </div>
      </div>
      </div>
    </main> 
</body>
</html>