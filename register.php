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
if((isset($_POST['name']))&&(isset($_POST['age']))&&(isset($_POST['sex']))&&(isset($_POST['vehiclenumber']))&&(isset($_POST['aadharnumber']))&&(isset($_POST['phonenumber']))&&(isset($_POST['state']))&&(isset($_POST['city']))&&(isset($_POST['address'])))
{
$name=$_POST['name'];
$age=$_POST['age'];
$sex=$_POST['sex'];
$occupation=$_POST['occupation'];
$vehiclenumber=$_POST['vehiclenumber'];
$aadharnumber=$_POST['aadharnumber'];
$phonenumber=$_POST['phonenumber'];
$state=$_POST['state'];
$city=$_POST['city'];
$address=$_POST['address'];
$random=rand(1000000,50000000);
$sql="select * from Register where aadharnumber='$aadharnumber'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num>0)
{
echo "<div class='alert alert-danger' role='alert'>
  It seems you have already registered, Go to the homepage to know about your status whereabouts!
</div>";
}
else
{
$s="insert into Register (name,age,sex,occupation,vehiclenumber,aadharnumber,phonenumber,random,state,city,address) values ('$name','$age','$sex','$occupation','$vehiclenumber','$aadharnumber','$phonenumber','$random','$state','$city','$address')";
$r=mysqli_query($conn,$s);
$aff=mysqli_affected_rows($conn);
if($aff>0)
{
echo "<div class='alert alert-success' role='alert'>
  Successfully Registered
</div>"; 
}
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
.footer {
padding:15px;
background-color:snow;
}
</style
  </head>
  <body style="background-color:GhostWhite">
   
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
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
<div class=container-fluid">
<div class="row my-3">
<form action="" method="POST">
<h1 align=center>Registration</h1>
<h6 align=right>(<span style=color:red>*</span> denotes mandatory field!)</h6>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label" style="font-weight:bold">Full Name<span style="color:red">*</span></label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name=name required>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label" style="font-weight:bold" >Age<span style="color:red">*</span></label>
  <input type="number" class="form-control" id="exampleFormControlInput2" name=age required>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label" style="font-weight:bold">Sex<span style="color:red">*</span>:- &nbsp;&nbsp;&nbsp;</label>
  <input type="radio" class="form-check-input" id="exampleFormControlInput3" name=sex value=Male checked>&nbsp;Male&nbsp;&nbsp;
<input type="radio" class="form-check-input" id="exampleFormControlInput3" name=sex value=Female>&nbsp;Female&nbsp;&nbsp;
<input type="radio" class="form-check-input" id="exampleFormControlInput3" name=sex value=Other>&nbsp;Other&nbsp;&nbsp;
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label" style="font-weight:bold">Occupation<span style="color:red">*</span></label>
  <input type="text" class="form-control" id="exampleFormControlInput11" name=occupation required>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label" style="font-weight:bold">Vehicle Number<span style="color:red">*</span></label>
  <input type="text" class="form-control" id="exampleFormControlInput4" name=vehiclenumber required>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label" style="font-weight:bold">Aadhar Number<span style="color:red">*</span></label>
  <input type="number" class="form-control" id="exampleFormControlInput5" name=aadharnumber required>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label" style="font-weight:bold">Phone Number<span style="color:red">*</span></label>
  <input type="number" class="form-control" id="exampleFormControlInput6" name=phonenumber required>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label" style="font-weight:bold">State<span style="color:red">*</span></label>
  <input type="text" class="form-control" id="exampleFormControlInput7" name=state required>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label" style="font-weight:bold">City<span style="color:red">*</span></label>
  <input type="text" class="form-control" id="exampleFormControlInput8" name=city required>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label" style="font-weight:bold">Address<span style="color:red">*</span></label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name=address required></textarea>
</div>
<div class="mb-3">
<input class="btn btn-primary" type=submit value=Register>
</form>
</div>
</div>
<div class="row footer mt-3">
<h6>©copyright 2021-2023</h6>
<h6 align=center>Developed by Yuvraj</h6>
</div>
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