<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Quiz List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
<?php
include("header.php");
include("database.php");
extract($_GET);
$rs1=mysqli_query($con,"select * from subject where sub_id=$subid");
$row1=mysqli_fetch_array($rs1);
echo "<h1 class='text-center bg-success'>$row1[1]</h1>";
$rs=mysqli_query($con,"select * from test where sub_id=$subid");
if(mysqli_num_rows($rs)<1)
{
	echo "<br><br><h2 class=head1> No Quiz for this Subject </h2>";
	exit;
}
echo "<h1 class='text-center bg-danger'> Select a Quiz to start </h1>";
echo "<table border=1 align=center class='table table-striped' style='width:50%'>";
echo "<tr width='50%'><th class='text-center text-primary'><h3><b>Quiz</b></h4></th>";
echo "<th class='text-center text-primary' ><h3><b>Negative marking</b></h3></th></tr>";
while($row=mysqli_fetch_row($rs))
{
	echo "<tr><td align=center ><a href=quiz.php?testid=$row[0]&subid=$subid&negve=$row[4]><font size=4>$row[2]</font></a></td>";
	echo "<td align=center><font size=4>$row[4]</font></td></tr>";
}
echo "</table>";
echo "<h3 class='style8'><strong>Marking Scheme:</strong></h3>";
echo "<h4 style='color:red'>For quiz with no negative marking: 1 for correct answer and 0 for wrong answer</h4>";
echo "<h4 style='color:red'>For quiz with negative marking: 4 for correct answer, -1 for wrong answer and 0 if not answered</h4>";
?>
</body>
</html>
