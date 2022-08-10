<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");
include ("includes/homequeries.php");

mysqli_close($Connection);
$title = "Admin Home - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
      
      <style>
      <?php include "css/style.css"?></style>
      <main>
      <div class="container">
        <div class="title-page" style="margin-top: 25px;">
            <?php 
              if (isset($_GET['city'])) {
                echo "<h3>".$_GET['city']." Analytics</h3>";
              }else {
                echo "<h3>Overall Analytics</h3>";
              }
            ?>
          </div>
        <div class="select-city" style="margin-top: 30px; margin-bottom: 30px; margin-right: -20px;">
        <select onchange="if (this.value) window.location.href=this.value" name="city" style="">
          <option value="admin_home.php">Select City to load:</option>
          <option value="admin_home.php?city=Bayambang">Bayambang</option>
          <option value="admin_home.php?city=Basista">Basista</option>
        </select>
        
        <div class="cards" style="margin-top: 30px;">
          <div class="card-single" onclick="document.location.href='childlistname.php'">
            <div class="card-info">
              <h1 style="font-size: 20px; color: white;"><?php echo $ChildCount ?></h1>
              <span style="font-size: 15px; color: white; font-weight: 550;">Child</span>
            </div>
            <div class="card-info" style="font-size: 18px; color: white;" >
              <span class="fa fa-users" ></span>
            </div>
          </div>
          <div class="card-single" onclick="document.location.href='archive.php'">
            <div class="card-info">
              <h1 style="font-size: 20px; color: white;"><?php echo $acount ?></h1>
              <span style="font-size: 15px; color: white; font-weight: 550;">Archived</span>
            </div>
            <div class="card-info" style="font-size: 18px; color: white;">
              <span class="fa fa-users"></span>
            </div>

          </div>
          <div class="card-single" onclick="document.location.href='parentlistname.php'">
            <div class="card-info">
              <h1 style="font-size: 20px; color: white;"><?php echo $pCount ?></h1>
              <span style="font-size: 15px; color: white; font-weight: 550;">Parent</span>
            </div>
            <div class="card-info" style="font-size: 18px; color: white;">
              <span class="fa fa-users"></span>
            </div>

          </div>
          
          <div class="card-single" onclick="document.location.href='user.php'">
            <div class="card-info">
              <h1 style="font-size: 20px; color: white;"><?php echo $ecount ?></h1>
              <span  style="font-size: 15px; color: white; font-weight: 550;">Enumerator</span>
            </div>
            <div class="card-info" style="font-size: 18px; color: white;">
              <span class="fa fa-users"></span>
            </div>

          </div>
        </div>
         <?php  include ("charts.php");?>
              
      </div>
      </main>  