<?php
error_reporting(0);
$Server = "127.0.0.1";
$Username = "root";
$Password = "";
$DB = "personal_health_care";
$Connection = mysqli_connect($Server, $Username, $Password, $DB);
if (!empty($_GET['idd']) and empty($_GET['idu'])) {
	$_child_id = $_GET['idd'];
	
	$query=mysqli_query($Connection, "DELETE FROM `symptoms` WHERE `id` = '$_child_id'");
	$result = mysqli_query($Connection, $query);
	if ($result) {
		header('location:illness_.php');
	}
}