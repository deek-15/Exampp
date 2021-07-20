<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Subject Update</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../quiz.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
<?php
include("header.php");
include("../database.php");
extract($_REQUEST);
 $id=$_GET['sub_id'];
$q=mysqli_query($con,"select * from subject where sub_id='$id'");
$res=mysqli_fetch_assoc($q);


if(isset($update))
{

$query="update subject SET sub_name='$subname' where sub_id='$id'";	
mysqli_query($con,$query);
echo "<h2 class='text-success'>Records updated!</h2>";
	$q=mysqli_query($con,"select * from subject where sub_id='$id'");
$res=mysqli_fetch_assoc($q);
	}



?>
<h1 class='text-center bg-primary'>UPDATE SUBJECT</h1>
<title>Add Subject</title>
<form name="form1" method="post" onSubmit="return check();">
  <table class="table table-striped">
    <tr>
      <td><div align="left"><strong>Enter Subject Name </strong></div></td>
      <td width="2%" height="5">  
      <td width="53%" height="32">
        <input class="form-control" value="<?php echo $res['sub_name']; ?>" name="subname" placeholder="enter language name" type="text" id="subname">
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" name="update" value="Update" ></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</body>
</html>