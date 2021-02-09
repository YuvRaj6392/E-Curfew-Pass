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
if(isset($_POST['random']))
{
$random=$_POST['random'];
$random=htmlspecialchars($random,ENT_QUOTES);
$sql="select * from Pass where random='$random'";
$res=mysqli_query($conn,$sql);
$num=mysqli_num_rows($res);
if($num>0)
{
echo "<div>
<table class=table border=1>
<tr>
<th><h2>E-Curfew Pass</h2></th>
</tr>
<tr>
<th>Name</th>
<th>Age</th>
<th>Sex</th>
<th>Occupation</th>
<th>Vehicle Number</th>
<th>Aadhar Number</th>
<th>Phone Number</th>
<th>TrackId</th>
<th>State</th>
<th>City</th>
<th>Address</th>
</tr>";
while($row=mysqli_fetch_assoc($res))
{
echo "<tr>
<td>".$row['name']."</td><td>".$row['age']."</td><td>".$row['sex']."</td><td>".$row['occupation']."</td><td>".$row['vehiclenumber']."</td><td>".$row['aadharnumber']."</td><td>".$row['phonenumber']."</td><td>".$row['random']."</td><td>".$row['state']."</td><td>".$row['city']."</td><td>".$row['address']."</td></tr>";
echo "<tr>
<th>Validity</th>
<th>Authentication</th>
</tr>
<tr>
<td>1 month from date of issue</td>
<td>Authenticated by the GOI officials</td>
</tr>
<tr>
<td><button onclick='window.print()'>Print</button>
</td>
</tr>
</div>";


}
}
else
{
echo "<div class='alert alert-danger' role='alert'>
Your E-Curfew Pass has not been generated yet. Check again later!
</div>"; "Your E-Curfew Pass has not been genrated yet. Check again later";
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
background-color:snow;
padding:15px;
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
<h2 align=center>Status</h2>
<label for="exampleDataList" class="form-label">Enter your TrackId</label>
<input class="form-control my-1" list="datalistOptions" id="exampleDataList" placeholder="Type here..." name=random>
<input type=submit value=Search class="btn btn-primary">
</form>
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