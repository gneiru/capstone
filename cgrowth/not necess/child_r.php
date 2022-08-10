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
$records = mysqli_num_rows($query);
mysqli_close($Connection);

?>
<style> <?php include "css/style.css"?></style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

      <main>
      <div>
         <div>
            <h3>TITLE oF PAGE</h3>
         </div>
      <div style="margin-top: 10px; margin-bottom: 30px; margin-right: -50px;">
        <select onchange="if (this.value) window.location.href=this.value" name="city" style="">
          <option value="">Select City to load:</option>
          <option value="child_report.php?city=Bayambang">Bayambang</option>
          <option value="child_report.php?city=Basista">Basista</option>
        </select>
      </div>

        <div>
          
          
          <table style="border: 1px solid black; border-collapse: collapse;">
            <thead>
           <tr>
             <th style="width: 600px; border: 1px solid black;">Child Name</th>
             <th style="width: 600px; border: 1px solid black;">Parent</th>
             <th style="width: 170px; border: 1px solid black;">Gender</th>
             <th style="width: 300px; border: 1px solid black;">Birthdate</th>
             <th style="width: 170px; border: 1px solid black;">Age (Month/s)</th>
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
</body>
</html>