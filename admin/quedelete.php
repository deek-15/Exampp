<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz - Quiz List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include("header.php");
include("../database.php");
 $id=$_GET['que_id'];
 $testid=$_GET['testid'];
$sql=mysqli_query($con,"delete from question where que_id='$id'");
$rs1=mysqli_query($con,"select * from test where test_id='$testid'");
$row1=mysqli_fetch_row($rs1);
$totque=$row1[3];
$totque=$totque-1;
mysqli_query($con,"update test set total_que='$totque' where test_id='$testid'");
header('location:questionview.php');
?>