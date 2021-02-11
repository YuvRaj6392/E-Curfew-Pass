<?php
require "db.php";
session_start();
if(!isset($_SESSION['nam']))
{
header("Location:index.php");
return;
}
if(isset($_POST['logout']))
{
session_unset();
session_destroy();
header("Location:index.php");
return;
}
$sql="select * from Register";
$res=mysqli_query($conn,$sql);
echo "<table border=1 style='margin:5px;'>
<tr style='margin:5px;'>
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
<th>GenerateE-Pass</th>
</tr>";
while($row=mysqli_fetch_assoc($res))
{
echo "<tr>
<td>".$row['name']."</td><td>".$row['age']."</td><td>".$row['sex']."</td><td>".$row['occupation']."</td><td>".$row['vehiclenumber']."</td><td>".$row['aadharnumber']."</td><td>".$row['phonenumber']."</td><td>".$row['random']."</td><td>".$row['state']."</td><td>".$row['city']."</td><td>".$row['address']."</td><td>".'<a href="generate.php?id='.$row['id'].'">Generate</a>'."</td></tr><br><br>";
}
$sm="select * from feedback";
$rm=mysqli_query($conn,$sm);
echo "<h1 align=center>Feedback</h1>";
while($row=mysqli_fetch_assoc($rm))
{
echo $row['name']."-".$row['feedback']."<br><hr>";

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
  </head>
  <body>
<hr>
<h1 align=center>Registery</h1>
<form action="" method="POST">
   <input type=submit class="btn btn-lg btn-danger" value=Logout name=logout> 
</form>
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