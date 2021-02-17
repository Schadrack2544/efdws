<?php
include "./efdws.php";
session_start();
$measures=new efdws();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/jquery.easing.js"></script>
    <title>efdws</title>
</head>
<body>
<div class="row user-header">
  <div class="col-md-10">
    <h3>EFDWS</h3>
  </div>
<div class="col-md-2">
  <div class="dropdown efdws-user">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-user"></i> <?php echo $_SESSION['user'] ;?>
    </button>
    <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="profiles.php"><i class="fa fa-users"></i> Profiles</a></a>
      <a class="dropdown-item" href="preferences.php"> <i class="fa fa-gears"></i> Preferences</a>
      <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
    </div>
  </div>
</div>
</div>
  <div class="row">
    <div class="col-md-3 sidebar">
      <div class="row">
        <div class="col-md-12">
         <div class="dashboard"><i class="fa fa-dashboard"><a href="./dashboard.php">Dashboard</a></i></div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="menu">
            <ul>
              <li><a href="codes.php"> <i class="fa fa-code"></i>Codes example</a> </li>
              <li><a href="history.php"><i class="fa fa-trello"></i>History</a></li>
              <li><a href="preferences.php"><i class="fa fa-gears"></i>Preferences</a></li>
              <li><a href="about.php"> <i class="fa fa-users"></i> About</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  <div class="col-md-9 efdws-dashboard">
       <div class="row">
       <div class="col-md-12">
       <h1 class="alert alert-dark">Early Flood Detection and Warning System</h1>
       <?php
         /*
          if(isset($_REQUEST['humidity'])) $humidity=$_REQUEST['humidity'];
          if(isset($_REQUEST['temp']))     $temperature=$_REQUEST['temp'];
          if(isset($_REQUEST['moisture'])) $moisture=$_REQUEST['moisture'];
          if(isset($_REQUEST['waterlevel'])) $waterlevel=$_REQUEST['waterlevel'];

          if($humidity!=0 && $temperature!=0 && $moisture!=0 && $waterlevel!=0){
            echo "possible \n";
          }
          else{
            echo "Impossible \n";
          }
          */
          $result=$measures->getLastMeasure();
          
       ?>
     </div>
     </div>
     <div class="row">
     <div class="col-md-6 card efdws-element waterlevel">
       <div class="row">
         <div class="efdws-element-head col-md-12">
           The water level
         </div>
       </div>
       <div class="row">
         <div class="col-md-6 red">
         <img src="public/images/waterlevel.png" alt="" height="200" width="180">
         </div>
         <div class="col-md-6 data">
          <?php
            echo $result["waterlevel"]." cm";
          ?>
         </div>
       </div>
     </div>
     <div class="col-md-6 card efdws-element decision">
      <div class="row">
          <div class="efdws-element-head col-md-12">
           Moisture value
        </div>
      </div>
        <div class="row">
          <div class="col-md-6 black">
          <img src="public/images/himidity.png" alt="" height="200" width="180">
          </div>
          <div class="col-md-6 data">
            <?php
          echo $result["moisture"]." %";
          ?>
        </div>
      </div>
      </div>
     </div>
     <div class="row">
     <div class="col-md-6 card efdws-element decision">
          <div class="row"> 
            <div class="efdws-element-head col-md-12"> 
                Temperature
           </div>
          </div>
                <div class="row">
                      <div class="col-md-6 green">
                      <img src="public/images/temperature.png" alt="" height="200" width="180">
                      </div>
                      <div class="col-md-6 data"><?php echo $result["temperature"]." &#8451;";?></div>
                </div>
     </div>
       <div class="col-md-6 card efdws-element decision">
          <div class="row"> 
            <div class="efdws-element-head col-md-12"> 
               Humidity
            </div>
          </div>
            <div class="row">
                  <div class="col-md-6 silver">
                  <img src="public/images/rain.jfif" alt="" height="150" width="180">
                  </div>
                  <div class="col-md-6 data"> <?php echo $result["humidity"]." %";?></div>
            </div>
          </div>

     </div>
    <!-- <div class="row">
     <div class="col-md-6 card efdws-element decision">
          <div class="row"> 
            <div class="efdws-element-head col-md-12"> 
                Water speed
           </div>
          </div>
                <div class="row">
                      <div class="col-md-6 blue">
                       <img src="public/images/waterspeed.jpg" alt="" height="150" width="180">
                      </div>
                      <div class="col-md-6 data"></div>
                </div>
     </div>
     -->
     <div class="row">
        <div class="col-md-12 card efdws-element decision">
          <div class="row"> 
            <div class="efdws-element-head col-md-12"> 
                Alert
            </div>
          </div>
            <div class="row">
                  <div class="col-md-6 yellow">
                  <img src="public/images/alert.png" alt="" height="150" width="180">
                  </div>
                  <div class="col-md-6">
                    <?php 
                     include_once "./mail.php";
                    echo " \n".$measures->makeDecision($result["waterlevel"],$result["temperature"],$result["humidity"],$result["moisture"]);
                    
                    $mailer=new mailer();
                    $mailer->sendMail("The flood is about to happen in 2 hours to come");

                  ?>
                  </div>
            </div>
          </div>
     </div>
  </div>
  </div>
     <?php
     include "footer.php";
     ?>
  </div> 
  </div> 
  <script>
    
  </script> 
</body>
</html>