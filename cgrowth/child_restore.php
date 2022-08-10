<?php
session_start();
	if (!empty($_GET['id'])) {
		//require the db connection
    	include("includes/config.php");

		$_child_id = $_GET['id'];
		
		$query=mysqli_query($Connection, "SELECT * FROM `trash` WHERE `id` = '$_child_id'");
		$fetch=mysqli_fetch_array($query);

		//restoring to child list
		mysqli_query($Connection, "INSERT INTO `newchild` VALUES('$fetch[id]', '$fetch[lastname]', '$fetch[firstname]', '$fetch[middlename]', '$fetch[birthdate]', '$fetch[age]', '$fetch[gender]', '$fetch[street]', '$fetch[barangay]', '$fetch[municipality]','$fetch[p_lastname]', '$fetch[p_firstname]', '$fetch[p_middlename]', '$fetch[weight]', '$fetch[height]', '$fetch[weightstatus]', '$fetch[heightstatus]', '$fetch[w8_h8]', '$fetch[svdate]', '$fetch[entrydate]','')") or die(mysqli_error());


		//removing from recycle bin
		$delete_query = "DELETE FROM `trash` WHERE id = '$_child_id'";
		$result = mysqli_query($Connection, $delete_query);
		if ($result) {
			header('location:history.php?msg=restore');
		}
	}elseif (!empty($_GET['id2'])) {
		include ("includes/config.php");

		$_child_id = $_GET['id2'];

		//perma remove from recycle bin
		$delete_query = "DELETE FROM `trash` WHERE id = '$_child_id'";
		$result = mysqli_query($Connection, $delete_query);
		if ($result) {
			header('location:history.php?msg=perma');
		}
	}
?>