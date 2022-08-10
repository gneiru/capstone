<?php 

  $con=new mysqli('localhost','root','','personal_health_care');

  if($con){

  }else{
    die(mysqli_error($con));
  }

if (!$con)
  {
  die("Connection Failed: " . mysqli_connect_error());
  }
if (isset($_GET['name'])) {
$illnesses=$_GET['name'];
  $sql = "SELECT * from symptoms where id = '$illnesses' order by illnesses";
  $query=mysqli_query($con, $sql);
  $records = mysqli_num_rows($query);

    
}else{
}


$s_sql="SELECT * from symptoms order by illnesses";
$s_qry=mysqli_query($con, $s_sql);
$s_records = mysqli_num_rows($s_qry);


mysqli_close($con);

?>
<!DOCTYPE html>
<html>
<head>
  <title>Tab title here</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
</head>
<body>
      <div class="container">
        <div class="title-page" style="margin-top: 25px;">
            <h3>Table Title here</h3>
          </div>
      
      <div class="select-city" style="margin-top: 30px; margin-bottom: 30px; margin-left: 400px;">
        <select onchange="if (this.value) window.location.href=this.value" name="barangay" style="">
          <option value="">Illness:</option>
          <?php
            if (!empty($s_records)) {
              while ($s_row = mysqli_fetch_assoc($s_qry)) {
                ?>
          
          <option value="illness_.php?name=<?php echo $s_row['id'];?>"><?php echo $s_row['illnesses'];?></option>
          <?php 
        }}
        ?>
        </select>
      </div>
          <table id="printTable" style="border: 1px solid black; border-collapse: collapse;margin-left: 300px">
            <thead>
              <?php
                  if (!empty($records)) {
              ?><tr>
              <th style="font-size: 13px; width: 250px; height: 40px; border: 1px solid black;" rowspan="2">Illnesses</th>
              <th  style="font-size: 13px; width: 170px; border: 1px solid black;" rowspan="2">Symptoms</th>
              <th  style="font-size: 13px; width: 300px; border: 1px solid black;" rowspan="2">Description</th>
              <th  style="font-size: 13px; width: 170px; border: 1px solid black;" rowspan="2">Treatment</th>
              <th  style="font-size: 13px; width: 40px; border: 1px solid black;" rowspan="2">Action</th>
            </tr>
            </thead>
            <?php
                    while ($row = mysqli_fetch_array($query)) {
                      ?>
              <tbody>
            <tr>
              <td style="font-size: 12px; border: 1px solid black;"><b><?php echo $row['illnesses'];?><b></td>
              <td style="font-size: 12px; border: 1px solid black;"><?php echo $row['symptoms'];?></td>
              <td style="font-size: 12px; border: 1px solid black;"><?php echo $row['description'];?></td>
              <td style="font-size: 12px; border: 1px solid black;"><?php echo $row['treatment'];?></td>
              <td style="font-size: 12px; border: 1px solid black;">

                <button style="background-color: #3498DB;"><a style="text-decoration: none" href="illness_update.php?idu=<?php echo $row['id']; ?>">Edit</a></button>
                <button style="background-color: #E74C3C;"><a style="text-decoration: none" href="illness_update.php?idd=<?php echo $row['id']; ?>" onClick="javascript:return confirm('Do you really want to delete?');">Delete</a></button>
                  
              </td>
            </tr>
            </tbody>
            <?php
          }}?>
          <?php
                  if (empty($records)) {
                    
                      ?>
                <tr>
              <th style="font-size: 13px; width: 550px; height: 40px; border: 1px solid black;" rowspan="2">Illnesses</th>
              <th  style="font-size: 13px; width: 170px; border: 1px solid black;" rowspan="2">Symptoms</th>
              <th  style="font-size: 13px; width: 300px; border: 1px solid black;" rowspan="2">Description</th>
              <th  style="font-size: 13px; width: 170px; border: 1px solid black;" rowspan="2">Treatment</th>
              <th  style="font-size: 13px; width: 170px; border: 1px solid black;" rowspan="2">Action</th>
            </tr>
            <tr>
                <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
                </tr>
                <?php 
                
              }
                ?>
          </table>

          
        </div>
          </div>
</div>  
</body>
</html>