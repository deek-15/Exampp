<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Question List</title>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
<?php
include("header.php");
include("../database.php");
{
$sql=mysqli_query($con,"select * from question,test where question.test_id=test.test_id");	
	
	echo "<table class='table table-striped'>";
	echo "<tr><th><a  class='btn btn-success'href=\"questionadd.php\">Add Question </a>&emsp;&emsp;</th></tr>";
	echo "<tr><th class='text-primary'>Test name</th><th class='text-primary'>Question</th>
	<th class='text-primary'>Update</th>
	<th class='text-primary'>Delete</th></tr>";
	
	while($result=mysqli_fetch_assoc($sql))
	{
$id=$result['que_id'];
$tid=$result['test_id'];
	echo "<tr>";	
	echo "<td>".$result['test_name']. "</td>";
	echo "<td>".$result['que_desc']."</td>";
	echo "<td><a href='queupdate.php?que_id=$id'><span class='glyphicon glyphicon-edit'></span></a></td>";
	echo "<td><a href='quedelete.php?que_id=$id&testid=$tid'><span class='glyphicon glyphicon-trash'></span></a></td>";
	echo "</tr>";
	}
	echo "</table>";
}
?>
</body>
</html>
