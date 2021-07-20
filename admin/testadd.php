<?php
session_start();
error_reporting(1);
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2>You are not Logged On. Please Login to Access this Page</h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Add Test</title>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<?php
include("../database.php");

include("header.php");


echo "<h2 class='text-center bg-primary'>ADD TEST</h2>";
if($_POST[submit]=='Add')
{
extract($_POST);
mysqli_query($con,"insert into test(sub_id,test_name,total_que,negative) values ('$subid','$testname','$totque','$negve')") or die(mysqli_error());
echo "<h4 align=center class='text-success'>Test <b>\"$testname\"</b> Added Successfully.</h4>";
unset($_POST);
}
?>
<script language="JavaScript">
function check() {
mt=document.form1.testname.value;
if (mt.length<1) {
alert("Please Enter Test Name");
document.form1.testname.focus();
return false;
}
tt=document.form1.totque.value;
if(tt.length<1) {
alert("Please Enter No. of Questions");
document.form1.totque.focus();
return false;
}
return true;
}
</script>
<form name="form1" method="post" onSubmit="return check();">
  <table class="table table-striped" align="center" width="100%">
    <tr>
      <td width="50%" height="32"><div align="left"><strong>Enter Subject ID </strong></div></td>
      <td width="50%" height="32"><select class="form-control" name="subid">
<?php
$rs=mysqli_query($con,"Select * from subject order by  sub_name");
	  while($row=mysqli_fetch_array($rs))
{
if($row[0]==$subid)
{
echo "<option value='$row[0]' selected>$row[1]</option>";
}
else
{
echo "<option value='$row[0]'>$row[1]</option>";
}
}
?>
      </select>
        
    <tr>
        <td height="26"><div align="left"><strong> Enter Test Name </strong></div></td>
	  <td><input class="form-control" name="testname" type="text" id="testname"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Enter No. of Questions </strong></div></td>
      <td><input class="form-control" name="totque" type="text" id="totque"></td>
    </tr>
	<tr>
      <td width="50%" height="32"><div align="left"><strong>Negative marking </strong></div></td>
      <td width="50%" height="32"><select class="form-control" name="negve">
		<option value='No' selected>No</option>";
		<option value='Yes'>Yes</option>";
      </select></td>
	  </tr>
    <tr>
      <td height="26"></td>
      <td><input class="btn btn-primary" type="submit" name="submit" value="Add" ></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</html>
