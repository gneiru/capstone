<?php 
include ("includes/config.php");
if (isset($_GET['child_id']) and isset($_GET['id']) ) {
	$id=$_GET['child_id'];
	$survey_date=$_GET['id'];

$result = mysqli_query($Connection, "SELECT * FROM images where survey_id ='$id' and uploaded_on='$survey_date'");
}
$records = mysqli_num_rows($result);
if (empty($records)) {
	header("Location: child_details.php?lab=false&id=$id&svdate=$survey_date");
}else{
  $data = mysqli_fetch_assoc($result);
  header("Location: uploads/".$data['file_name'].".png");
}
?>
