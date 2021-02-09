<?php
$servername="localhost";
$username="root";
$passwd="";
$database="Project";
$conn=mysqli_connect($servername,$username,$passwd,$database);
if((isset($_POST['name']))&&(isset($_POST['password']))&&(isset($_POST['password1'])))
{
$name=$_POST['name'];
$password=$_POST['password'];
$password1=$_POST['password1'];
if($password==$password1)
{
$sql="select * from Login where name='$name'";
$res=mysqli_query($conn,$sql);
$num=mysqli_num_rows($res);
if($num>0)
{
echo "<div class='alert alert-danger' role='alert'>
  Username is already in existence, try something else!
</div>";
}
else
{
$hash=password_hash($password,PASSWORD_DEFAULT);
$s="insert into Login (name,password) values ('$name','$hash')";
$r=mysqli_query($conn,$s);
$aff=mysqli_affected_rows($conn);
if($aff>0)
{
session_start();
$_SESSION['success']="ID SUCCESSFULLY CREATED";
header("Location:index.php");
return;
}
}
}
else
{
echo "Passwords dont match";
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
<script>
function validate()
{
var1=document.getElementById("pass").value;
var2=document.getElementById("pass1").value;
if((var1.length<10)||(var2.length<10))
{
alert("PASSWORD should be of minimum 10 characters");
return false;
}
else
{
if(var1==var2)
{
return true;
}
else
{
alert("Passwords dont match");
return false;
}

}
}
</script>
<style>
.header{
padding:15px;
background-color:GhostWhite;
}
.footer{
padding:15px;
background-color:snow;

}
.col {
background-color:GhostWhite;
}
</style>
  </head>
  <body>
<div class=container-fluid>
<div class="row header mb-3">
<h1 align=center>E-Curfew Pass</h1>
</div>
<div class="row col my-2">
    <form onsubmit="return validate()" action="" method="POST">
  <div class="mb-3">
    <label class="form-label" style="font-weight:bold">Username</label>
    <input type="text" class="form-control" id="exampleInputname1" name=name required>
  </div>
  <div class="mb-3">
    <label class="from-label" style="font-weight:bold">Password</label>
<input id="pass" type="password" class="form-control" name=password placeholder="Minimum 10 characters long" required>
</div>

<div class="mb-3">
    <label class="from-label" style="font-weight:bold">Re-enter Password</label>
<input id="pass1" type="password" class="form-control" name=password1  required>
</div>
  <button type="submit" class="btn btn-lg btn-primary">Create</button>
</form>
</div>
<div class="row footer mt-3">
<h6>©copyright 2021-2023</h6>
<h6 align=center>Developed by Yuvraj</h6>
</div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>