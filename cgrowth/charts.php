<?php include("includes/controllerUserData.php");
 ?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var height = google.visualization.arrayToDataTable([

          ['Height Status', 'Child',{ role: "style" }],
          ['Severely Stunted',<?php echo $sstunted; ?>,'#51C4D3'], 
          ['Stunted', <?php echo $stunted; ?>,'#109618'],
          ['Normal',<?php echo $normalh; ?>,'#DC3912'],
          ['Tall', <?php echo $tall; ?>,'#f6c7b6'],
          ['Non-Surveyed',<?php echo $noheight; ?>,'#808080']
        ]);
        var weight = google.visualization.arrayToDataTable([
          ['Weight Status', 'Child',{ role: "style" }],
          ['Severely Underweight',<?php echo $suweight; ?>,'#51C4D3'], 
          ['Underweight',<?php echo $uweight; ?>,'#109618'],
          ['Normal',  <?php echo $normalw; ?>,'#DC3912'],
          ['Overweight', <?php echo $oweight; ?>,'#f6c7b6'],
          ['Non-Surveyed',<?php echo $noweight; ?>,'#808080']

        ]);
        var bmi = google.visualization.arrayToDataTable([
          ['BMI Status', 'Child',{ role: "style" }],
          ['Severely Wasted',<?php echo $swasted; ?>,'#51C4D3'], 
          ['Wasted',<?php echo $wasted; ?>,'#109618'],
          ['Normal',<?php echo $normalbmi; ?>,'#DC3912'],
          ['Obese',<?php echo $obese; ?>,'#f6c7b6'],
          ['Non-Surveyed',<?php echo $nobmi; ?>,'#808080']

        ]);

        var options = {
          bar: {groupWidth: "80%"},
          legend: { position: "none" },
          chartArea:{left:300,top:20,width:'40%',height:'85%'},

        };
        var chart1 = new google.visualization.BarChart(document.getElementById('1'));
        var chart2 = new google.visualization.BarChart(document.getElementById('2'));
        var chart3 = new google.visualization.BarChart(document.getElementById('3'));
        chart1.draw(weight, options);
        chart2.draw(height, options);
        chart3.draw(bmi, options);
      
      }
    </script>
  </head>
  <body>
    <div class="graph-analytics" style="margin-top: 30px;">
      <div class="graph1" style="margin-top: 50px;"></div>
        <center>
         <p style="font-size: 18px; font-weight: 600; margin-top: 50px; color: #126e82;">Weight for Age</p>
         <hr style="height: 3px; background-color: #126e82;">
         <div id="1" style="height: 300px; z-index: -1;"></div>

        </center> 
      </div>
      <div class="graph2" style="margin-top: 50px;">
        <center>
         <p style="font-size: 18px; font-weight: 600; margin-top: 50px; color: #126e82;">Height for Age</p>
         <hr style="height: 3px; background-color: #126e82;">
         <div id="2" style="height: 300px;"></div>
        </center>
      </div>
      <div class="graph2" style="margin-top: 50px;">
        <center>
         <p style="font-size: 18px; font-weight: 600; margin-top: 50px; color: #126e82;">Weight for Height</p>
         <hr style="height: 3px; background-color: #126e82;">
         
        <div id="3" style="height: 300px; "></div>
        </center> 
      </div>
    </div>
  </body>
</html>