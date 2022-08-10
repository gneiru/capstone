<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");
if ($_SESSION['role']=='enumerator') {
  header('location:admin_home.php');
}
  $query = "SELECT * FROM `usertable` ";

  $results = mysqli_query($Connection, $query);
  $records = mysqli_num_rows($results);
  $msg = "";
  if(empty($records)){
     echo "No Record!"; 
    }
  if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
    $alert_msg = ($msg == "Success") ? "New User has been added successfully!" : (($msg == "del") ? "Record has been deleted successfully!" : "Record has been updated successfully!");
    if ($msg=="exists") {
      $alert_msg= "Email already exists in the database!";
      # code...
    }elseif($msg=="errsend"){
      $alert_msg= "Error sending mail!";
    }elseif($msg=="invalid"){
      $alert_msg= "Email invalid!";
    }elseif ($msg=="passw") {
      $alert_msg= "Password don't match!";
    }
    header( "refresh:3;url=user.php" );
  }else{
    $alert_msg = "";
  }

mysqli_close($Connection);
$title = "Users - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
<style> <?php include "css/style.css"?></style>
      <main>
      <div class="container">
        <div class="add-new-user">
          <a href="new_user.php">
            New Users <i class="fa fa-plus-circle" aria-hidden="true"></i>
          </a>
        </div>
        <?php if (!empty($alert_msg)) { ?>
        <div class="alert ">
          <div class="alert-success">
            <?php echo $alert_msg; ?>
          </div>
        </div>
        <?php } ?>
      <div class="container-admin">
        <div class="table-container">
          <div class="title-page">
            <h3>Users List</h3>
          </div>
          <div class="table-list" style="margin-top: 30px;">
            <script type="text/javascript">$(document).ready( function () {
    $('#example').DataTable({"paging":   false,
        "ordering": true,
        "info":     false, "dom": '<"top"f>rt<"right"lp>'});

} );</script>

            <center>
            <table style="width: 90%;" id="example">
              <thead>
                <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password (HASH)</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead><tbody>
              <?php
                  if (!empty($records)) {
                    while ($row = mysqli_fetch_assoc($results)) {
                      ?>
                        <tr>
                          <td style="text-align: left; padding-left: 10px;"><?php echo $row['name']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo mb_strimwidth($row['password'], 10, -40, "..."); ?></td>
                          <td><?php echo $row['role']; ?></td>
                          <td><div class="nodec">
                            <?php 
                              if ($row['role']=='enumerator' or $row['role']=='coordinator') {?>
                                <button style="background-color: #3498DB;"><a href="users_update.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit"></i></a></button><?php
                              }else{?>
                                <button style="background-color: #3498DB;"><i class="f  fa-times-circle"></i></button><?php
                              }
                            ?>
                            
                            <button style="background-color: #E74C3C;"><a href="user_delete.php?id=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Do you really want to delete?');"><i class="fa fa-trash-alt"></i></a></button>
                            </div>
                          </td>
                        </tr>
                      <?php
                    }
                  }
                ?>
                </tbody>
            </table>
            </center>
          </div>
        </div>
      </div>
      </div>
    </main> 
</body>
</html>