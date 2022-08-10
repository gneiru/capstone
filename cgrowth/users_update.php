<?php
session_start();


include ("includes/config.php");
include ("includes/functions.php");

if (isset($_POST['addAdmin'])) {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email =  $_POST['email'];
    $barangay= $_POST['barangay'];
    $password = $_POST['password'];
    $encpass = password_hash($password, PASSWORD_BCRYPT);
    $cpassword = $_POST['cpassword'];

    if ($cpassword!=$password) {
      header('location:user.php?msg=passw');
    }elseif($cpassword==$password){
      $admin_query = "UPDATE `usertable` SET name = '$name', email = '$email', barangay= '$barangay' WHERE id = '$id'";
      $msg = "update";
      $result = mysqli_query($Connection, $admin_query);
      $s_query = "SELECT * FROM `usertable` WHERE `id` = $id ";
      $results = mysqli_fetch_assoc(mysqli_query($Connection, $s_query));
    
      if ($result) {
        header('location:user.php?msg='.$msg);
      }else{
        $alert_msg="Email is taken!";
      }
    }
}
if (isset($_GET['id']) && $_GET['id']!='') {
    $id = $_GET['id'];      
    $admin_query = "SELECT * FROM `usertable` WHERE id = '$id'";
        $admin_result = mysqli_query($Connection, $admin_query);
        $results = mysqli_fetch_assoc($admin_result);
        $hey = $results['name'];
        $hello = $results['email'];
        $rol= $results['role'];

        if ($rol=='admin') {
          header('location:user.php');
        }
        $yo= $results['barangay'];
}
mysqli_close($Connection);
$title = "USER UPDATE- Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
<style> <?php include "css/style.css"?></style>
      <main>
      <div class="container"><?php
        if (!empty($alert_msg)) { ?>
          <div class="alert ">
          <div class="alert-success alert-dismissible fade in">
            <a href="users_update.php?id=<?php echo $id?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $alert_msg; ?>
          </div>
        </div>
        <?php } ?>
        <div class="new-child-container">
        <div class="table-container">
          <div class="title-page-new-child">
            <h3>Update Users Details</h3>
          </div>
        </div>  
    
          <form action="" method="POST">
            <div class="admin-details">
              <div class="admin-data">
               <div class="admin-input">
                  <label for="username">Name:</label>
                  <input type="text" class="admin-name" name="name" required value="<?php echo $hey; ?>"><br>
               </div>
               <div class="admin-input">
                  <label for="email">Email:</label>
                  <input type="text" class="admin-name" name="email" required value="<?php echo $hello; ?>"><br>
                </div>
                <div class="admin-input">
                  <label for="brg">Barangay Assigned:</label>
                  <input type="text" class="admin-name" name="barangay" required value="<?php echo $yo; ?>"><br>
                </div>
                
              <div class="submit-data">
                <button class="submit-btn" name="addAdmin" type="submit">Update</button>
                <button class="cancel-btn" name="cancel" onClick="document.location.href='user.php'" type="reset">Cancel</button>
              </div>
            </div>
          </form>
        
      </div>
      </div>
      </main>   
</div>	
</body>
</html>