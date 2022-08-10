<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");

if (isset($_GET['city'])) {
$city=$_GET['city'];
  $sql = "SELECT * FROM newchild where municipality = '$city' AND age<72 order by lastname, firstname, middlename";
            $query=mysqli_query($Connection,$sql);
          }else{
$query=mysqli_query($Connection, "SELECT * FROM `newchild` where age <72 order by lastname, firstname");
}
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
$title = "Child Report - Child Growth and Malnutrition Monitoring System";
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
            <h3>Child Report
              <?php if (!empty($_GET['city'])) {
                echo "of ".$city;
              }
              ?></h3>
         </div>
      <div class="select-city" style="margin-top: 10px; margin-bottom: 30px; margin-right: -50px;">
        <select onchange="if (this.value) window.location.href=this.value" name="city" style="">
          <option value="">Select City to load:</option>
          <option value="child_report.php?city=Bayambang">Bayambang</option>
          <option value="child_report.php?city=Basista">Basista</option>
        </select>
      </div>
      <div class="child-report" style="margin-top: 10px;">
        <input id="export_excel" type="button" style="width: 60px; height: 35px; margin-bottom: 5px; font-size: 14px" value="EXCEL">
        <button id="printonly" style="width: 70px; height: 35px; margin-bottom: 5px; font-size: 14px;">Print</button>

        <div class="table-child-report">
          <form method="post">
            <label for="from">From</label>
            <input type="text" id="from" name="from" placeholder="<?php echo $from1;?>">
            <label for="to">To</label>
            <input type="text" id="to" name="to" placeholder="<?php echo $to1;?>">
            <input type="submit" name="submit" value="Filter">

          </form>
          
          
          <table id="printTable" style="border: 1px solid black; border-collapse: collapse;">
            <thead>
           <tr>
             <th style="width: 600px; border: 1px solid black;">Child Name</th>
             <th style="width: 600px; border: 1px solid black;">Parent</th>
             <th style="width: 170px; border: 1px solid black;">Gender</th>
             <th style="width: 300px; border: 1px solid black;">Birthdate</th>
             <th style="width: 170px; border: 1px solid black;">Age (Month/s)</th>
             <th style="width: 300px; border: 1px solid black;">Survey date</th>
             <th style="width: 170px; border: 1px solid black;">Weight (kg)</th>
             <th style="width: 170px; border: 1px solid black;">Height (cm)</th>
             <th style=" border: 1px solid black;">Weight for age</th>
             <th style=" border: 1px solid black;">height for age</th>
             <th style=" border: 1px solid black;">Weight for height</th>
             </thead>
           </tr>
           <tbody>
           <tr>
            <?php
                  if (!empty($records)) {
                    while ($row = mysqli_fetch_array($query)) {
                      ?>
              <td style="font-size: 12px; border: 1px solid black;"><?php echo $row['lastname'].', '.$row['firstname'].' '.$row['middlename']; ?></td>
              <td style="font-size: 12px; border: 1px solid black;"><?php echo $row['p_firstname'].' '.$row['p_middlename'].' '.$row['p_lastname']; ?></td>
              <td style="font-size: 12px; border: 1px solid black;"><?php echo $row['gender'];?></td>
              <td style="font-size: 12px; border: 1px solid black;"><?php echo date("M d, Y", strtotime($row['birthdate']));?></td>
              <td style="font-size: 12px; border: 1px solid black;"><?php echo $row['age'];?></td>
              <td style="font-size: 12px; border: 1px solid black;"><?php 
              if ($row['svdate']=="0000-00-00") {
                echo "No Survey Record";
              }else{
                echo date("M d, Y", strtotime($row['svdate']));
              }?></td>
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
                <td style=" border: 1px solid black;"></td>
               <td style=" border: 1px solid black;"></td>
               <td style=" border: 1px solid black;"></td>
               <td style=" border: 1px solid black;"></td>
               <td style=" border: 1px solid black;"></td>
               <td style=" border: 1px solid black;"></td>
               <td style=" border: 1px solid black;"></td>
               <td style=" border: 1px solid black;"></td>
               <td style=" border: 1px solid black;"></td>
               <td style=" border: 1px solid black;"></td>
               <td style=" border: 1px solid black;"></td>
                </tr>
                <?php 
                
              }
                ?>
                </tbody>
          </table>


          
        </div>
      </div>

      </div>
    </main>
          </div>
</div>
<script type="text/javascript">
  document.getElementById('export_excel').addEventListener('click', function(){
    var table2excel = new Table2Excel();
    table2excel.export(document.querySelectorAll("#printTable"));
  });
</script> 
<script type="text/javascript">
  function printData(){
    var divToPrint = document.getElementById("printTable");
    newWin = window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
  }
  $('#printonly').on('click', function(){
    printData();
  });
</script> 
</body>
</html>