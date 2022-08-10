<?php
	include ("includes/config.php");

	if (!empty($_GET['id'])) {

		$_enumerator_id = $_GET['id'];
	    $records = mysqli_num_rows(mysqli_query($Connection, "SELECT email from usertable where id = '$_enumerator_id'"));
	    
		$delete_query = "DELETE FROM `usertable` WHERE id = '$_enumerator_id'";

		$result = mysqli_query($Connection, $delete_query);
		if ($records['email'] == $_SESSION['email']){
			header('location:logout.php');
		}
		if ($result) {
			
				header('location:user.php?msg=del');
			
		}

	}
?>