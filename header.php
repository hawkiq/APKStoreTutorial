<?php
/**
 * Created by OsaMa Soft.
 * User: OsaMa
 * Date: 05/09/2017
 * Time: 07:59 م
 * IQ TECH Tutorials
 * Project : apkstore
 * header.php
 */
include ('includes/db.php');
include ('includes/functions.php');
include ('includes/pagination.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>APK Store </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/bootstrap-material-design.css" rel="stylesheet">

    <!-- Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="container-fluid">
<div class="navbar navbar-info">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-material-light-blue-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">IQ TECH Store</a>
    </div>
    <div class="navbar-collapse collapse navbar-material-light-blue-collapse">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>

          <?php
          if (isset($_SESSION['login']) && $_SESSION['login'] != ""){
             echo ' <li><a href="upload.php">Upload</a></li>
		            <li><a href="logout.php">Logout</a></li>';
          }else{
              echo '<li><a href="register.php">Register</a></li>
		            <li><a href="login.php">Login</a></li>';
          }
          ?>
      </ul>
     <form class="navbar-form navbar-left" method="get" action="search.php">
         <div class="form-group">
             <input type="text" name="q" class="form-control" placeholder="Search Then Press Enter" />
         </div>
     </form>
    </div>
  </div>
</div>

    <div class="row text-center">
        <div class="col-md-4">
            <img src="images/logo1.png" />
        </div>
        <div class="col-md-8">

        </div>
    </div>
