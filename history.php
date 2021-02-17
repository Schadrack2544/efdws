<?php
include "./efdws.php";
session_start();
$measures=new efdws();

if(isset($_REQUEST['humidity'])) $humidity=$_REQUEST['humidity'];
if(isset($_REQUEST['temp']))     $temperature=$_REQUEST['temp'];
if(isset($_REQUEST['moisture'])) $moisture=$_REQUEST['moisture'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
     </div>
     </div>
     <div class="row">
        <div class="col-md-12">
             <h3 class="alert alert-dark"> Past records</h3>
        </div>
    </div>
         <div class="table">
         <table class="table table-striped table-dark table-bordered">
            <caption>Data history</caption>
           <thead>
           <tr>
           <th>water level</th>
           <th>Moisture</th>
           <th>Temperature</th>
           <th>Humidity</th>
           <th>decision</th>
           <th>Date observed</th>
           </tr>
           </thead>
           <tbody>
             <?php
             
             $datas=$measures->getMeasures();
            // print_r($datas);
             foreach($datas as $data){
              ?>
              <tr>
                  <td><?=$data["waterlevel"]?></td>
                  <td><?=$data["moisture"]?></td>
                  <td><?=$data["temperature"]?></td>
                  <td><?=$data["humidity"]?></td>
                  <td><?=$data["decision"]?></td>
                  <td><?=$data["created_at"]?></td>
              </tr>
              <?php
             }
             ?>
           </tbody>
           <tfoot>
           <tr>
           <th>water level</th>
           <th>Moisture</th>
           <th>Temperature</th>
           <th>Humidity</th>
           <th>decision</th>
           <th>Date observed</th>
           </tr>
           </tfoot>
         </table>
         </div>
        </div>
     </div>
     <?php
     include "footer.php";
     ?>
  </div> 
  </div>  
</body>
</html>