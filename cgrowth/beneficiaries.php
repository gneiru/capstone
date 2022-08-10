<?php
session_start();


include ("includes/config.php");
include ("includes/functions.php");

if (isset($_POST['rename'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
      $query = "UPDATE `mechanism` SET name = '$name' WHERE id = '$id'";
      $msg = "upd";
      $result = mysqli_query($Connection, $query);
    if ($result) {
      header('location:intervention.php?msg='.$msg);
    }
}
if (isset($_GET['prog'])) {
    //require the db connection
    include ("config.php");
    $id = $_GET['name'];
    $id = rawurldecode($id);
        $query = "SELECT i.child_id,p.barangay, i.svdate, p.id, p.lastname, p.middlename,p.firstname,d.counts
        FROM `intervention` as i
        LEFT JOIN newchild AS p
        ON p.id=i.child_id 
        LEFT JOIN intcount as d
        ON d.child_id = i.child_id 
        WHERE i.svdate = (SELECT MAX(i.svdate) FROM intervention as i WHERE i.child_id = p.id and age<72) and program = '$id'";
        $prog_results = mysqli_query($Connection, $query);
    }

function countings($x,$y){
  $query2="SELECT * from intervention where child_id = '$x' and program = '$y'";
  $presults = mysqli_query($Connection, $query2);
  $records = mysqli_num_rows($presults);
  echo $records;
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
            <h3><?php echo "  ".$_GET['name']." Benificiary List"?></h3>
          </div>
        </div>  
          <div class="table-list" style="margin-top: 30px;">
            <center>
              <table>
                <tr>
                  <th>Beneficiary Name</th>
                  <th>Latest Survey</th>
                  <th>Barangay</th>
                  <th>Intervention Taken</th>
                </tr>
                <tr>
                <?php
                  if (!empty($prog_results)) {   
                                 
                    while ($row = mysqli_fetch_assoc($prog_results)) {
                      ?>
                      <td style="text-align: left;padding-left: 25px;"><a href="child_details.php?id=<?php echo $row['child_id']?>"><?php echo '<b>'.$row['lastname'].'</b>, '.$row['firstname'].' '.$row['middlename']; ?></a></td>
                      <td><?php echo $row['svdate']?></td>
                      <td><?php echo $row['barangay']?></td>
                      <td><?php echo $row['counts']?></td>
                      </tr>
                      <?php 
                    }
                  }?>
                  <?php
                  if (empty($prog_results)) {
                    
                      ?>
                <td></td>
               <td></td>
               <td></td>
               
                </tr>
                <?php 
                
              }
                ?>
                
              </table>
            </center>
          </div>
      </div>
      </div>
      </main>   
</div>	
</body>
</html>