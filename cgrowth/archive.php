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
    $sql = "SELECT * FROM `newchild` WHERE barangay = '$barg' AND age>=72";

    $results = mysqli_query($Connection, $sql);

    $records = mysqli_num_rows($results);    
  }else{
  $query = "SELECT p.*,a.counts
            FROM newchild AS p  
            LEFT JOIN intcount AS a  
            ON p.id=a.child_id where age>=72;";

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
    header( "refresh:3;url=archive.php" );
  }else{
    $alert_msg = "";
  }

mysqli_close($Connection);
$title = "Archived Childlist - Child Growth and Malnutrition Monitoring System";
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
              <h3>Archive<?php
              if (isset($_GET['brgy'])) {
                echo "of ".$barg;
              }?></h3>
            </div>
            <div class="nutrition">
            <div class="table-nutrition">
              <script type="text/javascript">$(document).ready( function () {
    $('#example').DataTable({"paging":   false,
        "ordering": true,
        "info":     false});
} );
</script>
              <table id="example" style="width: 100%;">
                <thead>
                <tr>
              <th style="font-size: 12px; width: 15%;">Child Name</th>
              <th  style="font-size: 12px; width: 15%;" >Parent</th>
              <th  style="font-size: 12px; width: 10%;" >Barangay</th>
              <th  style="font-size: 12px; width: 10%;" >Birthday</th>
              <th  style="font-size: 12px; width: 8%;" >Age (Month/s)</th>
              <th  style="font-size: 12px; width: 8%;" >Weight (kg)</th>
              <th  style="font-size: 12px; width: 8%;" >Height (cm)</th>
              <th  style="font-size: 12px; width: 15%;" >Survey Date</th>
              <th style="font-size: 12px;width: 20%;" >Weight for age</th>
              <th style="font-size: 12px;width: 20%;" >Height for age</th>
              <th style="font-size: 12px;width: 20%;" >Weight for height</th>
              <th  style="font-size: 12px; width: 10%;" >Intervention Taken</th>
              <th  style="font-size: 12px; width: 10%;" >Date Archived</th>
              <?php
              if ($_SESSION['role']=='admin') {
              ?>
              <th style="font-size: 12px; width: 10%;" >Action</th>
              <?php
            }?>
              
              
            </tr>
            </thead>
            <tbody>
                <?php
                  if (!empty($records)) {
                    while ($row = mysqli_fetch_assoc($results)) {
                     
                      $fetchcount = mysqli_fetch_assoc($countresults);
                      
                      ?>
                      
                        <tr>
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
                          <td style="font-size: 12px; width: 100px;"><?php echo $row['weightstatus'];?></td>
                          <td style="font-size: 12px; width: 100px;"><?php echo $row['heightstatus'];?></td>
                          <td style="font-size: 12px; width: 100px;"><?php echo $row['w8_h8'];?></td>
                          <td style="font-size: 12px;"><?php echo $row['counts'];?></td>
                          <td style="font-size: 12px;"><?php echo $row['archive'];?></td>
                          <?php
              if ($_SESSION['role']=='admin') {
              ?>
                          <td style="font-size: 12px; width: 100px;">
                            <button style="background-color: white;"><a href="child_details.php?id=<?php echo $row['id']; ?>"><i class="fas fa-eye" style="color: #126E82;"></i></a></button>
                            <button style="background-color: white;"><a href="child_update.php?id=<?php echo $row['id']; ?>&archive=yes"><i class="fa fa-edit" style="color: #126E82;"></i></a></button>
                            <button style="background-color: white;"><a href="child_delete.php?id=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Do you really want to delete?');"><i class="fa fa-trash-alt"  style="color: #126E82;"></i></a></button>
                          </td>
                        <?php } ?>
                        </tr>

                      <?php
                    } 
                  }?>
                
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