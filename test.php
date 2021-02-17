<?php
  include_once "./data.php";
  if(isset($_POST['humidity'])) $humidity=$_POST['humidity'];
  if(isset($_POST['temp']))     $temperature=$_POST['temp'];
  if(isset($_POST['moisture'])) $moisture=$_POST['moisture'];
  if(isset($_POST['waterlevel'])) $waterlevel=$_POST['waterlevel'];

   if(isset($_POST['submit'])){
    $humidity=rand()%100;
    $temperature=rand()%100;
    $moisture=rand()%100;
    $waterlevel=rand()%100;
    
    $unity=new Data();
    $result=$unity->saveData($waterlevel,$moisture,$temperature,$humidity);
    if($result){
       echo "<h3 class='alert alert-primary'>Data saved successfuly!</h3>";
    }
    else{
      echo "<h3 class='alert alert-danger'>Failed to save data</h3>";
    }
    
   }
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
    <title>Login</title>
</head>
<body class="container">
<div class="row">
<div class="col-md-12 test-area">
<form action="" method="post" id="myform">
    <input type="hidden" name="waterlevel" id="" class="form-control"><br>
    <input type="hidden" name="temperature" id="" class="form-control"><br>
    <input type="hidden" name="moisture" id="" class="form-control"><br>
    <input type="hidden" name="humidity" id="" class="form-control"><br>
    <input type="submit" value="Test" name="submit" class="btn btn-success test-btn">
</form>
</div>
</div>
<?php
include_once "./footer.php";
?>
 <script>
 /*
    let form=document.querySelector("#myform");
        form.addEventListener('submit',(e)=>{
          e.preventDefault();
        });
*/
    </script>
</body>
</html>