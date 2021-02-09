<?php
$servername="localhost";
$username="root";
$passwd="";
$database="Project";
$conn=mysqli_connect($servername,$username,$passwd,$database);
session_start();
if(!isset($_SESSION['nam']))
{
header("Location:index.php");
return;
}
if(isset($_REQUEST['id']))
{
$id=htmlentities($_REQUEST['id']);
}
if(isset($_POST['logout']))
{
session_unset();
session_destroy();
header("Location:index.php");
return;
}
$sql="select * from Register where id='$id'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
$name=$row['name'];
$age=$row['age'];
$sex=$row['sex'];
$occupation=$row['occupation'];
$vehiclenumber=$row['vehiclenumber'];
$aadharnumber=$row['aadharnumber'];
$phonenumber=$row['phonenumber'];
$random=$row['random'];
$state=$row['state'];
$city=$row['city'];
$address=$row['address'];
}
$d="select * from Pass where aadharnumber='$aadharnumber'";
$rd=mysqli_query($conn,$d);
$num=mysqli_num_rows($rd);
if($num>0)
{
echo "Pass has already been generated";
}
else
{

$s="insert into Pass (name,age,sex,occupation,vehiclenumber,aadharnumber,phonenumber,random,state,city,address) values ('$name','$age','$sex','$occupation','$vehiclenumber','$aadharnumber','$phonenumber','$random','$state','$city','$address')";
$r=mysqli_query($conn,$s);
$sl="select * from Pass";
$re=mysqli_query($conn,$sl);
echo "<table border=1>
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
while($row=mysqli_fetch_assoc($re))
{
echo "<tr>
<td>".$row['name']."</td><td>".$row['age']."</td><td>".$row['sex']."</td><td>".$row['occupation']."</td><td>".$row['vehiclenumber']."</td><td>".$row['aadharnumber']."</td><td>".$row['phonenumber']."</td><td>".$row['random']."</td><td>".$row['state']."</td><td>".$row['city']."</td><td>".$row['address']."</td></tr><br><br>";
}
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
  </head>
  <body>
<h1 align=center>Pass Registery</h1>
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
