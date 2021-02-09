<?php
$servername="localhost";
$username="root";
$passwd="";
$database="Project";
$conn=mysqli_connect($servername,$username,$passwd,$database);
session_start();
if(!isset($_SESSION['success']))
{
echo "";
}
if(isset($_SESSION['success']))
{
echo "<div class='alert alert-success' role='alert'>".$_SESSION['success']."</div>";
session_unset();
session_destroy();
}
if((isset($_POST['name']))&&(isset($_POST['password'])))
{
$name=$_POST['name'];
$password=$_POST['password'];
$pass=htmlspecialchars($password,ENT_QUOTES);
if(($name=="yuvraj123")&&($pass=="@kgggdkp"))
{
session_start();
$_SESSION['nam']="yuvraj123";
header("Location:website2.php");
return;
}
$sql="select * from Login where name='$name'";
$res=mysqli_query($conn,$sql);
$num=mysqli_num_rows($res);
if($num>0)
{
while($row=mysqli_fetch_assoc($res))
{
$hash=$row['password'];
$verify=password_verify($pass,$hash);
if($verify)
{
session_start();
$_SESSION['name']=$row['name'];
$id=$row['id'];
header("Location:website.php?id=".urlencode($id));
return;
}
else
{
echo"<div class='alert alert-danger' role='alert'>
  Wrong Password!
</div>";
}
}
}
else
{
session_start();
$_SESSION['success']="We could not find you please signup!!!";
header("Location:index.php");
return;
}
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="This website generates you a website">
<meta name="robots" content="E-Curfew Pass,curfew pass,pass curfew">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 <title>E-Curfew Pass</title>
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
<script>
function fn1()
{
document.getElementById('spinner').style.visibility="visible";
return true;
}
</script>
  </head>
  <body>
<div class=container-fluid>
<div class="row header mb-3">
<h1 align=center>E-Curfew Pass</h1>
</div>
<div class="row col py-1">
    <form onsubmit="return fn1()" action="" method="POST">
  <div class="mb-3">
    <label class="form-label" style="font-weight:bold">Username</label>
    <input type="text" class="form-control" id="exampleInputname1" name=name required>
    <div  class="form-text">We'll never share your details with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" style="font-weight:bold">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name=password required>
  </div>
<div class="row justify-content-center">
  <button type="submit" class="btn btn-lg btn-primary">Login</button>
</div>
</form>
<div class="row mb-1">
<div class="col" align=center>
 <button id=spinner align=center class="btn btn-warning" type="button" style="visibility:hidden">
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>
Loading...
 </button> 
</div>
</div>
<h6 style=color:grey;font-style:lighter>Have'nt made your Id yet, then 
<a href="createuser.php" class="btn btn-primary">SignUp</a></h6>
</div>
<div class="row footer mt-3">
<h6>©copyright 2021-2023</h6>
<h6 align=center>Developed by Yuvraj</h6>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>   
  </body>
</html>