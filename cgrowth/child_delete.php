<?php
session_start();
	include ("includes/config.php");
	if (!empty($_GET['id']) and empty($_GET['brgy'])) {
		//require the db connection

		$_child_id = $_GET['id'];
		
		$query=mysqli_query($Connection, "SELECT * FROM `newchild` WHERE `id` = '$_child_id'");
		$fetch=mysqli_fetch_array($query);

		//inserting to recycle bin
		if ($query) {
			mysqli_query($Connection, "INSERT INTO `trash` VALUES('$fetch[id]', '$fetch[lastname]', '$fetch[firstname]', '$fetch[middlename]', '$fetch[birthdate]', '$fetch[age]', '$fetch[gender]', '$fetch[street]', '$fetch[barangay]', '$fetch[municipality]','$fetch[p_lastname]', '$fetch[p_firstname]', '$fetch[p_middlename]', '$fetch[weight]', '$fetch[height]', '$fetch[weightstatus]', '$fetch[heightstatus]', '$fetch[w8_h8]', '$fetch[svdate]','$fetch[entrydate]')") or die(mysqli_error());
		}
		mysqli_query($Connection, "DELETE from intervention WHERE child_id = '$_child_id'");
		//deleting from list
		$delete_query = "DELETE FROM `newchild` WHERE id = '$_child_id'";
		$result = mysqli_query($Connection, $delete_query);
		if ($result) {
			header('location:childlistname.php?msg=del');
		}
	}
	if(!empty($_GET['prog'])){
		
		$prog=$_GET['prog'];
		$delete_query = "DELETE FROM `mechanism` WHERE id = '$prog'";
		$result = mysqli_query($Connection, $delete_query);
		if ($result) {
			header('location:intervention.php?msg=del');
		}
	}
	if(!empty($_GET['intdel']) and !empty($_GET['child_id'])){
		$intdel=$_GET['child_id'];
		$prog=$_GET['intdel'];

		$delete_query = "DELETE FROM `intervention` WHERE id = '$prog'";

		
		$result = mysqli_query($Connection, $delete_query);
		$intqry = "SELECT * FROM intervention where child_id='$intdel'";
    	$intresult = mysqli_query($Connection, $intqry);   

	    if ($intresult)
	    {
	      $intcount=mysqli_num_rows($intresult);
	      mysqli_query($Connection, "REPLACE INTO `intcount`(`child_id`,counts) VALUES ('$intdel', '$intcount')") or die(mysqli_error());
	      
	      }
		if ($result) {
			header('location:child_details.php?id='.$intdel);
		}
	}
	if(!empty($_GET['svdel']) and !empty($_GET['svc']) and !empty($_GET['svdate'])){
		$svc=$_GET['svc'];
		$svdel=$_GET['svdel'];
		$svdate=$_GET['svdate'];
		$svdate1=str_replace('/-|:/', null, $svdate);
		$filename=$svdate1.$svc;
		unlink("uploads/".$filename.".png");
		$delete_query = "DELETE FROM `childrecords` WHERE id = '$svdel'";
		$delete_img= mysqli_query($Connection, "DELETE FROM images where uploaded_on = '$svdate' and survey_id='$svdel'");
		$result = mysqli_query($Connection, $delete_query);
		if ($result) {
			$ssvdate= "SELECT svdate from intervention where id='$svdel' and svdate = (SELECT MAX(svdate)";
			$row = mysqli_fetch_assoc($ssvdate);
			$newdate=$row['svdate'];
			$updateq= "UPDATE `newchild` SET svdate = '$newdate' WHERE id = '$svc'";	
		}
		$result1 = mysqli_query($Connection, $updateq);
		if ($result and $result1 and $delete_img) {

			header('location:child_details.php?id='.$svc);
		}
	}
	if(!empty($_GET['brgy']) and !empty($_GET['id'])){
		$id=$_GET['id'];
		$brgy=$_GET['brgy'];
		$delete_query = "DELETE FROM `barangays` WHERE id = '$id'";
		$result = mysqli_query($Connection, $delete_query);
		if ($result) {
			header('location:barangays.php?brg='.$brgy);
		}
	}
	if(!empty($_GET['categi'])){
		$id=$_GET['categi'];
		$delete_query = "DELETE FROM `category_intervention` WHERE id = '$id'";
		$result = mysqli_query($Connection, $delete_query);
		if ($result) {
			header('location:intervention_categories.php?msg=del');
		}
	}
?>