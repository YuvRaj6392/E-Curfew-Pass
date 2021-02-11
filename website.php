<?php
require "db.php";
session_start();
if(isset($_REQUEST['id']))
{
$id=htmlentities($_REQUEST['id']);
}
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
    <a class="navbar-brand" href="#">✋ <?php echo "<b><span style=color:White>".$name."</span></b>";?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="website.php">Home</a>
        </li>
<li class="nav-item">
          <a class="nav-link" aria-current="page" href="feedback.php">FeedBack</a>
        </li>

<li class="nav-item">
          <a class="nav-link" aria-current="page" href="aboutus.php">About us</a>
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
<div class=container-fluid>
<div class="row mb-1">

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="c1.jpg" height=320 width=220 class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="c2.jpg" height=320 width=220 class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="c3.jpg" height=320 width=220 class="d-block w-100" alt="...">
    </div>
<div class="carousel-item">
      <img src="c4.jpg" height=320 width=220 class="d-block w-100" alt="...">
    </div>
<div class="carousel-item">
      <img src="c5.jpg" height=320 width=220 class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
</div>
<div class="row justify-content-center colo">
<div class=col>
    <a href=register.php class="btn btn-lg btn-success">Register</a>
</div>
<div class=col>
<a href=trackid.php class="btn btn-lg btn-success">Know your TrackId</a>
</div>
<div class=col>
<a href=status.php class="btn btn-lg btn-success">Status</a>
</div>
</div>
<div class="row writ my-4">
<p style="font-weight:bold">A curfew is an order specifying a time during which certain regulations apply.Typically it is the time when individuals must stay indoors. Such an order may be issued by public authorities but also by the owner of a house to those living in the household.</p>
</div>
</div>
<div class="row my-4 queries py-2">
<h6>Frequently asked questions:-</h6>
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        How can we generate our E-Curfew Pass?
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
<strong>If you want to generate your E-Curfew Pass then follow this simple procedure.</strong> Click on the register button to register your personal details. After successfull registration come on the homepage and click on the trackid button. You will then be redirected to a page where you will be asked to write your Aadhar number. Pressing search will generate your trackid number. Again come on the homepage and now click on the status button. As soon as you click the button you will be redirected to a page where you will be asked to write your trackid. If your details are verified then you will get your E-Curfew pass on the same page with a printing facility.
      </div>
 </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Who all can get this pass?
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Here we will tell you about the E-Curfew Pass priorities</strong> At the time of Curfew the pass facilities will firstly be prioritized for frontline-workers. People who have some serious health issues or some other related emergencies will be given second priority. The third priority will be given to the comman people who have an imperative task to pursue.    
</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
     How long will it take to generate the pass?
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Generation of your E-Curfew Pass</strong> will take a maximum of 3-days.
  </div>
  </div>
  </div>
</div>
</div>
<div class="row footer my-3 py-3">
<h6>©copyright 2021-2023</h6>
<h6 align=center>Developed by Yuvraj</h6>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>