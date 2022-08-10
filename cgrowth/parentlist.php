<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");

  if(isset($_GET["page"])){
    $page=$_GET["page"];
    $page=preg_replace('#[^a-z]#i', '', $page);
    $child_query = "SELECT * FROM barangays WHERE name LIKE '$page%' order by name"; 
  }
  else
  {
    $child_query = "SELECT * FROM barangays order by name LIMIT 0,12"; 
  }
  $results = mysqli_query($Connection, $child_query);
  $records = mysqli_num_rows($results);

mysqli_close($Connection);
$title = "Parent List - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
<style> <?php include "css/style.css"?></style>
      <main>
      <div class="container">
     
      <div class="graph">
        <div class="table-container">
          <div class="title-page">
            <h3>Parent List</h3>
          </div>

        

          <div class="table-list">
            <center>
            <table>
              <tr>
                <th>Name of Barangay</th>
                <th>Action</th>
              </tr>
              <?php
              if ($_SESSION['role']=='admin') { 
                ?>
                <tr>
                  <td style="text-align: left;padding-left: 25px;">All</td>
                  <td><button type="" name="" onclick="document.location.href='parentlistname.php'"><small>Parent List</small></button></td>
                </tr>
                <?php
              }?>
              <tr>
                <?php
                  if (!empty($records)) {
                    while ($row = mysqli_fetch_array($results)) {
                    ?>
                <td style="text-align: left;padding-left: 25px;"><?php echo $row['name']; ?></td>
                <td style="font-size: 14px; background-color: white">
                  <?php if ($_SESSION['barangay']==$row['name'] or $_SESSION['role']=='admin') {
                ?>
                  <button style="<?php if ($i%2==0) {
                  ?>background-color: white; height:10%;<?php
                }?>" name="" onclick="document.location.href='parentlistname.php?brgy=<?php echo $row['id']; ?>'"><small>Parent List</small></button><?php
              }?>
              </td>
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
                  echo '<li><a href="parentlist.php?page='.$alphabet.'">'.$alphabet.'</a></li>';
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