<?php include ("includes/controllerUserData.php"); ?>
<?php
if (!$_SESSION['name']) {
  header("Location: index.php");
} 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($Connection, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: login/reset-code.php');
            }
        }else{
          header("Location: logout.php");
        }
    }
}else{
    header('Location: ./index.php');
}
function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);  
  if($currect_page == $url){
      echo 'active'; //class name in css 
  } 
}
mysqli_close($Connection);

?>
<!DOCTYPE html>

<html lang="en">

  <head>
    <link rel="icon" href="img/tabicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-sacle=1,mainimum-sacle=1">

    <title><?php echo $title; ?></title>

    <link href="fontawesome-free-5.11.2-web\css\all.css" rel="stylesheet">
    <link href="fontawesome-free-5.11.2-web\css\fontawesome.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">  
    <script>
function goBack() {
  window.history.back();
}
    $(document).ready(function(){
        $(".hamburger .hamburger__inner").click(function(){
          $(".wrapper").toggleClass("active")
        })

        $(".top_navbar .fas").click(function(){
           $(".profile_dd").toggleClass("active");
        });
    })

    </script>
    <script type="text/javascript">
      $(document).ready(function() {
      $('.submenu li:has(ul)').click(function(e) {
        e.preventDefault();

        if($(this).hasClass('active')) {
          $(this).removeClass('active');
          $(this).children('ul').slideUp();
        } else {
          $('submenu li ul').slideUp();
          $('submenu li').removeClass('active');
          $(this).addClass('active');
          $(this).children('ul').slideDown();
        }

        $('.submenu li ul li a').click(function() {
          window.location.href = $(this).attr('href');
        })
      });
    });
    </script>
  </head>
  <body>
  <div class="wrapper">
  <div class="top_navbar">
  <div class="hamburger">
     <div class="hamburger__inner">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
     </div>
  </div>
  <div class="menu">
    <div class="logo">
      <img src="img/logo.png">
    </div>
    <div class="right_menu">
      <ul>
        <li><i class="fas fa-user"></i>
          <div class="profile_dd">
            
              <div class="dd_item"><a href=profile.php>Profile</a></div>
            
             
             <div class="dd_item"><a href=logout.php>Logout</a></div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  </div>
  <div class="main_container">
    <div class="sidebar">
        <div class="sidebar__inner">
          <div class="profile">
            <div class="sidebar-user">
              <span class="fa fa-user-circle"></span>
            </div>
            <div class="profile_info">

               <p>Welcome</p>
               <h4 class="profile_name">
                <?php //break into 12 char then new line
                  $text = $_SESSION['name'];
                  $newtext = wordwrap($text, 12, "<br />\n");

                  echo $newtext;?></h4>
              <?php
                if (!empty($_SESSION['barangay'])) {
                  echo '~ '.$_SESSION['barangay'].'<br>'.$_SESSION['role'].' ~';
                }else{
                  echo '~ '.ucwords($_SESSION['role']).' ~';  
                }
                ?>
            </div>
          </div>
          <ul class="submenu">
            <li style="border-top: 0.8px solid white;">
              <a href="admin_home.php" style="text" class="<?php active('admin_home.php');?>">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="title" class="btn">Home </span>
              </a>
            </li>
           
            <li>
              <a href="#">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="title" class="btn">Child </span> <i class="fa fa-chevron-down down" style="position: absolute; right: 30px; font-size: 15px;"></i>
              </a>
                <ul class="sub-hide">
                  <li><a href="childlist.php" class="<?php active('childlist.php')  or active('childlistname.php') or active('child_update.php');?>">Child List</a>
                  </li>
                  
                  <li><a href="history.php" class="<?php active('history.php')  or active('childlistname.php') or active('child_update.php');?>">History</a></li>
                  <li><a href="archive.php" class="<?php active('archive.php')  or active('childlistname.php') or active('child_update.php');?>"> Archive</a></li>
                </ul>
            </li>
            <li>
              <a href="parentlist.php" class="<?php active('parentlist.php');?>">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="title">Parent</span>
              </a>
            </li>
            <?php 
              if ($_SESSION['role']=='admin') {?>
                 <li>
              <a href="barangays.php" class="<?php active('barangays.php');?>">
                <span class="icon"><i class="fas fa-map-signs"></i></span>
                <span class="title">Manage<br> Barangays</span>
                <i class="fa fa-chevron-down down" style="position: absolute; right: 30px; font-size: 15px;"></i>
                </a>
                  <ul>
                    <li><a href="barangays.php?brg=Bayambang">Bayambang</a></li>
                    <li><a href="barangays.php?brg=Basista">Basista</a></li>
                  </ul>
              </a>
            </li>
            <li>
              <a href="user.php" class="<?php active('user.php') or active('new_user.php');?>">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="title">Manage Users</span>
                
              </a>
            </li><?php
               } ?>
            
              <li>
                <li>
              <a href="intervention_categories.php" class="<?php active('intervention_categories.php');?>">
                <span class="icon"><i class="fa fa-heartbeat"></i></span>
                <span class="title">Intervention</span>
              </a>
            </li>
              
              <li>
                <a href="#">
                  <span class="icon"><i class="fas fa-clipboard-list"></i></span>
                  <span class="title" class="btn">Report </span> <i class="fa fa-chevron-down down" style="position: absolute; right: 30px; font-size: 15px;"></i>
                </a>
                  <ul>
                    <li>
                      <a href="child_report.php" class="<?php active('child_report.php');?>">Child Report</a>
                    </li>
                    <li>
                      <a href="individual_report.php" class="<?php active('individual_report.php') or active('individual_growth.php') or active('individual_growth_report.php');?>">Individual Report</a>
                    </li>
                    <li>
                      <a href="nutritional_status.php" class="<?php active('nutritional_status.php');?>">Nutritional Status</a>
                    </li>
                  </ul>
              </li>
              <li>
                <a href="#">
                  <span class="icon"><i class="fas fa-border-all"></i></span>
                  <span class="title" class="btn">Others </span> <i class="fa fa-chevron-down down" style="position: absolute; right: 30px; font-size: 15px;"></i>
                </a>
                  <ul>
                    <li>
                      <a href="policies.php" class="<?php active('policies.php');?>">Policies</a>
                    </li>
                    <li>
                      <a href="healthguide.php" class="<?php active('healthguide.php');?>">Health Guide</a>
                    </li>
                  </ul>
              </li>
          </ul>
        </div>
    </div>
