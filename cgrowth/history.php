<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");

if ($_SESSION['role']=='enumerator') {
  $barangay=$_SESSION['barangay'];
  $query=mysqli_query($Connection, "SELECT * FROM `trash` where barangay = '$barangay' order by lastname, firstname");
}else{
$query=mysqli_query($Connection, "SELECT * FROM `trash` order by lastname, firstname");
}
$records = mysqli_num_rows($query);

$msg = "";
  if(empty($records)){
     $alert_msg1= "No Record!"; 
    }
  if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
    if ($msg=="Success") {
      $alert_msg="New Record has been added successfully!";
    }elseif ($msg=="Archive") {
      $alert_msg="Not acceptable age on record.";
    }elseif ($msg=="restore") {
      $alert_msg="Record has been restored!";
    }elseif ($msg=="perma") {
      $alert_msg="Record has been deleted permanently";
    }else{
      $alert_msg="Record has been updated successfully!";
    }
    header( "refresh:3;url=History.php" );

  }
mysqli_close($Connection);
$title = "History - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
<style> <?php include "css/style.css"?></style>
      <main>
      <div class="container">
        <div class="title-page" style="margin-top: 25px;">
            <h3>History</h3>
          </div>
        <?php if (empty($records)) { ?>
          <div style="background-color: #EAF2F8; color: black; width: 22%; font-size: 15px;">
              
              </div>
          <?php }?>
        <?php if (!empty($alert_msg)) { ?>
            
            <div style="background-color: #EAF2F8; color: black; width: 22%; font-size: 15px;">
              <?php echo $alert_msg; ?>
            </div>
          <?php }?>
     
      <div class="nutrition">

        <div class="table-nutrition">
          <table>
            <tr>
              <th style="font-size: 12px; width: 550px; height: 40px;" rowspan="2">Child Name</th>
              <th  style="font-size: 12px; width: 550px;" rowspan="2">Parent</th>
              <th  style="font-size: 12px; width: 400px;" rowspan="2">Barangay</th>
              <th  style="font-size: 12px; width: 300px;" rowspan="2">Birthday</th>
              <th  style="font-size: 12px; width: 170px;" rowspan="2">Age (Month/s)</th>
              <th  style="font-size: 12px; width: 170px;" rowspan="2">Weight (kg)</th>
              <th  style="font-size: 12px; width: 170px;" rowspan="2">Height (cm)</th>
              <th  style="font-size: 12px; width: 500px;" rowspan="2">Survey Date</th>
              <th  style="font-size: 12px;" colspan="3">Nutritional Status</th>
              <?php
              if ($_SESSION['role']=='admin') { 
              ?>
              <th  style="font-size: 12px; width: 170px;" rowspan="2">Action</th>
              <?php }?>
            </tr>
            <tr>
              <th style="font-size: 12px;">Weight for age</th>
              <th style="font-size: 12px;">Height for age</th>
              <th style="font-size: 12px;">Weight for height</th>
            </tr>

            <tr>
              <?php
                  if (!empty($records)) {
                    while ($row = mysqli_fetch_array($query)) {
                      ?>
              <td style="font-size: 12px;"><?php echo $row['lastname'].', '.$row['firstname'].' '.$row['middlename']; ?></td>
              <td style="font-size: 12px;"><?php echo $row['p_firstname'].' '.$row['p_middlename'].' '.$row['p_lastname']; ?></td>
              <td style="font-size: 12px;"><?php echo $row['barangay'];?></td>
              <td style="font-size: 12px;"><?php echo date("M d, Y", strtotime($row['birthdate']));?></td>
              <td style="font-size: 12px;"><?php echo $row['age'];?></td>
              <td style="font-size: 12px;"><?php echo $row['weight'];?></td>
              <td style="font-size: 12px;"><?php echo $row['height'];?></td>
              <?php
              if ($row['svdate']=="0000-00-00") {
                $x= "<b>No Survey Record</b>";
              }else{
                $x= date("M d, Y", strtotime($row['svdate']));
              }?>
              <td style="font-size: 12px;"><?php echo $x;?></td>
              <td style="font-size: 12px;"><?php echo $row['weightstatus'];?></td>
              <td style="font-size: 12px;"><?php echo $row['heightstatus'];?></td>
              <td style="font-size: 12px;"><?php echo $row['w8_h8'];?></td>

              <?php
              if ($_SESSION['role']=='admin') { 
              ?>
              <td style="font-size: 12px; width: 400px;">
                <button style="background-color: #fffff; ;"><a style="text-decoration: none; color: black;" href="child_restore.php?id=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Do you really want to restore?');">Restore</a></button>
              <button style="background-color: #126E82;"><a style="text-decoration: none; color: white;" href="child_restore.php?id2=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Do you really want to delete permanently?');">Delete</a></button>
              </td>
              <?php }
              ?>
            </tr>
            <?php
          }}?>
          <?php
                  if (empty($records)) {
                    
                      ?>
                <td style=""></td>
                <td style=""></td>
                <td style=""></td>
                <td style=""></td>
                <td style=""></td>
                <td style=""></td>
                <td style=""></td>
                <td style=""></td>
                <td style=""></td>
                <td style=""></td>
                <td style=""></td>
                <?php
              if ($_SESSION['role']=='admin') { 
              ?>
                <td style=""></td>
              <?php }?>
                </tr>
                <?php 
                
              }
                ?>
          </table>
          <?php
          if (!empty($alert_msg1) ){
            echo "<br><center><b>No Record!";
          }
            ?>

          
        </div>
      </div>
      </div>
    </main>
          </div>
</div>  
</body>
</html>