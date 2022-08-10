<?php

if (!empty($_GET['city'])) {
  $city=$_GET['city'];
  $subsql=" and municipality='$city'";
  $eQuery=$eQuery = "SELECT u.*,b.municipality, b.name
            FROM usertable AS u  
            LEFT JOIN barangays AS b  
            ON u.barangay=b.name where municipality = '$city' and role= 'enumerator'";
}elseif (empty($_GET['city'])) {
  $subsql="";
  $eQuery = "SELECT * from usertable where role= 'enumerator'";
}
$usr=$_GET['user'];
$Query = "SELECT * FROM newchild where age<72 $subsql";
$Result = mysqli_query($Connection, $Query);   

    if ($Result)
    {   
        $ChildCount = mysqli_num_rows($Result);
      }
$pQuery = "SELECT p_lastname,p_firstname,p_middlename, COUNT(*) FROM newchild where age<72 $subsql GROUP BY p_lastname";
$pResult = mysqli_query($Connection, $pQuery);
    if ($pResult)
    {
        $pCount = mysqli_num_rows($pResult);
      }
$aQuery = "SELECT * FROM newchild where age>=72 $subsql";
$aResult = mysqli_query($Connection, $aQuery);   
    if ($aResult)
    {
        $acount = mysqli_num_rows($aResult);
      }
$eResult = mysqli_query($Connection, $eQuery);   
    if ($eResult)
    {
        $ecount = mysqli_num_rows($eResult);
      }

///weight status queries
$weigthq= mysqli_query($Connection, "SELECT COUNT(weightstatus) as weight FROM newchild where age<72 and weightstatus='normal' $subsql");
$ws=mysqli_fetch_assoc($weigthq);
$normalw=$ws['weight'];

$weigthq= mysqli_query($Connection, "SELECT COUNT(weightstatus) as weight FROM newchild where age<72 and weightstatus='overweight' $subsql");
$ws=mysqli_fetch_assoc($weigthq);
$oweight=$ws['weight'];

$weigthq= mysqli_query($Connection, "SELECT COUNT(weightstatus) as weight FROM newchild where age<72 and weightstatus='severely underweight' $subsql");
$ws=mysqli_fetch_assoc($weigthq);
$suweight=$ws['weight'];

$weigthq= mysqli_query($Connection, "SELECT COUNT(weightstatus) as weight FROM newchild where age<72 and weightstatus='underweight' $subsql");
$ws=mysqli_fetch_assoc($weigthq);
$uweight=$ws['weight'];

$weigthq= mysqli_query($Connection, "SELECT COUNT(weightstatus) as weight FROM newchild where age<72 and weightstatus=' ' $subsql");
$ws=mysqli_fetch_assoc($weigthq);
$noweight=$ws['weight'];


///Height status queries
$heightq= mysqli_query($Connection, "SELECT COUNT(heightstatus) as height FROM newchild where age<72 and heightstatus='normal' $subsql");
$ws=mysqli_fetch_assoc($heightq);
$normalh=$ws['height'];

$heightq= mysqli_query($Connection, "SELECT COUNT(heightstatus) as height FROM newchild where age<72 and heightstatus='tall' $subsql");
$ws=mysqli_fetch_assoc($heightq);
$tall=$ws['height'];

$heightq= mysqli_query($Connection, "SELECT COUNT(heightstatus) as height FROM newchild where age<72 and heightstatus='severely stunted' $subsql");
$ws=mysqli_fetch_assoc($heightq);
$sstunted=$ws['height'];

$heightq= mysqli_query($Connection, "SELECT COUNT(heightstatus) as height FROM newchild where age<72 and heightstatus='stunted' $subsql");
$ws=mysqli_fetch_assoc($heightq);
$stunted=$ws['height'];

$heightq= mysqli_query($Connection, "SELECT COUNT(heightstatus) as height FROM newchild where age<72 and heightstatus=' ' $subsql");
$ws=mysqli_fetch_assoc($heightq);
$noheight=$ws['height'];

///BMI status queries
$bmi_q= mysqli_query($Connection, "SELECT COUNT(w8_h8) as bmi FROM newchild where age<72 and w8_h8='normal' $subsql");
$ws=mysqli_fetch_assoc($bmi_q);
$normalbmi=$ws['bmi'];

$bmi_q= mysqli_query($Connection, "SELECT COUNT(w8_h8) as bmi FROM newchild where age<72 and w8_h8='obese' $subsql");
$ws=mysqli_fetch_assoc($bmi_q);
$obese=$ws['bmi'];

$bmi_q= mysqli_query($Connection, "SELECT COUNT(w8_h8) as bmi FROM newchild where age<72 and w8_h8='severely wasted' $subsql");
$ws=mysqli_fetch_assoc($bmi_q);
$swasted=$ws['bmi'];

$bmi_q= mysqli_query($Connection, "SELECT COUNT(w8_h8) as bmi FROM newchild where age<72 and w8_h8='wasted' $subsql");
$ws=mysqli_fetch_assoc($bmi_q);
$wasted=$ws['bmi'];

$bmi_q= mysqli_query($Connection, "SELECT COUNT(w8_h8) as bmi FROM newchild where age<72 and w8_h8='' $subsql");
$ws=mysqli_fetch_assoc($bmi_q);
$nobmi=$ws['bmi'];
?>