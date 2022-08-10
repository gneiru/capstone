<?php
session_start();


include ("includes/config.php");
include ("includes/functions.php");

if (isset($_POST['rename'])) {
    $name = $_POST['name'];
    $categ = $_POST['categ'];
    $id = $_POST['id'];
      $query = "UPDATE `mechanism` SET name = '$name', category= '$categ' WHERE id = '$id'";
      $msg = "upd";
      $result = mysqli_query($Connection, $query);
      
    if ($result) {
      header('location:intervention.php?categ='.$categ.'&msg='.$msg);
    }
}
if (isset($_GET['prog'])) {
    //require the db connection
    include ("config.php");

    $id = $_GET['prog'];
        $query = "SELECT * FROM `mechanism` WHERE id = '$id'";
        $prog_results = mysqli_query($Connection, $query);
        $results = mysqli_fetch_assoc($prog_results);
    }
    

mysqli_close($Connection);
$title = "RENAME PROGRAM- Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
<style> <?php include "css/style.css"?></style>
      <main>
      <div class="container">
        <div class="new-child-container">
        <div class="table-container">
          <div class="title-page">
            <h3>Intervention Mechanism</h3>
          </div>
        </div>  
    <center>
          <form action="" method="POST">
            <div class="admin-details">
              <div class="child-data">
               <div class="admin-input">
                  <label>
                  <label for="username">Program Name:</label>
                  <input type="text" class="admin-name" name="name" style="width: 270px;" value="<?php echo $_GET['name'];?>">
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                  <br>
                  <label for="categ" style="margin-left: -120px ;margin-right: -70px;margin-top: 20px;">Type:</label><select name="categ" style="margin-left: -50px;">
                    <option value="Behavioural">Behavioural</option>
                    <option value="Fortification">Fortification</option>
                    <option value="Supplementation">Supplementation</option>
                    <option value="Situational Actions">Situational Actions</option>
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