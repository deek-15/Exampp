<?php
session_start();
error_reporting(1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>User panel </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>

<body>
<?php
include("header.php");
include("database.php");
extract($_POST);
if(!isset($_SESSION[login]))
{
	echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=index.php>Login</a><div>";
	exit;
}
$rs1=mysqli_query($con,"select * from user where login='$_SESSION[login]' and pass='$_SESSION[pass]'");
$row=mysqli_fetch_array($rs1);
echo "<h1 class='text-center bg-danger'>Welcome, ".$row[3]."</h1>";
		echo '<table width="50%" align="center" class="table table-striped">
  <tr>
    <td align="center"> <h3><a href="sublist.php" class="style4">Quiz</a></h3></td>
  </tr>
  <tr>
    <td align="center"> <h3><a href="result.php" class="style4">Result </a></h3></td>
  </tr>
</table>';
   
		exit;
?>
</body>
</html>