<?php
session_start();
include ("includes/config.php");
include ("includes/functions.php");


if ($_SESSION['role']=='enumerator') {
  $barangay=$_SESSION['barangay'];
  $subsql= "and barangay='$barangay'";
}
if (isset($_GET['brgy'])) {
    
    $brgy = $_GET['brgy'];
    $que= "SELECT name from barangays where id = '$brgy'";
    $reslt = mysqli_query($Connection, $que); 
    $row = mysqli_fetch_assoc($reslt);
    $barg = $row['name'];
    if ($_SESSION['role']=='admin') {
      # code...
    }
    elseif ($_SESSION['barangay']!=$barg and $_SESSION['role']=='enumerator') {
      header('location:childlist.php');
    }

    $sql = "SELECT p.*,a.counts
            FROM newchild AS p  
            LEFT JOIN intcount AS a  
            ON p.id=a.child_id where barangay = '$barg' AND age<72 order by lastname, firstname, middlename";


    $results = mysqli_query($Connection, $sql);

    $records = mysqli_num_rows($results);    
  }else{
    
  $query = "SELECT p.*,a.counts
            FROM newchild AS p  
            LEFT JOIN intcount AS a  
            ON p.id=a.child_id where age<72 $subsql ORDER BY `lastname`, firstname ";

  $results = mysqli_query($Connection, $query);
  $records = mysqli_num_rows($results);
  }
  $msg = "";

  if (!empty($_GET['exists'])) {
    $msg=$_GET['exists'];
    if ($msg=='true') {
      $alert_msg="Child aleady exists!";
    }
    elseif ($msg=='brg'){
      $alert_msg= "Invalid Barangay!";
    }header( "refresh:3;url=childlistname.php" );
  }
  
  elseif (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
    $alert_msg = ($msg == "Success") ? "New Record has been added successfully!" : (($msg == "del") ? "Record has been deleted successfully!" : "Record has been updated successfully!");
    $alert_msg = ($msg == "Success") ? "New Record has been added successfully!" : (($msg == "del") ? "Record has been deleted successfully!" : "Record has been updated successfully!");
    if ($msg=='del' or $msg=='Success') {
      header( "refresh:3;url=childlistname.php" );
    }elseif ($msg=='update') {
      header( "refresh:3;url=childlistname.php?brgy=$brgy" );
    }
    if($msg=='Archive'){

    $alert_msg = "Invalid Record - Reached the age limit!";
  }
    
  }

mysqli_close($Connection);
$title = "ChildList Names - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
      <style> <?php include "css/style.css"?></style>
      <main>
      
      <div class="container">

        <div class="add-new-child">
         <a href="new_child.php">New Child <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
        </div>
        <?php
      
        if (!empty($alert_msg)) { ?>
        <div class="alert ">
          <div class="alert-success">
            <?php echo $alert_msg; ?>
          </div>
        </div>
        <?php } ?>
        <div class="graph">
          <div class="table-container">
            <div class="title-page">
              <h3 >Child List <?php
              if (isset($_GET['brgy'])) {
                if(empty($_GET['brgy'])) {
                ?>
                <script type="text/javascript">
                  alert("Invalid Barangay!");
                  window.location = 'childlistname.php';
                </script>
                <?php
              }
                echo "of ".$barg;
              }

              ?>
                <button type="warning" name="" onclick="document.location.href='childlist.php'"><i class="fa fa-reply-all" aria-hidden="true"></i></button>

              </h3>
            </div>

            

            <div class="table-list-child">
              <script type="text/javascript">$(document).ready( function () {
    $('#example').DataTable({"paging":   false,
        "ordering": true,
        "info":     false, "dom": '<"top"f>rt<"right"lp>'});

} );</script>
              <center>

              <table id="example">
                <thead>
                <tr>
                  <!--<th style="width: 30px;">#</th>-->
                  <th style="width: 300px;">Name</th>
                  <th style="width: 300px;">Parent Name</th>
                  <th style="width: 100px;">Gender</th>
                  <th style="width: 100px;">Entry Date</th>
                  <!--<th style="width: 100px;">Intervention Taken</th>   -->               
                  <th style="width: 250px;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  if (!empty($records)) {
                    while ($row = mysqli_fetch_assoc($results)) {
                      ?>
                        <tr>
                          <!--<td ><input class="checkbox" type="checkbox" name='check[]' style="display: inline-block;" value=".$row['id']." /></td>-->
                          <td style="text-align: left;padding-left: 25px; width: 15%"><?php echo '<b>'.$row['lastname'].'</b>, '.$row['firstname'].' '.$row['middlename']; ?></td>
                          <td style="text-align: left;padding-left: 25px; width: 15%"><?php echo $row['p_firstname'].' '.$row['p_middlename'].' '.$row['p_lastname']; ?></td>
                          <td style="text-align: left;padding-left: 10px; width: 8%"><?php echo $row['gender']; ?></td>
                          <td style="text-align: left;padding-left: 25px; width: 20%"><?php echo $row['entrydate']; ?></td>
                          <!--<td style="width: 3%"><center><?php //if (empty($row['counts'])) {
                           // echo "None";

                          //}else{ echo $row['counts'];} ?></center></td>-->
                          <td style="width: 25%">

                            <button style="background-color: #2ECC71; width: 30%"><a href="child_details.php?id=<?php echo $row['id']; ?>"><i class="fas fa-info-circle">Details</i></a></button>
                            <button style="background-color: #3498DB;"><a href="child_update.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit"><br></i></a></button>
                            <button style="background-color: #E74C3C;"><a href="child_delete.php?id=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Do you really want to delete?');"><i class="fa fa-trash-alt"><br></i></a></button>
                          </td>

                        </tr>
                      <?php
                      $i++;
                    } 
                  }
                ?>
                <?php
                  if (empty($records)) {
                    
                      ?>
                <td style="width: 15%;"></td>
                <td style="width: 15%;"></td>
                <td style="width: 8%;"></td>
                <td style="width: 20%;"></td>
                <td style="width: 30%;"></td>
                </tr>
                <?php 
                
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