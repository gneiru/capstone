<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");

  //check GET request id
  
  if (isset($_GET['lab'])) {
    if ($_GET['lab']=='false') {
      $alert_msg="No lab image attached on ".date("F d, Y", strtotime($_GET['svdate'])).".";

    }
  }
  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM `newchild` WHERE id = $id";
    
    $result = mysqli_query($Connection, $sql);
    
    $record = mysqli_fetch_assoc($result);
    
    if (($_SESSION['barangay']!=$record['barangay']) and ($_SESSION['role']=='enumerator')) {
      header("Location: " . $_SERVER["HTTP_REFERER"]);
    }elseif($_SESSION['role'])

    mysqli_free_result($result);
    //intervention queries
    $i_sql="SELECT * from intervention where child_id=$id order by svdate";
    $interv_results = mysqli_query($Connection, $i_sql);

    $table_sql="SELECT * from childrecords where child_id = $id";
    $table_result=mysqli_query($Connection, $table_sql);

  }
  if (isset($_POST['intervene'])) {
    $program = $_POST['intervention'];
    $idate=ValidateFormData($_POST['surveydate']);

    if (!empty($program)){
      foreach($_POST['intervention'] as $value){
        mysqli_query($Connection, "INSERT INTO `intervention`(`id`, `child_id`, `program`,svdate) VALUES (NULL, '$record[id]', '$value','$idate')") or die(mysqli_error());

    }
    }
   
    $intqry = "SELECT * FROM intervention where child_id='$record[id]'";
    $intresult = mysqli_query($Connection, $intqry);   

    if ($intresult)
    {
      $intcount=mysqli_num_rows($intresult);
      mysqli_query($Connection, "REPLACE INTO `intcount`(`child_id`,counts) VALUES ('$record[id]', '$intcount')") or die(mysqli_error());
      
      }
    header('location:child_details.php?id='.$record['id']);

  }
  $m_sql="SELECT name FROM `mechanism`";
  $m_result=mysqli_query($Connection, $m_sql);
 


