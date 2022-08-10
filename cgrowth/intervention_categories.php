<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");

if (isset($_POST['add'])) {
  $name = ValidateFormData($_POST['name']);
  $query_check = "SELECT * FROM category_intervention WHERE name = '$name'";
    $results=mysqli_query($Connection, $query_check);
    $records = mysqli_num_rows($results);
  if (empty($records)) {
    $Query = "INSERT INTO `category_intervention`(`id`, `name`) VALUES (NULL,'$name')";
        $Result = mysqli_query($Connection, $Query);
      if ($Result) {
        header("Location: intervention_categories.php?msg=Success");
      }
  }
  else{
    header("Location: intervention_categories.php?msg=fail");
  }
}
    $categ=$_GET['categ'];
    $sql = "SELECT * FROM `category_intervention` order by name";


    $intervention_results = mysqli_query($Connection, $sql);

    $intervention_records = mysqli_num_rows($intervention_results);

if (!empty($_GET['msg'])) {
    $msg=$_GET['msg'];
    if ($msg=='Success') {
      $alert_msg="Intervention Category added!";
      header( "refresh:3;url=intervention_categories.php" );
    }
    elseif ($msg=='fail'){
      $alert_msg= "Category already exists!";
      header( "refresh:3;url=intervention_categories.php?" );
    }elseif ($msg=='del'){
      $alert_msg= "Category deleted!";
       header( "refresh:3;url=intervention_categories.php?" );
    }elseif ($msg=='upd') {
      $alert_msg="Category updated successfully!";
      header( "refresh:3;url=intervention_categories.php?" );
    }
    
  }  

mysqli_close($Connection);
$title = "Intervention Categories - Child Growth and Malnutrition Monitoring System";
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
            <h3>Intervention Categories </h3>
          </div>

          <form action="" method="post">
            <div class="add_intervention">
              <label>Name:</label>
              <input type="text" name="name" placeholder="Category Name">
              <button name="add" type="submit">Add</button>
           </div>
          </form>
          <div class="table-list" style="margin-top: 50px;">
            <center>
              <table>
                <tr>
                  <th>Intervention Category List</th>
                  <th>Action</th>
                </tr>
                <?php
                  if (!empty($intervention_records)) {                    
                    while ($row = mysqli_fetch_assoc($intervention_results)) {
                      ?>
                <tr>
                <td style="text-align: left;padding-left: 25px;"><?php echo $row['name'];?></td>
                <td>
                    <button style="background-color: #e75480; width: 59%;" ><a style="text-decoration: none;color: white" href="intervention.php?categ=<?php echo $row['name']; ?>";>Intervention List</button>
                    <button style="background-color: #E74C3C;"><a href="child_delete.php?categi=<?php echo $row['id'];?>" onClick="javascript:return confirm('Do you really want to delete?');"><i class="far fa-trash-alt" style="color: white;"></i></a></button>
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