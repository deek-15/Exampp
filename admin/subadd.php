<?php
session_start();
require("../database.php");
include("header.php");
error_reporting(1);
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<?php

extract($_POST);

echo "<BR>";
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
echo "<h1 class='text-center bg-primary'>ADD SUBJECT</h1>";

echo "<table width=100%>";
echo "<tr><td align=center></table>";
if($_POST[submit]=='Add')
{
$rs=mysqli_query($con,"select * from subject where sub_name='$subname'");
if (mysqli_num_rows($rs)>0)
{
	echo "<div class=head1>Subject already exists</div>";
}
else{
mysqli_query($con,"insert into subject(sub_name) values ('$subname')") or die(mysqli_error());
echo "<h4 align=center class='text-success'>Subject  <b> \"$subname \"</b> Added Successfully.</h4>";
$submit="";
}
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.subname.value;
if (mt.length<1) {
alert("Please Enter Subject Name");
document.form1.subname.focus();
return false;
}
return true;
}
</script>

<title>Add Subject</title>
<form name="form1" method="post" onSubmit="return check();">
  <table class="table table-striped">
    <tr>
      <td width="45%" height="32"><div align="left"><strong>Enter Subject Name </strong></div></td>
      <td width="2%" height="5">  
      <td width="53%" height="32">
        <input class="form-control" name="subname"type="text" id="subname">

    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" name="submit" value="Add" ></td>
    </tr>
  </table>
</form>
