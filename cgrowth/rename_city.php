<?php
session_start();


include ("includes/config.php");
include ("includes/functions.php");

if (isset($_POST['rename'])) {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $id = $_POST['id'];
      $query = "UPDATE `barangays` SET `name` = '$name', `municipality`= '$city' WHERE `id` = '$id'";
      $msg = "upd";
      $result = mysqli_query($Connection, $query);
      
    if ($result) {
      header('location:barangays.php?brg='.$city.'&msg='.$msg);
    }
}
if (isset($_GET['brg'])) {
    //require the db connection
    include ("config.php");

    $id = $_GET['brg_id'];
        $query = "SELECT * FROM `barangays` WHERE id = '$id'";
        $prog_results = mysqli_query($Connection, $query);
        $results = mysqli_fetch_assoc($prog_results);
    }

mysqli_close($Connection);
$title = "RENAME BARANGAY- Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
<style> <?php include "css/style.css"?></style>
      <main>
      <div class="container">
        <div class="new-child-container">
        <div class="table-container">
          <div class="title-page">
            <h3>Edit Barangay</h3>
          </div>
        </div>  
    <center>
          <form action="" method="POST">
            <div class="admin-details">
              <div class="child-data">
               <div class="admin-input">
                  <label>
                  <label for="username">Program Name:</label>
                  <input type="text" class="admin-name" name="name" style="width: 270px;" value="<?php echo $_GET['brg'];?>">
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                  <br>
                  <label for="city" style="margin-left: -120px ;margin-right: -70px;margin-top: 20px;">Municipality:</label><select name="city" style="margin-left: -50px;">
                    <option value="Bayambang">Bayambang</option>
                    <option value="Basista">Basista</option>
                  </select>
               </div>
              <div class="submit">
                <br><BR><BR>
                <button class="submit-btn" name="rename" type="submit">Update</button>
                <button class="cancel-btn" name="cancel" onClick="goBack()" type="reset">Cancel</button>
              </div>
            </div>
          </form>
        </center>
      </div>
      </div>
      </main>   
</div>	
</body>
</html>