<?php
session_start();
error_reporting(1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Admin panel </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
	$rs=mysqli_query($con,"select * from admin where loginid='$loginid' and pass='$pass'") or die(mysqli_error());
	if(mysqli_num_rows($rs)<1)
	{
		echo "<BR><BR><BR><BR><div class=head1> Invalid Login ID or Password<br>
		<a href='index.php'>Click here to login again </a>
		<div>";		
	}
	else
	{
	echo "<script>window.location='login.php'</script>";			
	$_SESSION['alogin']="true";
	}
}
else if(!isset($_SESSION[alogin]))
{
	echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=index.php>Login</a><div>";
		exit;
}

		echo"<h1 class='text-center bg-warning'>Admin Panel</h1>";
		echo"<h1 class='text-center text-primary'>Choose an option to get started</h1>";
?>
</body>
</html>
