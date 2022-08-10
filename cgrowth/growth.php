<?php
session_start();
include ("includes/config.php");


if (isset($_POST['growth_update'])) {
$height=(!empty($_POST['height'])) ? $_POST['height'] : '';
$weight=(!empty($_POST['weight'])) ? $_POST['weight'] : '';
$heightstatus=(!empty($_POST['heightstatus'])) ? $_POST['heightstatus'] : '';
$weightstatus=(!empty($_POST['weightstatus'])) ? $_POST['weightstatus'] : '';
$id = (!empty($_POST['child_det'])) ? $_POST['child_det'] : '';  
$gender = (!empty($_POST['gender'])) ? $_POST['gender'] : '';
$age = (!empty($_POST['age'])) ? $_POST['age'] : '';
$survey_date = (!empty($_POST['survey_date'])) ? $_POST['survey_date'] : '';
date_default_timezone_set('Asia/Manila');
$datenao = date('Ymd');
$datenao2= date("Ymd", strtotime($survey_date));
if ($_SESSION['role']=='admin') {
  $added_by=$_SESSION['role'];
}elseif ($_SESSION['role']=='enumerator') {
  $added_by=$_SESSION['name'];
}


      if (!empty($id)) {
        if ($age==0) {
          $age=0;
        }
        if ($gender=="Male") {
          $height_result = mysqli_query($Connection, "SELECT * FROM `heightboy` WHERE age=$age");
          $weight_result = mysqli_query($Connection, "SELECT * FROM `boystandards` WHERE age=$age");
                  
        }elseif ($gender=="Female") {
          $height_result = mysqli_query($Connection, "SELECT * FROM `heightgirls` WHERE age=$age");
          $weight_result = mysqli_query($Connection, "SELECT * FROM `girlstandards` WHERE age=$age");
        }
        $recordc = mysqli_fetch_assoc($height_result); //height standards
        $recordd= mysqli_fetch_assoc($weight_result); //weight standards 
        $height=floatval($height);
        $weight=floatval($weight);
        
        if ($height<=$recordc['ss']) {
          $heightstatus= 'severely stunted';
          $bs=1;
        }elseif ($height>=$recordc['fs'] AND $height<=$recordc['ts']) {
          $heightstatus= 'stunted';
          $bs=2;
        }elseif ($height>=$recordc['fn'] AND $height<=$recordc['tn']) {
          $heightstatus= 'normal';
          $bs=3;
        }elseif ($height>=$recordc['t']) {
          $heightstatus= 'tall';
          $bs=4;
        }
        if ($weight<=$recordd['su']) {
          $weightstatus= 'severely underweight';
          $bsi=1;
        }elseif ($weight>=$recordd['fuw'] AND $weight<=$recordd['tuw']) {
          $weightstatus= 'underweight';
          $bsi=2;
        }elseif ($weight>=$recordd['fn'] AND $weight<=$recordd['tn']) {
          $weightstatus= 'normal';
          $bsi=3;
        }elseif ($weight>=$recordd['o']) {
          $weightstatus= 'overweight';
          $bsi=4;
        }
        if ($bsi==$bs) {
          if ($bsi==1) {
            $bmi_status="severely wasted";
          }elseif ($bsi==2) {
            $bmi_status="wasted";
          }elseif ($bsi==3) {
            $bmi_status="normal";
          }elseif ($bsi==4) {
            $bmi_status="obese";
          }
        }elseif ($bsi!=$bs) {
          $meter=$height/100;
          $bmi=$weight/($meter*$meter);
          if ($bmi<12.33) {
            $bmi_status="severely wasted";
          }elseif ($bmi>=12.33 AND $bmi<16.67) {
            $bmi_status="wasted";
          }elseif ($bmi>=16.67 AND $bmi<20) {
            $bmi_status="normal";
          }elseif ($bmi>=20) {
            $bmi_status="obese";
          }
        }
      //update the record
        $checksv= mysqli_query($Connection, "SELECT svdate from childrecords where svdate = '$survey_date' and child_id='$id'");
        $recsv = mysqli_num_rows($checksv);
        if ($recsv>0) {
          $error="Survey Day already occupied";
        }
        elseif ($datenao2>$datenao) {
          $error="Invalid date. You are from the future, aren't you?! ";
        }
        else{
          $child_query = "INSERT INTO `childrecords`(`id`, `child_id`, `svdate`, `weight`, `height`, `age`, `heightstatus`, `weightstatus`, `w8_h8`, `added_by`) VALUES (NULL,'$id','$survey_date','$weight','$height','$age','$heightstatus','$weightstatus','$bmi_status','$added_by' )";


          $filename = $_FILES["uploadfile"]["name"];
          $tempname = $_FILES["uploadfile"]["tmp_name"]; 
          $d8= str_replace('/-|:/', NULL, $survey_date);
          $imgname=$d8.$id;
          $folder = "uploads/".$imgname.".png";
          
          if (move_uploaded_file($tempname, $folder))  {
            $sql = "INSERT INTO images (survey_id,file_name,uploaded_on) VALUES ('$id','$imgname','$survey_date')";
            mysqli_query($Connection, $sql);
          }else{
          }

          $reslt=mysqli_query($Connection, "SELECT svdate from newchild where id = '$id'");
          $row = mysqli_fetch_assoc($reslt);
          $xvdate=$row['svdate'];
          if ($xvdate<$survey_date) {
             mysqli_query($Connection, "UPDATE `newchild` SET svdate='$survey_date',height='$height', weight='$weight', heightstatus='$heightstatus', weightstatus='$weightstatus', w8_h8='$bmi_status' WHERE id = '$id'");
          }
       
        
      }
      $result1 = mysqli_query($Connection, $child_query);
      

      if ($result1) {
        header('location:child_details.php?id='.$id);
      }
        }
        
    }
    if (isset($_GET['id']) && $_GET['id']!='') {
      //require the db connection
      include ("includes/config.php");

      $child_det = $_GET['id'];

      $child_query = "SELECT * FROM `newchild` WHERE id='$child_det' ";

      $child_result = mysqli_query($Connection, $child_query);

      $results = mysqli_fetch_assoc($child_result);
      $age = $results[age];
      $gender = $results[gender];
      $height = $results[height];
      $weight = $results[weight];
      $weightstatus = $results[weightstatus];
      $heightstatus = $results[heightstatus];
      $survey_date=$results[svdate];
      $bmi_status=$results[w8_h8];

    }else{
      $height = "";
      $age= "";
      $gender = "";
      $weight = "";
      $weightstatus = "";
      $heightstatus = "";
      $child_det = "";
      $survey_date="";
      $bmi_status="";

    }

