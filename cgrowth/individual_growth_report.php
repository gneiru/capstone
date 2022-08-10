<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");

  //check GET request id
  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT p.*,a.municipality, a.name
            FROM newchild AS p  
            LEFT JOIN barangays AS a  
            ON p.barangay=a.name where p.id = $id";
    $result = mysqli_query($Connection, $sql);
    
    $record = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
   
    $table_sql="SELECT * from childrecords where child_id = $id order by svdate";
    $table_result=mysqli_query($Connection, $table_sql);

  }
mysqli_close($Connection);
$title = "Individual Growth - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
<style> <?php include "css/style.css"?></style>

      <main>
      
      <div class="container">
          <div class="title-page" style="margin-top: 25px;">
            <h3>Individual Growth Report</h3>
           </div>
          <button style="width: 70px; height: 35px; margin-bottom: 5px; margin-top: 30px; font-size: 14px;">Print</button>
          <div class="individual-report" style="margin-bottom: 30px;">
            <table id="printTable" class="individual-report-table" style="width: 100%; background-color: white; height: auto; border: 1px solid black; border-collapse: collapse;">
              <tr>
                <th colspan="8" style="text-align: center; height: 100px; border: 1px solid black;">
                  <p style="font-size: 14px">Republic of the Philippines </p>
                  <p style="font-size: 14px">Province of Pangasinan</p>
                  <p style="font-size: 14px">MUNICIPALITY OF <?php echo strtoupper($record['municipality'])?></p>
                  <p style="font-size: 14px; margin-top: 20px;">INDIVIDUAL GROWTH REPORT</p>

                  <div class="child-info" style="margin-top: 40px;">
                    <div class="child-name" style="float: left; margin-left: 20px; font-size: 12px; font-weight: 600;">
                      Name:  <?php echo $record['firstname'].' '.$record['middlename'].' '.$record['lastname']; ?>
                    </div>
                    <br>
                    <div class="child-address" style="float: left; margin-left: 20px; font-size: 12px; font-weight: 600;">
                      Address: <?php echo $record['street'].' '.$record['barangay'].', '.$record['municipality'].', Pangasinan'; ?>
                    </div>
                    
                    <div class="date-issued" style="float: right; margin-right: 70px; font-size: 12px; font-weight: 600; margin-top: -15px;">
                      Date:   <u><?php echo date("M d, Y");?></u> <div style="border-bottom: 1px solid black; width: 80px; margin-left: 35px;"></div>
                    </div>

                  </div>
                </th>
              </tr>
              <tr>
                <th  style="font-size: 12px; width: 300px; border: 1px solid black;" rowspan="2">Survey Date</th>
                <th  style="font-size: 12px; width: 170px; border: 1px solid black;" rowspan="2">Weight(kg)</th>
                <th  style="font-size: 12px; width: 170px; border: 1px solid black;" rowspan="2">Height</th>
                <th  style="font-size: 12px; border: 1px solid black;" colspan="3">Nutritional Status</th>
              </tr>
              <tr>
                <th style="font-size: 12px; border: 1px solid black;">Weight for age</th>
                <th style="font-size: 12px; border: 1px solid black;">Height for age</th>
                <th style="font-size: 12px; border: 1px solid black;">Weight for height</th>
              </tr>
              
                  <?php
                  if (empty(mysqli_num_rows($table_result))) {
                    ?><tr>
                      <td height="30px"></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                    <?php
                  }
                 while ($record = mysqli_fetch_assoc($table_result)) { ?>
                 <tr>                
                <td style="font-size: 12px; border: 1px solid black;"><?php              
                  if ($record['svdate']=='0000-00-00') {
                    echo "No survey yet";
                  }else{
                    echo date("F d, Y", strtotime($record['svdate']));
                  }
                ?></td>
                <td style="font-size: 12px; border: 1px solid black;"><?php
                 if ($record['weight']=='0') {
                    echo " ";
                  }else{
                    echo $record['weight'];
                  }
                 ?></td>
                <td style=" font-size: 12px;border: 1px solid black;"><?php
                 if ($record['height']=='0') {
                    echo " ";
                  }else{
                    echo $record['height'];
                  }
                 ?></td>
                <td style="font-size: 12px; border: 1px solid black;"><?php echo $record['heightstatus'];?></td>
                <td style="font-size: 12px; border: 1px solid black;"><?php echo $record['weightstatus'];?></td>
                <td style=" font-size: 12px;border: 1px solid black;"><?php echo $record['w8_h8'];?></td>
              </tr>
            <?php }?>

            </table>
          </div>
       
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
      </main>
</body>
</html>