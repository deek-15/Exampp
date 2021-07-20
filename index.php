<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Exampp</title>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">-->
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
include("database.php");
extract($_POST);

if(isset($submit))
{
	$rs=mysqli_query($con,"select * from user where login='$loginid' and pass='$pass'");
	if(mysqli_num_rows($rs)<1)
	{
		echo "<h4 class='text-center text-danger'>Invalid Login ID or Password</h4>";
	}
	else
	{
		echo "<script>window.location='loginuser.php'</script>";
		$_SESSION['login']=$loginid;
		$_SESSION['pass']=$pass;
	}
}

?>

<table align="center" border="0" width="50%" height="250">
<h1 class="text-center bg-warning">LOGIN PAGE</h1>
<form method="post" action="">
	<tr>
		<th class="text-primary">LOGIN ID</th>
		<th><input class="form-control"type="text" id="loginid2" name="loginid"></th>
	</tr>
	<tr>
		<th class="text-primary">ENTER PASSWORD</th>
		<th><input class="form-control" type="password" name="pass" id="pass2"/></th>
	</tr>  
         <th></th>
				<th>
					<input class="btn btn-primary "type="submit" name="submit" id="submit" Value="Login"/>
					<a class="btn btn-success " style="color:white" href="signup.php">New user? Click here</a>
					<a class="btn btn-success " style="color:white" href="/Online exam/admin">Admin panel</a></th>
    </form>
</table>

</body>
<footer class="bg-warning">
<h2 align="center">Contact: exampp@gmail.com</h2>
</footer>
</html>
