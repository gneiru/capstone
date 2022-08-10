<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");
if (isset($_GET['city']) and empty($_GET['barangay'])) {
$city=$_GET['city'];
  $sql = "SELECT * from newchild where municipality = '$city' AND age<72 order by lastname, firstname, middlename";

    
}elseif(isset($_GET['barangay']) and isset($_GET['city'])){
$barangay=$_GET['barangay'];
$sql="SELECT * from newchild where barangay = '$barangay' AND age<72 order by lastname, firstname, middlename";
}else{
  $sql="select * from newchild where age<72";
}
$query=mysqli_query($Connection, $sql);

//loop barangays
$brg_sql="SELECT * from barangays order by name";
$brg_q=mysqli_query($Connection, $brg_sql);
$brg_records = mysqli_num_rows($brg_q);

if (isset($_POST['submit'])) {
  $from1 = $_POST['from'];
  $to1 = $_POST['to'];
  $to= date("Y-m-d", strtotime($to1));
  $from= date("Y-m-d", strtotime($from1));
  if (empty($_GET['city'])) {
    $query=mysqli_query($Connection, "SELECT * FROM `newchild` where svdate>= '$from' and svdate<='$to' and age <72 order by lastname, firstname");
  }elseif (!empty($_GET['city'])) {
    $city=$_GET['city'];
    $query=mysqli_query($Connection, "SELECT * FROM `newchild` where svdate>= '$from' and svdate<='$to' and age <72 and municipality='$city' order by lastname, firstname");
  }
}
$records = mysqli_num_rows($query);
mysqli_close($Connection);
$title = "Nutritional Status - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
<style> <?php include "css/style.css"?></style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
          dateFormat: "mm/dd/yy",
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
        dateFormat: "mm/dd/yy",
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>
      <main>
      <div class="container">
        <div class="title-page" style="margin-top: 25px;">
            <h3>Nutritional Status</h3>
          </div>
      
      <div class="select-city" style="margin-top: 30px; margin-bottom: 30px; margin-right: -50px;">
        <select onchange="if (this.value) window.location.href=this.value" name="city" style="">
          <option value="">Select City to load:</option>
          <option value="nutritional_status.php?city=Bayambang">Bayambang</option>
          <option value="nutritional_status.php?city=Basista">Basista</option>
        </select>
      </div>
      <div class="select-city" style="margin-top: 30px; margin-bottom: 30px; margin-left: 400px;">
        <select onchange="if (this.value) window.location.href=this.value" name="barangay" style="">
          <option value="">Barangay to load:</option>
          <?php
            if (!empty($brg_records)) {
              while ($brg_row = mysqli_fetch_assoc($brg_q)) {
                ?>
          
          <option value="nutritional_status.php?barangay=<?php echo $brg_row['name'];?>&city=<?php echo $brg_row['municipality'];?>"><?php echo $brg_row['name'];?></option>
          <?php 
        }}
        ?>
        </select>
      </div>
      <div class="nutrition">

        <button style="width: 70px; height: 35px; margin-bottom: 5px; font-size: 14px;">Print</button>
        <div class="table-nutrition">
          <table id="printTable" style="border: 1px solid black; border-collapse: collapse;">
            <form method="post">
            
            <label for="from">From</label>
            <input type="text" id="from" name="from" placeholder="<?php echo $from1;?>">
            <label for="to">To</label>
            <input type="text" id="to" name="to" placeholder="<?php echo $to1;?>">
            <input type="submit" name="submit" value="Filter">

          </form>
            <tr>
              <th colspan="8" style="text-align: center; height: 100px; border: 1px solid black;">
                <p style="font-size: 14px">Republic of the Philippines </p>
                <p style="font-size: 14px">Province of Pangasinan</p>
                <p style="font-size: 14px"> <?php
                 if (!empty($_GET['city'])){
                  echo " Municipality of ".$_GET['city']; };
                  ?></p>
              </th>
            </tr>
            <tr>
              <th colspan="8" style="border: 1px solid black; border: 1px solid black; border-collapse: collapse;">
                <div style="float: left; margin-left: 20px; font-size: 14px;">
                  Barangay:<?php 
                  echo "<i> ".$_GET['barangay']."</i>";
                  ?>
                </div>
                <div style="float: right; margin-right: 200px; font-size: 14px;">
                  Date: <?php echo " \t".date("M d, Y")."</u>";?>
                </div>
              </th>
            </tr>
            <tr>
              <th style="font-size: 13px; width: 550px; height: 40px; border: 1px solid black;" rowspan="2">Child Name</th>
              <th  style="font-size: 13px; width: 170px; border: 1px solid black;" rowspan="2">Age (Month/s)</th>
              <th  style="font-size: 13px; width: 300px; border: 1px solid black;" rowspan="2">Survey Date</th>
              <th  style="font-size: 13px; width: 170px; border: 1px solid black;" rowspan="2">Weight(kg)</th>
              <th  style="font-size: 13px; width: 170px; border: 1px solid black;" rowspan="2">Height</th>
              <th  style="font-size: 13px; border: 1px solid black;" colspan="3">Nutritional Status</th>
              
            </tr>
            <tr>
              <th style="font-size: 13px; border: 1px solid black;">Weight for age</th>
              <th style="font-size: 13px; border: 1px solid black;">Height for age</th>
              <th style="font-size: 13px; border: 1px solid black;">Weight for height</th>
            </tr>
            <tr>
              <?php
                  if (!empty($records)) {
                    while ($row = mysqli_fetch_array($query)) {
                      ?>
              <td style="font-size: 12px; border: 1px solid black;"><b><?php echo $row['lastname'].', '.$row['firstname'].' '.$row['middlename']; ?><b></td>
              <td style="font-size: 12px; border: 1px solid black;"><?php echo $row['age'];?></td>
              <?php 
              if ($row['svdate']=="0000-00-00") {
                $xy="No Survey Record";
              }else{
                $xy=date("M d, Y", strtotime($row['svdate']));
              }?>

              <td style="font-size: 12px; border: 1px solid black;"><b><?php echo $xy;?></b></td>
              <td style="font-size: 12px; border: 1px solid black;"><?php echo $row['weight'];?></td>
              <td style="font-size: 12px; border: 1px solid black;"><?php echo $row['height'];?></td>         
              <td style="font-size: 12px; border: 1px solid black;"><?php echo $row['weightstatus'];?></td>
              <td style="font-size: 12px; border: 1px solid black;"><?php echo $row['heightstatus'];?></td>
              <td style="font-size: 12px; border: 1px solid black;"><?php echo $row['w8_h8'];?></td>
            </tr>
            <?php
          }}?>
          <?php
                  if (empty($records)) {
                    
                      ?>
                <td></td>
               <td></td>
               <td></td>
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
    </main>
          </div>
</div>  
<script type="text/javascript">
  function printData(){
    var divToPrint = document.getElementById("printTable");
    newWin = window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
  }
  $('button').on('click', function(){
    printData();
  });
</script> 
</body>
</html>