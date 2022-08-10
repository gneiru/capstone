<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");

if (isset($_GET['brgy'])) {

    $brgy = $_GET['brgy'];
    $que= "SELECT name from barangays where id = '$brgy'";
    $reslt = mysqli_query($Connection, $que); 
    $row = mysqli_fetch_assoc($reslt);
    $barg = $row['name'];
    if ($_SESSION['role']=='admin') {
      # code...
    }
    elseif ($_SESSION['barangay']!=$barg) {
      header('location:childlist.php');
    }
    $sql = "SELECT * FROM `newchild` WHERE barangay = '$barg' order by p_lastname, p_firstname, middlename";

    $results = mysqli_query($Connection, $sql);

    $records = mysqli_num_rows($results);    
  }else{
  $query = "SELECT * FROM `newchild` order by p_lastname, p_firstname, middlename";

  $results = mysqli_query($Connection, $query);
  $records = mysqli_num_rows($results);
  }
  $msg = "";
  if(empty($records)){
     echo "No Record!"; 
    }
  if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
    $alert_msg = ($msg == "Success") ? "New Record has been added successfully!" : (($msg == "del") ? "Record has been deleted successfully!" : "Record has been updated successfully!");
  }else{
    $alert_msg = "";
  }

mysqli_close($Connection);
$title = "ParentList Names - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
      <style> <?php include "css/style.css"?></style>
      <main>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
      
      <div class="container">

        
        <?php if (!empty($alert_msg)) { ?>
        <div class="alert ">
          <div class="alert-success">
            <?php echo $alert_msg; ?>
          </div>
        </div>
        <?php } ?>
        <div class="graph">
          <div class="table-container">
            <div class="title-page">
              <h3>Parent List <?php
              if (isset($_GET['brgy'])) {
                echo "of ".$barg;
              }?></h3>
            </div>

            <div class="table-list-child">
              
                <script type="text/javascript">$(document).ready( function () {
    $('#example').DataTable({"paging":   false,
        "ordering": true,
        "info":     false, "dom": '<"top"f>rt<"right"lp>'});

} );</script>
              <center>

              <table id="example" style="width: 70%">
                <thead>
                <tr>
                  <th style="width: 20%;">Parent Name</th>
                  <th style="width: 20%;">Child</th>
                  <th style="width: 30%;">Address</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if (!empty($records)) {
                    while ($row = mysqli_fetch_assoc($results)) {
                      ?>
                      
                        <tr>
                          <td style="text-align: left;padding-left: 25px;"><?php echo '<b>'.$row['p_lastname'].'</b>, '.$row['p_firstname'].' '.$row['p_middlename']; ?></td>
                          <td style="text-align: left;padding-left: 25px;"><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname']; ?></td>
                          <td style="text-align: left;padding-left: 25px;"><?php echo $row['street'].", <b>". $row['barangay']; ?></td>
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
</div>	
</body>
</html>