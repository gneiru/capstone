<?php
session_start();


include ("includes/config.php");
include ("includes/functions.php");

if (isset($_POST['addchild'])) {
  $lastname = $firstname = $middlename = $birthdate = $age = $gender = $street = $barangay = $p_lastname = $p_firstname = $p_middlename = "";

  $lastname = ValidateFormData($_POST['lastname']);
  $firstname = ValidateFormData($_POST['firstname']);
  $middlename = ValidateFormData($_POST['middlename']);
  $birthdate = ValidateFormData($_POST['birthdate']);
  $age = floor((time() - strtotime($birthdate)) / 2628000);
  $gender = ValidateFormData($_POST['gender']);
  $street = ValidateFormData($_POST['street']);
  $barangay = ValidateFormData($_POST['barangay']);
  $p_lastname = ValidateFormData($_POST['p_lastname']);
  $p_firstname = ValidateFormData($_POST['p_firstname']);
  $p_middlename = ValidateFormData($_POST['p_middlename']);
  $timezone = date_default_timezone_get();
  date_default_timezone_set('Asia/Manila');
  $entry_date= date("F j, Y, g:i a");

  $querycity="SELECT municipality from barangays where name='$barangay'";
    $cityresult=mysqli_query($Connection, $querycity); 
    $rowcity=mysqli_fetch_assoc($cityresult);
    $city=$rowcity['municipality'];

  //checking if record exists
    $query_check = "SELECT * FROM newchild WHERE firstname = '$firstname' AND lastname = '$lastname' AND middlename= '$middlename'";
    $results=mysqli_query($Connection, $query_check);
    $records = mysqli_num_rows($results);
    $qry_brg="SELECT * FROM barangays WHERE name = '$barangay'";
    $brg_results=mysqli_query($Connection, $qry_brg);
    $brg_records= mysqli_num_rows($brg_results);

    if (!empty($records)){
      $alert_msg = "Barangay already exists!";
      }
    elseif (empty($brg_records)) {
      $alert_msg = "Invalid Barangay!";
    }
    elseif ($age>=72) {
      $alert_msg = "Invalid Record - Reached the age limit!";
    }
    elseif ($age<72 AND empty($records) AND !empty($brg_records)) {
      
      $Query = "INSERT INTO `newchild`(`id`, `lastname`, `firstname`, `middlename`, `birthdate`, `age`, `gender`, `street`, `barangay`,`municipality`,`p_lastname`, `p_firstname`, `p_middlename`, `svdate`, entrydate) VALUES (NULL,'$lastname','$firstname','$middlename','$birthdate','$age','$gender','$street','$barangay','$city','$p_lastname','$p_firstname','$p_middlename', '$timezone', '$entry_date')";
      $Result = mysqli_query($Connection, $Query);
      if ($Result) {
        $op=1;
        while ($op <= 500) { //child counting per barangay
            $que= "SELECT name from barangays where id = '$op'";
            $reslt = mysqli_query($Connection, $que); 
            $row = mysqli_fetch_assoc($reslt);
            $barg = $row['name'];
            $sql = "SELECT * FROM `newchild` WHERE barangay = '$barg' AND age<72 order by lastname, firstname, middlename";


            $ress = mysqli_query($Connection, $sql);

            $rec = mysqli_num_rows($ress);
            mysqli_query($Connection, "UPDATE `barangays` SET `childcount`='$rec' WHERE name='$barg'");
            $op++;
        }
        header("Location: childlistname.php?msg=Success");
      }
    }else {
      echo "Error: " . $Query . "<br />" . mysqli_error($Connection);
    }
} 

mysqli_close($Connection);
$title = "ADD NEW CHILD - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
<style> <?php include "css/style.css"?></style>
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
        <div class="new-child-container">
        <div class="table-container">
          <div class="title-page-new-child">
            <h3>New Child Details</h3>
          </div>
        </div>  
          <form action="" method="POST">
            <div class="child-details">
              <div class="child-data">
                <label>Last Name:</label>
                <input type="text" name="lastname" required=>
                <label>First Name:</label>
                <input style="margin-left: 25px;" type="text" name="firstname" required>
                <label>Middle Name:</label>
                <input type="text" name="middlename" placeholder="Inital/Name (Optional)">
              </div>
              <div class="child-data-2">
                <label>Birthdate:</label>
                <input type="date" name="birthdate" required>
                <label>Gender:
                <select style="margin-left: 65px; margin-top: -10px; position: relative;" name="gender" required>
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                </select>
              </div>
              <div class="child-parent">
                <h3>Address</h3>
                <label>Street:</label>
                <input style="margin-left: 40px" type="text" name="street" placeholder="House No./Street">
                <label>Barangay:</label>
                <?php 
                  if ($_SESSION['role']=='admin') {?>
                    <input style="margin-left: 40px;" type="text" name="barangay" required>
                  <?php
                  }elseif ($_SESSION['role']=='enumerator') {
                    echo '<b>'.$_SESSION['barangay'];?>
                    <input type="hidden" name="barangay" value="<?php echo $_SESSION['barangay'];?>">
                  <?php
                }
                ?>
                
              </div>
              <div class="child-parent">
                <h3><b>Parent/Guardian</b></h3>
                <label style="margin-right: 10px;">Last Name:</label>
                <input type="text" name="p_lastname" required>
                <label>First Name:</label>
                <input style="margin-left: 25px;" type="text" name="p_firstname" required>
                <label>Middle Name:</label>
                <input type="text" name="p_middlename" placeholder="Optional">
              </div>
              
            
              <div class="submit-data" style="">
                <button class="submit-btn" name="addchild" type="submit">Submit</button>
                <button class="cancel-btn" onclick="goBack()" name="cancel" type="reset">Cancel</button>
              </div>
            </div>
          </form>
      </div>
      </div>
      </main>   
</div>	
</body>
</html>