<?php
$servername="localhost";
$username="root";
$passwd="";
$database="Project";
$conn=mysqli_connect($servername,$username,$passwd,$database);
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
if(isset($_POST['aadharnumber']))
{
$aadharnumber=$_POST['aadharnumber'];
$aadharnumber=htmlspecialchars($aadharnumber,ENT_QUOTES);
$sql="select * from Register where aadharnumber='$aadharnumber'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0)
{
while($row=mysqli_fetch_assoc($result))
{
echo "<div class='alert alert-success' role='alert'>
Your TrackId is:- ".$row['random']."</div>";
}
}
else
{
echo"<div class='alert alert-danger' role='alert'>
  We could not find your TrackId, it seems you have yet not registered!
</div>"; 
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>E-Curfew Pass</title>
<style>
.footer{
padding:15px;
background-color:snow;
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
<div>
<form action="" method="POST">
<h2 align=center class="mt-1 mb-3">Know Your TRACKID</h2>
<label for="exampleDataList" class="form-label">Enter you Aadhar number</label>
<input class="form-control my-1" list="datalistOptions" id="exampleDataList" placeholder="Type here..." name=aadharnumber>
<input type=submit value=Search class="btn btn-primary">
</form>
<div class="row footer mt-3">
<h6>©copyright 2021-2023</h6>
<h6 align=center>Developed by Yuvraj</h6>
</div>
</div>   
 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>