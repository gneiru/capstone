<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");

if (($_GET['zero'])=='true') {
    $child_query = "SELECT * FROM `barangays` where childcount>0 order by childcount desc";
    $results = mysqli_query($Connection, $child_query);
    $records = mysqli_num_rows($results);
    
}else{
    $child_query = "SELECT * FROM `barangays` order by id";
    $results = mysqli_query($Connection, $child_query);
    $records = mysqli_num_rows($results);
    
}
if(isset($_GET["page"]))
  {
    $page=$_GET["page"];
    $page=preg_replace('#[^a-z]#i', '', $page);
    $child_query = "SELECT * FROM barangays WHERE name LIKE '$page%'"; 
  }
  elseif(!isset($_GET["page"]) AND !isset($_GET["zero"]))
  {
    $child_query = "SELECT * FROM barangays LIMIT 0,12"; 
  }
  $results = mysqli_query($Connection, $child_query);
  $records = mysqli_num_rows($results);
$op=1;
while ($op <= 78) { //child counting per barangay
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

$Query = "SELECT * FROM newchild where age<72";
$Result = mysqli_query($Connection, $Query);   
    if ($Result)
    {
        $ChildCount = mysqli_num_rows($Result);
      }

mysqli_close($Connection);
$title = "Individual Report - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
<style> <?php include "css/style.css"?></style>
      <main>
      <div class="container">
     
      <div class="graph">
        <div class="table-container">
          <div class="title-page">
            <h3>Child List</h3>
          </div>
          <?php
          if (!empty($_SESSION["Error"])) { ?>
            <div class="alert-success alert-dismissible fade in">
              <a href="individual_report.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $_SESSION["Error"]; 
                $_SESSION["Error"]=""
                ?>

              </div>
            </div>
          <?php } ?>
          <div class="table-list">
            <center>
            <table>
              <tr>
                <th onclick="document.location.href='childlist.php?zero=false'">Name of Barangay</th>
                <th onclick="document.location.href='childlist.php?zero=true'">Total Child</th>
                <th>Action</th>
              </tr>
              <tr>
                <td style="text-align: left;padding-left: 25px;">All</td>
                <td><h1 style="font-size: 14px; color: black;"><?php echo $ChildCount ?></h1></td>
                <td><button type="" name="" onclick="document.location.href='individual_growth.php'">Child List</button></td>
              </tr>
              
                <?php
                  if (!empty($records)) {
                    $i=1;
                    while ($row = mysqli_fetch_assoc($results)) {
                      $i++;
                      ?>
                <tr>
                <td style="text-align: left;padding-left: 25px;"><?php echo $row['name'];?></td>
      
                <center><td><?php echo $row['childcount'];?></td></center>
                <td><button style="<?php if ($i%2==0) {
                  ?>background-color: white;<?php
                }?>" name="" onclick="document.location.href='individual_growth.php?brgy=<?php echo $row['id']; ?>'">Child List</button></td>
                </tr>
                <?php 
                }
              }
                ?>
            </table>
            <?php 
        
                $page=range('A','Z');
                echo '<ul class="pagination">';
                foreach ($page as $alphabet) {
                  echo '<li><a href="individual_report.php?page='.$alphabet.'">'.$alphabet.'</a></li>';
                }
                echo '</ul>';
        ?>
            
            </center>
          </div>
        </div>
      </div>
      </div>
    </main>
          </div>
</div>	
</body>
</html>