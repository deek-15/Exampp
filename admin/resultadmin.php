<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz  - Result </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../quiz.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>

<body>
<?php
include("header.php");
include("../database.php");
extract($_GET);
$rs=mysqli_query($con,"select t.test_name,t.total_que,t.negative,r.test_date,r.score from test t, result r where
t.test_id=r.test_id and r.login='$username'") or die(mysqli_error());

echo "<h1 class='text-center bg-primary'> RESULT </h1>";
if(mysqli_num_rows($rs)<1)
{
	echo "<br><br><h1 class=head1> You have not given any quiz</h1>";
	exit;
}
echo "<table align=center class='table table-striped'><tr><td align=center><h4><b>Test Name <td align=center><h4><b>Total questions<td align=center><h4><b>Negative Marking<td align=center><h4><b> Score <td align=center><h4><b> Test Date<br>(YYYY-MM-DD)";
while($row=mysqli_fetch_row($rs))
{
	$s=1;
	if($row[2]=="Yes")
		$s=$row[1]*4;
	else
		$s=$row[1];
echo "<tr class=style8><td align=center>$row[0] <td align=center>$row[1] <td align=center>$row[2]<td align=center> $row[4]/$s <td align=center> $row[3]";
}
echo "</table>";
?>
</body>
</html>
