<?php
require "db.php";
session_start();
if(!isset($_SESSION['name']))
{
header("Location:index.php");
return;
}
if(isset($_SESSION['name']))
{
$name=$_SESSION['name'];
}
if(isset($_POST['logout']))
{
session_unset();
session_destroy();
header("Location:index.php");
return;
}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>E-Curfew Pass</title>
<style>
.colo{
background-color:black;
padding:10px;
}
.writ{
background-color:GhostWhite;
}
.footer{
background-color:snow;
padding-15px;
}
.queries{
background-color:GhostWhite;
color:Black;
}
</style>
  </head>
  <body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo "<b><span style=color:yellow>".$name."</span></b>";?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="website.php">Home</a>
        </li>
<li class="nav-item">
          <a class="nav-link " aria-current="page" href="feedback.php">FeedBack</a>
        </li>

<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="aboutus.php">About us</a>
        </li>
<li class="nav-item">
          <a class="nav-link" aria-current="page" href='contact.php'>Contact us</a>
        </li>
        <li class="nav-item">
<form action="" method="POST">
          <input type=submit class="nav-link btn-lg btn-danger" value=Logout name=logout>
</form>
        </li>
        
    </div>
  </div>
</nav>
<div class=container-fluid">
<div class=row>
<div class="col" align=center>
<div class="card" style="width: 18rem;">
  <img src="yuvraj.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">About</h5>
    <p class="card-text">This website is developed by <span style=font-weight:bold>Yuvraj</span> a 3rd year Bca student as a project.</p>
  </div>
</div>
</div>
</div>
<div class="row my-2">
<div class="col" align=center>
<div class="card" style="width: 18rem;">
  <img src="karan.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Special Mention</h5>
    <p class="card-text">Documentation of this website is jointly made by <span style=font-weight:bold>Karan Srivastava</span></p>
  </div>
</div>
</div>
</div>
</div>
<div class="row footer my-3 py-3">
<h6>©copyright 2021-2023</h6>
<h6 align=center>Developed by Yuvraj</h6>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>