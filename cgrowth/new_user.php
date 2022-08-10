<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");

$errors = array();
function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
if (isset($_POST['adduser'])) {
  $email= ValidateFormData($_POST['email']);
  if (preg_match('|@gmail.com$|', $email)){
    $name = ValidateFormData($_POST['name']);
    $brg = ValidateFormData($_POST['brg']);
    $role = ValidateFormData($_POST['role']);
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($Connection, $email_check);
    if(mysqli_num_rows($res) > 0){
      $alert_msg = "User already exists!";
      
    }elseif (mysqli_num_rows($res) == 0){ 
      $password= generateRandomString();
      $encpass = password_hash($password, PASSWORD_BCRYPT);
      $Query = "INSERT INTO `usertable` (id, name, email, password,code, role,barangay,status) VALUES (NULL, '$name', '$email', '$encpass', 0,'enumerator','$brg','verified')";
      $Result = mysqli_query($Connection, $Query);    
      $subject = "Your $role Account has been created";
      $message = "Name: $name \r\n Email: $email \r\n Password: $password";
      $headers = "From: ChildGrowth-Mal <CG_MS@gmail.com> \r\n";
      if(mail($email, $subject, $message, $headers) and $Result){
        header("Location: user.php?msg=Success");
      }else{
        $alert_msg = "Mail not sent!";

      }
    }
  }elseif (!(preg_match('|@gmail.com$|', $email))){
    $alert_msg = "Invalid email domain!";
  }
}

mysqli_close($Connection);
$title = "ADD NEW USER - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
      <main>
      <div class="container">
        <?php
      
        if (!empty($alert_msg)) { ?>
        <div class="alert ">
          <div class="alert-success">
            <?php echo $alert_msg; ?>
          </div>
        </div>
        <?php } ?>
        <div class="new-user-container">
        <div class="table-container">
          <div class="title-page-new-user">
            <h3>New User Details</h3>
          </div>
        </div>  
          
          <form action="" method="POST">
            <div class="admin-details">
              <div class="admin-data">
               <div class="admin-input">
                  <label for="name">Name:</label>
                  <input type="text" class="admin-name" name="name" required value=""><br>
               </div>
               <div class="admin-input">
                  <label for="email">Email:</label>
                  <input type="text" class="admin-name" name="email" required value=""><br>
               </div>
               <div class="admin-input">
                  <label for="Barangay">Barangay Assigned:</label>
                  <input type="text" class="admin-name" name="brg" required value=""><br>
               </div>
                <div class="admin-input">
                 <!-- <label for="role">Role:</label>
                  <select style="margin-top: 20px; margin-right: 50px;" name="role" class="admin-n">
                    <option selected value="coordinator">Coordinator</option>
                    <option value="enumerator">Enumerator</option>
                  </select>-->
                </div>
              <div class="submit-data" style="padding-top: 10px; padding-left: 75px;">
                <button class="submit-btn" name="adduser" type="submit">Add</button>
                <button class="cancel-btn" type="reset" onclick="goBack()">Cancel</button>
              </div>
            </div>
          </form>
        
      </div>
      </div>
      </main>   
</div>	
</body>
</html>