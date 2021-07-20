<?php
session_start();
error_reporting(1);
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
if(isset($_GET[subid]) && isset($_GET[testid]))
{
$_SESSION[ssid]=$subid;
$_SESSION[tid]=$testid;
$_SESSION[neg]=$negve;
header("location:quiz.php");
}
if(!isset($_SESSION[ssid]) || !isset($_SESSION[tid]))
{
	header("location: index.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>

<body>
<?php
include("header.php");

$_SESSION[answers]=array();

$rs=mysqli_query($con,"select * from question where test_id=$tid") or die(mysqli_error());
if(!isset($_SESSION[qn]))
{
	$_SESSION[qn]=0;
	$_SESSION[trueans]=0;
	$_SESSION[wrongans]=0;
	$_SESSION[noans]=0;
}
else
{	
		
	if($submit=='Next Question')
	{
		if($neg=='No')
		{
			if(!isset($ans))
			{
				$_SESSION[answers[$_SESSION[qn]]]=-1;
				$_SESSION[noans]=$_SESSION[noans]+1;
			}
			else if(isset($ans))
			{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);	
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				$_SESSION[answers[$_SESSION[qn]]]=$ans;
			}
			$_SESSION[qn]=$_SESSION[qn]+1;
		}
		else if($neg=='Yes')
		{
			if(!isset($ans))
			{
				$_SESSION[answers[$_SESSION[qn]]]=-1;
				$_SESSION[noans]=$_SESSION[noans]+1;
			}
			else if(isset($ans))
			{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);	
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+4;
				}
				else
				{
					$_SESSION[trueans]=$_SESSION[trueans]-1;
				}
				$_SESSION[answers[$_SESSION[qn]]]=$ans;
			}
			$_SESSION[qn]=$_SESSION[qn]+1;
		}
	}
	else if($submit=='Previous Question')
	{
		if($neg=='No')
		{
			$_SESSION[qn]=$_SESSION[qn]-1;
			if($_SESSION[answers[$_SESSION[qn]]]==-1)
			{
				$_SESSION[noans]=$_SESSION[noans]-1;
			}
			else
			{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);
				if($_SESSION[answers[$_SESSION[qn]]]==$row[7])
				{
					$_SESSION[trueans]=$_SESSION[trueans]-1;
				}
				$ans1=$_SESSION[answers[$_SESSION[qn]]];
				echo "<script>document.myfm.ans=$ans1;</script>";
			}
		}
		else if($neg=='Yes')
		{
			$_SESSION[qn]=$_SESSION[qn]-1;
			if($_SESSION[answers[$_SESSION[qn]]]==-1)
			{
				$_SESSION[noans]=$_SESSION[noans]-1;
			}
			else
			{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);
				if($_SESSION[answers[$_SESSION[qn]]]==$row[7])
				{
					$_SESSION[trueans]=$_SESSION[trueans]-4;
				}
				else
				{
					$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				$ans1=$_SESSION[answers[$_SESSION[qn]]];
				echo "<script>document.myfm.ans.value= '<?php echo \"$ans1\"?>';</script>";
			}
		}
	}
	else if($submit=='Submit')
	{
		if($neg=='No')
		{
			if(!isset($ans))
			{
				$_SESSION[answers[$_SESSION[qn]]]=-1;
				$_SESSION[noans]=$_SESSION[noans]+1;
			}
			else if(isset($ans))
			{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);	
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				$_SESSION[answers[$_SESSION[qn]]]=$ans;
				//echo "<script>document.myfm.ans.value=$_SESSION[answers[$_SESSION[qn]]];</script>";
			}
		}
		else if($neg=='Yes')
		{
			if(!isset($ans))
			{
				$_SESSION[answers[$_SESSION[qn]]]=-1;
				$_SESSION[noans]=$_SESSION[noans]+1;
			}
			else if(isset($ans))
			{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);	
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+4;
				}
				else
				{
					$_SESSION[trueans]=$_SESSION[trueans]-1;
				}
				$_SESSION[answers[$_SESSION[qn]]]=$ans;
			}
		}
				echo "<h1 class='text-center bg-success'>Summary</h1>";
				$_SESSION[qn]=$_SESSION[qn]+1;
				echo "<Table align=center><tr class=tot><td>Total Questions:<td> $_SESSION[qn]";
				$answered=$_SESSION[qn]-$_SESSION[noans];
				echo "<tr class=tans><td>Questions answered:<td>".$answered;
				echo "<tr class=fans><td>Questions unanswered:<td> ".$_SESSION[noans];
				echo "</table>";
				$date=date('Y-m-d');
				mysqli_query($con,"insert into result(login,test_id,test_date,score) values('$login',$tid,'$date',$_SESSION[trueans])") or die(mysqli_error());
				echo "<h1 align=center>Test submitted successfully</h1>";
				unset($_SESSION[qn]);
				unset($_SESSION[ssid]);
				unset($_SESSION[tid]);
				unset($_SESSION[trueans]);
				exit;
		}
}
$rs=mysqli_query($con,"select * from question where test_id=$tid") or die(mysqli_error());
if($_SESSION[qn]>mysqli_num_rows($rs)-1)
{
unset($_SESSION[qn]);
echo "<h1 class=head1>Some Error  Occured</h1>";
session_destroy();
echo "Please <a href=index.php> Start Again</a>";

exit; 
}
mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
echo "<form name=myfm method=post action=quiz.php>";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION[qn]+1;
echo "<tr><td><span class=style2>Question ".  $n .": $row[2]</style>";
echo "<tr><td class=style8><input type=radio name=ans value=1>$row[3]";
echo "<tr><td class=style8> <input type=radio name=ans value=2>$row[4]";
echo "<tr><td class=style8><input type=radio name=ans value=3>$row[5]";
echo "<tr><td class=style8><input type=radio name=ans value=4>$row[6]";
if($_SESSION[qn]>0)
echo "<tr><td><input type=submit name=submit value='Previous Question'></form>";
if($_SESSION[qn]<mysqli_num_rows($rs)-1)
echo "<tr><td><input type=submit name=submit value='Next Question'></form>";
else
echo "<tr><td><input type=submit name=submit value='Submit'></form>";
echo "</table></table>";
?>
</body>
</html>