<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");

if (isset($_POST['add'])) {
  $name = ValidateFormData($_POST['mechanism_name']);
  $query_check = "SELECT * FROM mechanism WHERE name = '$name'";
  $categ= ValidateFormData($_POST['categ']);
    $results=mysqli_query($Connection, $query_check);
    $records = mysqli_num_rows($results);
  if (empty($records)) {
    $Query = "INSERT INTO `mechanism`(category,`id`, `name`) VALUES ('$categ',NULL,'$name')";
        $Result = mysqli_query($Connection, $Query);
      if ($Result) {
        header("Location: intervention.php?categ=$categ&msg=Success");
      }
  }
  else{
    header("Location: intervention.php?categ=$categ&msg=fail");
  }
}
    $categ=$_GET['categ'];
    $sql = "SELECT * FROM `mechanism` where category='$categ'";


    $intervention_results = mysqli_query($Connection, $sql);

    $intervention_records = mysqli_num_rows($intervention_results);

if (!empty($_GET['msg'])) {
    $msg=$_GET['msg'];
    if ($msg=='Success') {
      $alert_msg="Intervention Program added!";
      header( "refresh:10;url=intervention.php?categ=$categ" );
    }
    elseif ($msg=='fail'){
      $alert_msg= "Program already exists!";
      header( "refresh:3;url=intervention.php?categ=$categ" );
    }elseif ($msg=='del'){
      $alert_msg= "Program deleted!";
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }elseif ($msg=='upd') {
      $alert_msg="Program updated successfully!";
      header( "refresh:3;url=intervention.php?categ=$categ" );
    }
    
  }     

mysqli_close($Connection);
$title = "Intervention - Child Growth and Malnutrition Monitoring System";
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
            <h3>Intervention Mechanism <?php if (!empty($_GET['categ'])) {
              echo "for ".$_GET['categ'];
            }?> </h3>
          </div>

          <form action="" method="post">
            <div class="add_intervention">
              <label>Name:</label>
              <input type="text" name="mechanism_name" placeholder="Program Name">
              <input type="hidden" name="categ" value="<?php echo $categ?>">
              <button name="add" type="submit">Create</button>
           </div>
          </form>
          <div class="table-list" style="margin-top: 50px;">
            <center>
              <table>
                <tr>
                  <th>List of Intervention</th>
                  <th>Action</th>
                </tr>
                <?php
                  if (!empty($intervention_records)) {                    
                    while ($row = mysqli_fetch_assoc($intervention_results)) {
                      ?>
                <tr>
                <td style="text-align: left;padding-left: 25px;"><?php echo $row['name'];?></td>
                <td>
                    <button style="background-color: #e75480;"><a style="text-decoration: none;color: white" href="beneficiaries.php?prog=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>";>View</button>
                    <button style="background-color: #3498DB; color: white;"><a style="text-decoration: none;color: white" href="rename_program.php?prog=<?php echo $row['id']; ?>&name=<?php echo $row['name']; ?>&category=<?php echo $row['category']; ?>";>Edit</button>
                    <button style="background-color: #E74C3C;"><a href="child_delete.php?prog=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Do you really want to delete?');"><i class="far fa-trash-alt" style="color: white;"></i></a></button>
                  </td>
                </tr>
                <?php 
                }
              }
                ?>
                
              </table>
            </center>
          </div>
        </div>

        
      </div>

      </div>
      </div>

      </div>
    </main>
          </div>
</div>	
</body>
</html>