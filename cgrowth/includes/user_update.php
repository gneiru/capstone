<?php 

if (isset($_GET['id'])) {
    //require the db connection
    include ("config.php");

    $id = $_GET['id'];
    if ($password == $cpassword) {
        $admin_query = "SELECT `name`, `email`, `password` FROM `usertable` WHERE id = '$id'";
        $admin_result = mysqli_query($Connection, $admin_query);
        $results = mysqli_fetch_row($admin_result);
        $name = $results[0];
        $email = $results[1];
        $password = $results[2];
    }
}
  else{
    $name = "";
    $email = "";
    $password = "";
    mysqli_close($Connection);
  }
if (isset($_POST['addAdmin'])) {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $encpass = password_hash($password, PASSWORD_BCRYPT);
    $cpassword = $_POST['cpassword'];

      $admin_query = "UPDATE `usertable` SET name = '$name', email = '$email', password = '$encpass' WHERE id = '$id'";
      $msg = "update";
      $result = mysqli_query($Connection, $admin_query);
      $s_query = "SELECT `role` FROM `usertable` WHERE `id` = $id ";
        $results = mysqli_fetch_row(mysqli_query($Connection, $s_query));
        $role = $results[0];

    if ($result AND $role=='admin') {
      header('location:user.php?msg='.$msg);
    }elseif ($result AND $role=='enumerator') {
      header('location:user.php?msg='.$msg);
    }
}
  ?>