<?php
session_start();

include ("includes/config.php");
include ("includes/functions.php");

mysqli_close($Connection);
$title = "Health Guide - Child Growth and Malnutrition Monitoring System";
include ('includes/header.php');

?>
<style> <?php include "css/style.css"?></style>
      <main>
      <div class="container">
     
      <div class="graph">
        <div class="table-container">
          <div class="title-page">
            <h3>Health Guide</h3>
          </div>

          <form action="" method="post">
      <div style="float: left; width: 49%;">
        <div style="background-color: #FDFEFE; height: auto; margin-top: 30px;">
          <div class="table-container">
            <div class="title-page" style="margin-top: -10px;">
              <h3>Average recommended energy intake per day</h3>
            </div>

            <div class="table-list" style="margin-top: 30px;">
              <center>
                <table style="width: 60%;">
                  <tr>
                    <th style="width: 26%;">36 - 60 months old</th>
                    <th style="width: 26%;">71 months old</th>
                  </tr>
                  <tr>
                    <td>1300 calories</td>
                    <td>1500 calories</td>
                  </tr>
                </table>
              </center>
            </div> 
          </div>
        </div>

        <div style="background-color: #FDFEFE; height: auto; margin-top: 30px;">
          <div class="table-container">
            <div class="title-page" style="margin-top: -10px;">
              <h3>Stunting, wasting, overweight and underweight</h3>
            </div>

            <div class="sd" style="margin-right: 20px; margin-left: 20px;">
              <br> <p> <b> What do these indicators tell us? </b> </p>
              <p> The indicators stunting, wasting, overweight and underweight are used to measure nutritional imbalance; such imbalance results in either undernutrition (assessed from stunting, wasting and underweight) or overweight. Child growth is internationally recognized as an important indicator of nutritional status and health in populations. </p> <br>
              <p> The percentage of children with a low height-for-age (stunting) reflects the cumulative effects of undernutrition and infections since birth, and even before birth. This measure can therefore be interpreted as an indication of poor environmental conditions or long-term restriction of a child's growth potential. The percentage of children who have low weight-for-age (underweight) can reflect wasting (i.e. low weight-for-height), indicating acute weight loss or stunting, or both. Thus, underweight is a composite indicator that may be difficult to interpret. </p> <br>
              <p> Stunting, wasting and overweight in children aged under 5 years are included as primary outcome indicators in the core set of indicators for the Global Nutrition Monitoring Framework to monitor progress towards reaching Global Nutrition Targets 1, 4 and 6. </p>
              <br> <p> <b> How are these indicators defined?  </b> </p>
              <p> These indicators are defined as follows: </p>
              <ul> 
              <li> stunting - height-for-age <-2 SD; </li>
              <li> wasting - weight-for-height <-2 SD; and </li>
              <li> overweight - weight-for-height >+2 SD; </li>
              <li> underweight - weight-for-age <-2 standard deviations (SD); </li>
              </ul>
              <br> <p> <b> What are the consequences and implications? </b> </p>
              <p> Stunting - Children who suffer from growth retardation as a result of poor diets or recurrent infections tend to be at greater risk for illness and death. Stunting is the result of long-term nutritional deprivation, and often results in delayed mental development, poor school performance and reduced intellectual capacity. In turn, this affects economic productivity at the national level. Women of short stature are at greater risk for obstetric complications because of a smaller pelvis. Also, small women are at greater risk of delivering an infant with low birth weight, contributing to the intergenerational cycle of malnutrition, because infants of low birth weight or retarded intrauterine growth tend be smaller as adults. </p>

              <p> Wasting - Wasting in children is a symptom of acute undernutrition, usually as a consequence of insufficient food intake or a high incidence of infectious diseases, especially diarrhoea. In turn, wasting impairs the functioning of the immune system and can lead to increased severity and duration of, and susceptibility to, infectious diseases, and an increased risk of death. </p>

              <p> Overweight - Childhood obesity is associated with a higher probability of obesity in adulthood, which can lead to a variety of disabilities and diseases, such as diabetes and cardiovascular diseases. The risks for most noncommunicable diseases (NCDs) resulting from obesity depend partly on the age at onset and the duration of obesity. Obese children and adolescents are likely to suffer from both short-term and long-term health consequences, the most significant being: </p>
              <ul> 
              <li> cardiovascular diseases, mainly heart disease and stroke; </li>
              <li> diabetes; </li>
              <li> musculoskeletal disorders, especially osteoarthritis and; </li>
              <li> cancers of the endometrium, breast and colon. </li>
              </ul>

              <p> Underweight - Weight is easy to measure; hence, this is the indicator for which most data have been collected in the past. The mortality risk is increased in children who are even mildly underweight, and the risk is even greater in severely underweight children. </p> <br>
            </div>
            
          </div>
        </div>  
      </div>

      <div style="width: 49%; background-color: #FDFEFE; height: auto; float: right; margin-top: 30px;">
        <div style="background-color: #FDFEFE; height: auto;">
          <div class="table-container">
            <div class="title-page" style="margin-top: -10px;">
              <h3>Pinggang Pinoy</h3>
            </div>

            <div class="pinggang-pinoy" style="margin-right: 100px;">
              <img src="img/pinggangpinoy.jpg" style="height: 85%; width: 85%;">
            </div>
          </div>
        </div>
      </div>
        <div style="width: 49%; background-color: #FDFEFE; height: auto; float: right; margin-top: 30px;">
        <div class="table-container">
          <div class="title-page" style="margin-top: -10px;">
            <h3>How to fill up your Plate</h3>
          </div>

          <div style="float: left; margin-bottom: 30px;">
            <div class="legend" style="margin-top: 30px; margin-left: 22px;">
              <div style="width: 20px; height: 20px; background-color: #F8C471; border: 1px solid #F8C471;"></div>
              <div style="margin-left: 33px; margin-top: -22px;">Rice and Alternatives</div>
            </div>

            <div class="legend" style="margin-top: 30px; margin-left: 22px;">
              <div style="width: 20px; height: 20px; background-color: #FADBD8; border: 1px solid #FADBD8;"></div>
              <div style="margin-left: 33px; margin-top: -22px;">Fish and Alternatives</div>
            </div>

            <div class="legend" style="margin-top: 30px; margin-left: 22px;">
              <div style="width: 20px; height: 20px; background-color: #A3E4D7; border: 1px solid #A3E4D7;"></div>
              <div style="margin-left: 33px; margin-top: -22px;">Vegetables</div>
            </div>
          </div>

          <div style="float: right; margin-bottom: 30px; margin-right: 100px;">
            <div class="legend" style="margin-top: 30px; margin-left: 22px;">
              <div style="width: 20px; height: 20px; background-color: #FAD7A0; border: 1px solid #FAD7A0;"></div>
              <div style="margin-left: 33px; margin-top: -22px;">Fruits</div>
            </div>

            <div class="legend" style="margin-top: 30px; margin-left: 22px;">
              <div style="width: 20px; height: 20px; background-color: #A9CCE3; border: 1px solid #A9CCE3;"></div>
              <div style="margin-left: 33px; margin-top: -22px;">Water</div>
            </div>
          </div>
          <div class="table-list" style="margin-top: 30px;">
            <center>
              <table style="width: 90%;">
                <tr style="height: 30px;">
                  <th colspan="2" style="width: 33%; ">Food Items</th>
                  <th style="width: 32%;">36-60 months old</th>
                  <th style="width: 25%;">71 months old</th>
                </tr>
                <tr style="background-color: #F8C471;">
                  <td rowspan="4">Any of the following</td>
                  <td style="width: 20%;">Rice</td>
                  <td>1/2 cup</td>
                  <td>1/2 cup</td>
                </tr>
                <tr style="background-color: #F8C471;">
                  <td>Pandesal</td>
                  <td>2 pieces, smalll</td>
                  <td>2 pieces, smalll</td>
                </tr>
                <tr style="background-color: #F8C471;">
                  <td>Noodles, cooked (ex. pansit)</td>
                  <td>1/2 cup</td>
                  <td>1/2 cup</td>
                </tr>
                <tr style="background-color: #F8C471;">
                  <td>Root Crop (ex. boiled kamote)</td>
                  <td>1/2 medium piece</td>
                  <td>1/4 mediem piece</td>
                </tr>
                <tr style="background-color: #FADBD8;">
                  <td rowspan="6">Any of the following (in cooked form)</td>
                  <td>Mediem variety of fish (ex. galunggong)</td>
                  <td>1/2 piece small size</td>
                  <td>1/2 piece small size</td>
                </tr>
                <tr style="background-color: #FADBD8;">
                  <td>Large Variety of fish (ex. bangus)</td>
                  <td>1/2 slice</td>
                  <td>1/2 slice</td>
                </tr>
                <tr style="background-color: #FADBD8;">
                  <td>Chicked leg</td>
                  <td>1/2 piece small size</td>
                  <td>1/2 piece small size</td>
                </tr>
                <tr style="background-color: #FADBD8;">
                  <td>Lean meat (ex. chicken, pork, beef)</td>
                  <td>1/2 serving 15 grams</td>
                  <td>1/2 serving 15 grams</td>
                </tr>
                <tr style="background-color: #FADBD8;">
                  <td>Chicken egg, small</td>
                  <td>1/2 piece</td>
                  <td>1/2 piece</td>
                </tr>
                <tr style="background-color: #FADBD8;">
                  <td>tokwa, 6 x 6 x 2 cm</td>
                  <td>1/2 piece</td>
                  <td>1/2 piece</td>
                </tr>
                <tr style="background-color: #A3E4D7">
                  <td colspan="2">Cooked vegetables (ex. malunggay, talbos ng kamote, saluyot, gabi leaves, talinum or Phil, spinach, ampalaya, kalabasa, carrot, sitaw)</td>
                  <td>1/2 cup</td>
                  <td>1/2 cup</td>
                </tr>
                <tr style="background-color: #FAD7A0;">
                  <td rowspan="2">Any of the following</td>
                  <td>Fruit, medium size (ex. saging, dalanghita, 1/2 slice of mango)</td>
                  <td>1/2 - 1 piece</td>
                  <td>1 piece</td>
                </tr>
                <tr  style="background-color: #FAD7A0;">
                  <td>Fruit, big size (ex. papaya, pinya, pakwan)</td>
                  <td>1/2 - 1 piece</td>
                  <td>1 piece</td>
                </tr>
                <tr  style="background-color: #A9CCE3;">
                  <td colspan="2">Water throughout the day</td>
                  <td>5 or more glasses</td>
                  <td>6 or more glasses</td>
                </tr>
              </table>
            </center>
          </div>
        </div>
      </div>

      </div>
    </main>
          </div>
</div>  
</body>
</html>