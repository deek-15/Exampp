<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Test Update</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../quiz.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
<?php
include("header.php");
include("../database.php");
extract($_POST);
 $id=$_GET['test_id'];
$q=mysqli_query($con,"select * from test where test_id='$id'");
$res=mysqli_fetch_assoc($q);


if(isset($update))
{

$query="update test SET test_name='$testname',total_que='$totque', negative='$negve' where test_id='$id'";	
mysqli_query($con,$query);
echo "<h2 class='text-success'>Records updated!</h2>";
$q=mysqli_query($con,"select * from test where test_id='$id'");
$res=mysqli_fetch_assoc($q);	
	
	}



?>
<form name="form1" method="post" action="">
<h2 class='text-center bg-primary'>UPDATE TEST</h2>
  <table class="table table-striped">

 <tr>
        <td height="26"><div align="left"><strong> Enter Test Name </strong></div></td>
	  <td><input class="form-control" value="<?php echo $res['test_name']; ?>" name="testname" type="text" id="testname"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Enter Total Question </strong></div></td>
      <td><input class="form-control" value="<?php echo $res['total_que']; ?>" name="totque" type="text" id="totque"></td>
    </tr>
	<tr>
      <td height="26"><div align="left"><strong>Negative Marking </strong></div></td>
	  <td><select class="form-control" name="negve">
	  <option value="No" selected>No</option>
	  <option value="Yes">Yes</option>
	  </select>
	  </td>
    </tr>
    <tr>
      <td height="26"></td>
      <td><input class="btn btn-primary" type="submit" name="update" value="Update" ></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</body>
</html>