mysqli_close($Connection);
$title = "Child Growth - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?><style><?php include "css/style.css"?></style>
<main>
      <div class="container">
        <?php
      
        if (!empty($error)) { ?>
        <div class="alert ">
          <div class="alert-success alert-dismissible fade in">
            <a href="growth.php?id=<?php echo $id?>" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $error; 
            
            ?>

          </div>

        </div>
        <?php } ?>

        <div class="new-user-container">
        <div class="table-container">
          <div class="title-page-new-user">
            <h3>Add Growth Details</h3>
          </div>
        </div>  
    
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="growth-details">
              <div class="growth-data">
               <div class="growth-input">
                  <label for="height" style="margin-left: -5px;">Survey Date:</label>
                  <input type="date" style="margin-right: 20px;" class="Height" name="survey_date" required><br>
               </div>
               <div class="growth-input">
                  <label for="height">Height (cm):</label>
                  <input type="number" class="Height" name="height" required><br>
               </div>
               <div class="growth-input">
                  <label for="weight">Weight (kg):</label>
                  <input style="margin-left: 40px;" type="number" class="Weight" name="weight" required><br>
               </div>
               <div class="growth-input">
                  <label for="file">Lab Test Image: </label>
                  <input type="file" name="uploadfile" style="margin-left: 140px;margin-top: -30px;">
               </div>
               <div class="submit-data" style="float: right; margin-right: 480px; ">
                <input type="hidden" name="child_det" value="<?php echo $child_det; ?>">
                <input type="hidden" name="age" value="<?php echo $age; ?>">
                <input type="hidden" name="gender" value="<?php echo $gender; ?>">

                <button class="submit-btn" name="growth_update" type="submit">Submit</button>
                <button class="cancel-btn" onclick="document.location.href='child_details.php?id=<?php echo $child_det;?>'" type="reset">Cancel</button>
               </div>
              </div>
            </div>
          </form>
        
      </div>
      </div>
      </main>   
</div>	
</body>
</html>