$title = "Child Details - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
<style> <?php include "css/style.css"?></style>
      <main>
      
      
      <div class="container">
        <div class="add-new-child" style="width: 7%">
         <a onclick="history.back()"><i class="fa fa-reply-all" aria-hidden="true"></i></a>
        </div>
        <?php
      
        if (!empty($alert_msg)) { ?>
          <div class="alert ">
          <div class="alert-success alert-dismissible fade in">
            <a href="child_details.php?id=<?php echo $id?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $alert_msg; ?>
          </div>
        </div>
        <?php } ?>
        <div class="child-details">
          <div class="table-container">
            <div class="child-title-page">
              <h3>Child Details</h3>
              <div class="growth">
                <a href="growth.php?id=<?php echo $id?>" style="display: inline-block; text-decoration: none;">Growth <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
              </div>
            </div>
          </div>
          
          <div class="details">
            
            <label>Name:</label>
            
            <?php echo $record['firstname'].' '.$record['middlename'].' '.$record['lastname']; ?>
             
            <br><br>
            <label>Birthday:</label>
            <?php echo date("F d, Y", strtotime($record['birthdate'])); ?>
            <br><br>
            <label>Age(Month):</label>
            <?php echo floor((time() - strtotime($record['birthdate'])) / 2628000);?>
            <br><br>
            <label>Gender:</label>
            <?php echo $record['gender']; ?>
            <br><br>
            <label>Parent Name:</label>
            <?php echo $record['p_firstname'].' '.$record['p_middlename'].' '.$record['p_lastname']; ?>
            <br><br>
            <label>Address:</label>
            <?php echo $record['street'].' '.$record['barangay'].', '.$record['municipality'].', Pangasinan'; ?>
          </div>
        </div>
        <div class="child-growth">
          <div class="table-child-growth">
            <table style="border: 3px solid #126e82;">
              <thead style="border: 3px solid #126e82;">
              <tr>
                <th>Survey Date</th>
                <th>Weight (kg)</th>
                <th>Height (cm)</th>
                <th>Height Status (Age)</th>
                <th>Weight Status (Age)</th>
                <th>Weight Status (Height)</th>
                <?php 
                  if ($_SESSION['role']=="admin") {
                    ?>
                    <th>Added By </th><?php

                  }
                ?>
                <th style="width: 15%">Action</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  if (empty(mysqli_num_rows($table_result))) {
                    ?><tr>
                      <td height="30px"></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                <?php
                }
                 while ($record = mysqli_fetch_assoc($table_result)) { ?>
              <tr>
                
                <td style="border: 3px solid #126e82;"><?php              
                  if ($record['svdate']=='0000-00-00') {
                    echo "<b>No survey yet</b>";
                  }else{
                    echo date("F d, Y", strtotime($record['svdate']));
                  }
                ?></td>
                <td style="border: 3px solid #126e82;"><?php
                 if ($record['weight']=='0') {
                    echo " ";
                  }else{
                    echo $record['weight'];
                  }
                 ?></td>
                <td style="border: 3px solid #126e82;"><?php
                 if ($record['height']=='0') {
                    echo " ";
                  }else{
                    echo $record['height'];
                  }
                 ?></td>
                <td style="border: 3px solid #126e82;"><?php echo $record['heightstatus'];?></td>
                <td style="border: 3px solid #126e82;"><?php echo $record['weightstatus'];?></td>
                <td style="border: 3px solid #126e82;"><?php echo $record['w8_h8'];?></td>
                <?php 
                  if ($_SESSION['role']=="admin") {
                    ?>
                    <td style="border: 3px solid #126e82;"><?php echo $record['added_by'];?></td><?php

                  }
                ?>
                <td style="border: 3px solid #126e82;height: 40px; color: #126e82;">
                  
                    <button><a class="labtest" style="text-decoration: none;background-color: white" href="gallery.php?id=<?php echo $record['svdate'];?>&child_id=<?php echo $id; ?>"><i class="fas fa-vial"></i> Lab Test</button>
                  
                  <button style="background-color: white;"><a href="child_delete.php?svdel=<?php echo $record['id']; ?>&svc=<?php echo $record['child_id']; ?>&svdate=<?php echo $record['svdate']; ?>" onClick="javascript:return confirm('Do you really want to delete?');"><i class="fa fa-trash-alt"  style="color: #5E7786;"></i></a></button></td>
              </tr>
            <?php }?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="child-growth" style="margin-top: 30px;">
          <div class="child-title-page" style="margin-bottom: 20px;">
              <h3>Intervention</h3>
          </div>
          <form action="" method="POST" style="">
            <div class="intervention">
              <div class="intervention-data">
                <label>Survey Date:</label>
                <input type="date" name="surveydate" style="margin-left: 10px;" required>
              </div>

              <div class="intervention-data-2" style="overflow: scroll;width: 500px;height: 300px">
                <label>Intervention List:<br><br>
                  <?php
                    
                    while ($mrow = mysqli_fetch_array($m_result)) {
                    ?>
                  <input type="checkbox" style = "display:initial; margin-left: -80px;" value="<?php echo $mrow['name']; ?>" name="intervention[]"><p style="margin-left: 60px; padding-top:-20px; margin-top: -30px;"><?php echo $mrow['name']; ?></p><br>
                  <?php } ?>
              </div> 

              <button class="save-btn" name="intervene" type="save" style="margin-top: 30px; margin-left: 100px;">Save</button>

            </div>
          </form>

          <div class="table-intervention">
         <!--   <script>$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers", searching:false, info:false
    } );
} );</script>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/sc-2.0.5/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/sc-2.0.5/datatables.min.js"></script>*/-->
              <table id="example" style="border: 3px solid #126e82;">
                  <thead style="border: 3px solid #126e82; height: 40px; background-color: #126e82; color: white;">
                  <tr>
                    <th>Survey Date</th>
                    <th>Intervention</th>
                    <th style="width: 15px;">Action</th>
                  </tr>
                  </thead>
                  <tbody >
                    <?php
                  if (empty(mysqli_num_rows($interv_results))) {
                    ?><tr>
                      <td height="30px"></td><td></td><td></td>
                    </tr>
                    <?php
                      }
                        while ($rw = mysqli_fetch_array($interv_results)) {
                        ?>
                  <tr>
                    <td style="border: 3px solid #126e82;height: 40px; color: #126e82;"><?php echo date("m-d-y", strtotime($rw['svdate'])); ?></td>
                    <td style="border: 3px solid #126e82;height: 40px; color: #126e82;"><?php echo $rw['program']; ?></td>
                    <td style="border: 3px solid #126e82;height: 40px; color: #126e82;"><button style="background-color: white;"><a href="child_delete.php?intdel=<?php echo $rw['id']; ?>&child_id=<?php echo $rw['child_id']; ?>" onClick="javascript:return confirm('Do you really want to delete?');"><i class="fa fa-trash-alt"  style="color: #5E7786;"></i></a></button></td>
                
                  </tr>
                <?php  }?>
                  </tbody>
              </table>
          </div>

        </div>

       
          </div>
      </div>
      </main> 