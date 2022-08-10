<?php
$con=new mysqli('localhost','root','','personal_health_care');

  if($con){

  }else{
    die(mysqli_error($con));
  }
if (!empty($_GET['idd']) and empty($_GET['idu'])) {
	$_child_id = $_GET['idd'];
	
	$query=mysqli_query($con, "DELETE FROM `symptoms` WHERE `id` = '$_child_id'");
	header('location:illness_.php');


}elseif (!empty($_GET['idu']) and (empty($_GET['idd']))) {
	$_child_id = $_GET['idu'];
	$query=mysqli_query($con, "SELECT * FROM `symptoms` WHERE `id` = '$_child_id'");
	$fetch=mysqli_fetch_assoc($query);
	if (isset($_POST['create'])) {


	    $illness = (!empty($_POST['illness'])) ? $_POST['illness'] : '';
	    $symptoms = (!empty($_POST['symptoms'])) ? $_POST['symptoms'] : '';
	    $description = (!empty($_POST['description'])) ? $_POST['description'] : '';
	    $treatment = (!empty($_POST['treatment'])) ? $_POST['treatment'] : '';
		$id = (!empty($_POST['child_id_'])) ? $_POST['child_id_'] : '';
	    if (!empty($id)) {
	      //update the record
	      $ss_query = "UPDATE `symptoms` SET `illnesses`='$illness',`symptoms`='$symptoms',`description`='$description',`treatment`='$treatment' WHERE id='$id'";
	    }
	    $result = mysqli_query($con, $ss_query);
	    if ($result) {
	    	header('location:illness_.php?name='.$_child_id);
	    }
	}else{
		$illness=$fetch['illnesses'];
		$treatment=$fetch['treatment'];
		$description=$fetch['description'];
		$symptoms=$fetch['symptoms'];


	}    
}

?>
<html>
<head>
	<title>Illness Update</title>
</head>
<body>
	<div class="container">
        
            <h3>Update Illness</h3>
          
          <form action="" method="POST">
          	<dv>
                <label for="illness">Illness:</label>
                <input type="text" name="illness" required value="<?php echo $illness; ?>"><BR>
                <label for="symptoms">symptoms:</label>
                <input type="text" name="symptoms" required value="<?php echo $symptoms; ?>"><BR>
                <label for="description">description:</label>
                <input type="text" name="description" required value="<?php echo $description; ?>"><BR>
                <label for="treatment">treatment:</label>
                <input type="text" name="treatment" required value="<?php echo $treatment; ?>"><BR>
              </div>
              <div class="submit-data">
                <input type="hidden" name="child_id_" value="<?php echo $_child_id; ?>">
                <button class="submit-btn" name="create" type="submit">Update</button>
                <button class="cancel-btn" onClick="goBack()" type="reset">Cancel</button>
              </div>
          </form>
      </div>
</body>
</html>