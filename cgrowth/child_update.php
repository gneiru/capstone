<?php
session_start();
  if (isset($_POST['create'])) {

    //require the db connection
    include ("includes/config.php");

    $last_name = (!empty($_POST['last_name'])) ? $_POST['last_name'] : '';
    $first_name = (!empty($_POST['first_name'])) ? $_POST['first_name'] : '';
    $middle_name = (!empty($_POST['middle_name'])) ? $_POST['middle_name'] : '';
    $birth_date = (!empty($_POST['birth_date'])) ? $_POST['birth_date'] : '';
    $gender = (!empty($_POST['gender'])) ? $_POST['gender'] : '';
    $street = (!empty($_POST['street'])) ? $_POST['street'] : '';
    $barangay = (!empty($_POST['barangay'])) ? $_POST['barangay'] : '';
    $p_lastname = (!empty($_POST['p_lastname'])) ? $_POST['p_lastname'] : '';
    $p_firstname = (!empty($_POST['p_firstname'])) ? $_POST['p_firstname'] : '';
    $p_middlename = (!empty($_POST['p_middlename'])) ? $_POST['p_middlename'] : '';
    $id = (!empty($_POST['child_id_'])) ? $_POST['child_id_'] : '';
    $age = floor((time() - strtotime($birth_date)) / 2628000); //seconds in month

    $querycity="SELECT municipality from barangays where name='$barangay'";
    $cityresult=mysqli_query($Connection, $querycity); 
    $rowcity=mysqli_fetch_assoc($cityresult);
    $city=$rowcity['municipality'];
    if (!empty($id)) {
      //update the record
      $child_query = "UPDATE `newchild` SET lastname = '$last_name', firstname = '$first_name', middlename = '$middle_name', birthdate = '$birth_date', age = '$age', gender = '$gender', street = '$street', barangay = '$barangay', municipality = '$city', p_lastname = '$p_lastname', p_firstname = '$p_firstname', p_middlename = '$p_middlename' WHERE id = '$id' ";
        $msg = "update";
    }
    $result = mysqli_query($Connection, $child_query);

    if ($result) {
      $barangay;
      $que= "SELECT id from barangays where name = '$barangay'";
      $reslt = mysqli_query($Connection, $que); 
      $row = mysqli_fetch_assoc($reslt);
      $barg_id = $row['id'];//back Barangay
      if ($age<72) {
        header('location:childlistname.php?msg='.$msg.'&brgy='.$barg_id);
      }elseif ($age>=72) {
        date_default_timezone_set('Asia/Manila');
        $entry_date= date("F j, Y, g:i a");
        if (empty($_GET['archive'])) {
          $result = mysqli_query($Connection, "UPDATE newchild set archive = '$entry_date' where id = '$id' ");
        }
        header('location:archive.php?msg='.$msg);
      }
      
    }
  }

  if (isset($_GET['id']) && $_GET['id']!='') {
    //require the db connection
    include ("includes/config.php");

    $child_id = $_GET['id'];

    $child_query = "SELECT * FROM `newchild` WHERE id='$child_id' ";

    $child_result = mysqli_query($Connection, $child_query);

    $results = mysqli_fetch_row($child_result);

    $last_name = $results[1];
    $first_name = $results[2];
    $middle_name = $results[3]; 
    $birth_date = $results[4];
    $age = $results[5];
    $gender = $results[6];
    $street=$results[7];
    $barangay=$results[8];
    $municipality=$results[9];
    $p_lastname = $results[10];
    $p_firstname = $results[11];
    $p_middlename = $results[12];

  }
  else{
    $last_name = "";
    $first_name = "";
    $middle_name = ""; 
    $birth_date = "";
    $age="";
    $gender = "";
    $street=" ";
    $barangay="";
    $municipality="";
    $p_lastname = "";
    $p_firstname = "";
    $p_middlename = "";
    $child_id = "";
  }

mysqli_close($Connection);
$title = "ADD NEW CHILD - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?><style> <?php include "css/style.css"?></style>
      <main>
      <div class="container">
        <div class="new-child-container">
        <div class="table-container">
          <div class="title-page-new-child">
            <h3>Update Child Details</h3>
          </div>
        </div>  
          <form action="" method="POST">
            <div class="child-details">
              <div class="child-data">
                <label for="lastname">Last Name:</label>
                <input type="text" name="last_name" required value="<?php echo $last_name; ?>">
                <label for="firstname">First Name:</label>
                <input type="text" name="first_name" required value="<?php echo $first_name; ?>">
                <label for="middlename">Middle Name:</label>
                <input type="text" name="middle_name" placeholder="Optional" value="<?php echo $middle_name; ?>">
              </div>
              <div class="child-data-2">
                <label for="birthdate">Birthdate:</label>
                <input type="date" name="birth_date" required value="<?php echo $birth_date; ?>">
              </div>
              <div class="child-data-2">
                <label for="gender">Gender:
                <select name="gender">
                  <option value="Female" <?php if ($gender == 'Female') {
                    echo "selected";
                  } ?> >Female</option>
                  <option value="Male" <?php if ($gender == 'Male') {
                    echo "selected";
                  } ?> >Male</option>
                </select>
              </div>
              <div class="child-parent">
                <h3>Address</h3>
                <label style="margin-right: 50px;" for="street">Street:</label>
                <input type="text" name="street" placeholder="Optional" value="<?php echo $street; ?>">
                <label style="margin-right: 15px;" for="barangay">Barangay:</label>
                <input type="text" name="barangay" required value="<?php echo $barangay; ?>">
              </div>
              <div class="child-parent">
                <h3>Parent</h3>
                <label for="parent_last_name">Last Name:</label>
                <input type="text" name="p_lastname" required value="<?php echo $p_lastname; ?>">
                <label for="parent_first_name">First Name:</label>
                <input type="text" name="p_firstname" required value="<?php echo $p_firstname; ?>">
                <label for="parent_middle_name">Middle Name:</label>
                <input type="text" name="p_middlename" placeholder="Optional" value="<?php echo $p_middlename; ?>">
              </div>
              <div class="submit-data">
                <input type="hidden" name="child_id_" value="<?php echo $child_id; ?>">
                <button class="submit-btn" name="create" type="submit">Update</button>
                <button class="cancel-btn" onClick="goBack()" type="reset">Cancel</button>
              </div>
            </div>
          </form>
      </div>
      </div>
      </main>   
</div>  
</body>
</html>