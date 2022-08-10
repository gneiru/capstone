<?php
session_start();
include ("includes/config.php");
include ("includes/functions.php");

if (isset($_POST['add'])) {
  $name = ValidateFormData($_POST['name']);
  $municipality= ValidateFormData($_POST['brgy']);
  $query_check = "SELECT * FROM barangays WHERE name = '$name' and municipality = '$municipality'";
    $results=mysqli_query($Connection, $query_check);
    $records = mysqli_num_rows($results);
  if (empty($records)) {
    $Query = "INSERT INTO `barangays`(`name`, `municipality`, `id`, `childcount`) VALUES ('$name','$municipality',NULL,'0')";
      $Result = mysqli_query($Connection, $Query);
      if ($Result) {
        header("Location: barangays.php?brg=$municipality&msg=Success");
      }elseif($Result==false){
        header("Location: barangays.php?brg=$municipality&msg=fail");
      }
  }
  else{
    header("Location: barangays.php?brg=$municipality&msg=fail");
  }
}
$brgy=$_GET['brg'];

if (!empty($_GET['msg'])) {
    $msg=$_GET['msg'];
    if ($msg=='Success') {
      $alert_msg="Barangay successfully added!";
    }
    elseif ($msg=='fail'){
      $alert_msg= "Barangay already exists!";
      
    }elseif ($msg=='del'){
      $alert_msg= "Barangay deleted!";
    }
  }  
if(isset($_GET["page"]) and !empty($_GET["brg"])){
    $page=$_GET["page"];
    $page=preg_replace('#[^a-z]#i', '', $page);
    $child_query = "SELECT * FROM barangays WHERE name LIKE '$page%' and municipality = '$brgy'"; 
  }
  else{
    $child_query = "SELECT * FROM barangays where municipality = '$brgy' order by name LIMIT 0,12 "; 
  }
  $results = mysqli_query($Connection, $child_query);
  $records = mysqli_num_rows($results);
mysqli_close($Connection);
$title = "Barangays - Child Growth and Malnutrition Monitoring System";
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
        <div class="graph">
          <div class="table-container">
            <div class="title-page">
              <h3 >Barangay List <?php if (!empty($_GET['brg'])) {
              echo "of ".$_GET['brg'];
            }?> </h3>
            </div>
            <br>
            <form action="" method="post">
              <div class="add_new_barangay">
                <label>Name:</label>
                <input type="text" name="name" placeholder="Barangay Name">
                <input type="hidden" name="brgy" value="<?php echo $brgy?>">
                <button name="add" type="submit">Create</button>
              </div>
            </form>
            
            <div class="table-list-child">
              <center>

              <table style="width: 50%;">
                <tr>
                  <!--<th style="width: 30px;">#</th>-->
                  <th style="width: 25%">Name of Barangay</th>
                  <!--<th style="width: 100px;">Intervention Taken</th>   -->               
                  <th style="width: 25%;">Action</th>
                </tr>

                <?php
                  if (!empty($records)) {                    
                    while ($row = mysqli_fetch_assoc($results)) {
                      ?>
                <tr>
                <td style="text-align: left;padding-left: 25px;"><?php echo $row['name'];?></td>
                <td>
                    <button style="background-color: #e75480;"><a style="text-decoration: none;color: white" href="childlistname.php?brgy=<?php echo $row['id']; ?>";>Childlist</button>
                    <button style="background-color: #3498DB; color: white;"><a style="text-decoration: none;color: white" href="rename_city.php?brg_id=<?php echo $row['id']; ?>&brg=<?php echo $row['name']; ?>";>Edit</button>
                    <button style="background-color: #E74C3C;"><a href="child_delete.php?id=<?php echo $row['id']; ?>&brgy=<?php echo $row['municipality']; ?>" onClick="javascript:return confirm('Do you really want to delete?');"><i class="far fa-trash-alt" style="color: white;"></i></a></button>
                  </td>
                </tr>
                <?php 
                }
              }elseif (empty($records)) {
                ?><tr><td><td></td></td></tr><?php
              }
                ?>
                
              
              </table>
              <?php 
        
                $page=range('A','Z');
                echo '<ul class="pagination">';
                foreach ($page as $alphabet) {
                  echo '<li><a href="barangays.php?brg='.$brgy.'&page='.$alphabet.'">'.$alphabet.'</a></li>';
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
</body>
</html>