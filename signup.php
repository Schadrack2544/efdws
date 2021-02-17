<?php
include_once "./users.php";
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
    <div class="col-md-12 align-center">
    <h4 class="alert alert-dark">
    Welcome to EFDWS
    </h4>
    </div>
</div>
<?php
if(isset($_POST['submit'])){

    if(isset($_POST['username'])) $username=$_POST['username'];
    if(isset($_POST['password'])) $password=$_POST['password'];
    $user=new Users($username,$password);
    $isSaved=$user->login($username,$password);
    if($isSaved){
        header("location:index.php");
    }
    else{
        ?>
         <div class="row">
             <div class="col-md-12 disappear-Text">
                 <h4 class="alert alert-danger">
                     Failed to register! try again.
                 </h4>
             </div>
         </div>
        <?php
    }
}

?>
    <div class="row">
        <div class="col-md-12">
            <div class="login-form">
                <h4 class="alert alert-dark">Sign up</h4>
                <form action="" method="post">
                    <input type="text" name="username" id="username" placeholder="username" class="form-control">
                    <br>
                    <input type="password" name="password" id="password" placeholder="password" class="form-control">
                    <br>
                    <p><em>Already having account?<em> <a href="./">Sign in</a></p>
                    <input type="submit" value="signup" name="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    <?php
    include_once "footer.php";
    ?>
</body>
</html>