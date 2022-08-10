<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");



mysqli_close($Connection);
$title = "Policies - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
<style> <?php include "css/style.css"?></style>
      <main>
      <div class="container">
     
      <div class="graph">
        <div class="table-container">
          <div class="title-page">
            <h3>Policies</h3>
          </div>
            
          <form action="" method="post">
          <div style="float: left; width: 49%;">
          <div style="background-color: #FDFEFE; height: auto; margin-top: 30px;">

            <div class="table-container">
            <div class="title-page" style="margin-top: -10px;">
              <h3>Vision Statement</h3>
            </div>
            <div class="vision" style="margin-right: 20px; margin-left: 20px;">
              <center>
              <br> <p> The Department of Social Welfare and Developmental envisions all Filipinos free from hunger and poverty, have equal access to opportunities, enabled by a fair, just and peaceful society. </p> <br>
              </center>
            </div> 
          </div>
        </div>

        <div style="background-color: #FDFEFE; height: auto; margin-top: 30px; margin-bottom: 20px;">
          <div class="table-container">
            <div class="title-page" style="margin-top: -10px;">
              <h3>Quality Policy</h3>
            </div>
            <div class="policy" style="margin-right: 20px; margin-left: 20px;">
              <center>
              <br> <p> We, at the Department of Social Welfare and Development (DSWD) commit: </p>
              <p> <b> Deliver </b>, coordinate, and monitor social protection programs and services to the poor, vulnerable, and disadvantages population towards a fair, just, and peaceful society; </p>
              <p> <b> Sustain </b> a culture of excellence through continual improvement of systems, mechanisms, and procedures in the delivery of programs and services; </p>
              <p> <b> Work </b> with integrity and adhere to ethical standards for customer satisfaction and quality service by complying with the DSWS mandates, and other pertinent laws; and </p>
              <p> <b> Demonstrate </b> genuine concern for the poor, prompt compassionate service, and free from any form of corruption. </p>
              </center> <br>
            </div>
  
          </div>
        </div>
      </div>

      <div style="width: 49%; background-color: #FDFEFE; height: auto; float: right; margin-top: 30px;">
        <div class="table-container">
          <div class="title-page" style="margin-top: -10px;">
            <h3>Mission Statement</h3>
          </div>
          <div style="float: left; margin-bottom: 20px;">
            <div class="mission" style="margin-right: 20px; margin-left: 20px;">
              <center>
              <br> <p> To lead in the formulation, implementation, and coordination of social welfare and development policies and programs for and with the poor, vulnerable and disadvantaged. </p>
              </center>
            </div>
          </div>         
        </div>
      </div>

       <div style="width: 49%; background-color: #FDFEFE; height: auto; float: right; margin-top: 30px;">
        <div class="table-container">
          <div class="title-page" style="margin-top: -10px;">
            <h3>Core Values and DSWD Brand</h3>
          </div>
            <div class="corevalues" style="margin-right: 20px; margin-left: 20px;">
              <center>
              <br> <p> Maagap at Mapagkalingang Serbisyon </p>
              <p> Serbisyong Walang Puwang sa Katiwalian </p>
              <p> Patas na Pagtrato sa Komunidad </p>
              </center> <br>
            </div>
          </div>         
        </div>
      </div>
      </div>
          </form>
      </div>
    </main>
</body>
</html>