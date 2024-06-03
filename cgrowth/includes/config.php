<?php
error_reporting(0);
$Server = $_ENV['HOST'];
$Username = $_ENV['USERNAME'];
$Password = $_ENV['PASSWORD'];
$DB = $_ENV['DB']; //name of database
$Connection = mysqli_connect($Server, $Username, $Password, $DB);

if (!$Connection) {
	die("Connection Failed: " . mysqli_connect_error());
}
