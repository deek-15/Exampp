<?php
session_start();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Exampp - Admin Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../quiz.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>

</head>

<body>
<?php
include("header.php");
include("../database.php");
extract($_POST);

if(isset($submit))
{
	$rs=mysqli_query($con,"select * from admin where loginid='$loginid' and pass='$pass'");
	if(mysqli_num_rows($rs)<1)
	{
		echo "<h4 class='text-center text-danger'>Invalid Login ID or Password</h4>";
	}
	else
	{
		echo "<script>window.location='login.php'</script>";			
		$_SESSION['alogin']="true";
	}
}
?>

<table align="center" border="0" width="50%" height="250">
<h1 class="text-center bg-warning">ADMIN LOGIN</h1>
<form name="form1" method="post" action="">
  <tr>
    <th class="text-primary">LOGIN ID</th>
    <th><input class="form-control" name="loginid" type="text" id="loginid"></th>
  </tr>
  <tr>
    <th class="text-primary">ENTER PASSWORD</th>
    <th><input class="form-control" name="pass" type="password" id="pass"></th>
  </tr>
	<th></th>
    <th>
	<input class="btn btn-primary" name="submit" type="submit" id="submit" value="Login"/>
	<a class="btn btn-success" style="color:white" href="/Online exam">User Login</a></th>
  </tr>
</form>
</table>

</body>
<footer class="bg-warning">
<h2 align="center">Contact: exampp@gmail.com</h2>
</footer>
</html>
