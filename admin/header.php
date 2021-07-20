

<style type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>

</style>
<table>
<tr>
    <td align="center" class="bg-success">
     <img border="0" src="i5.png" width="90%" height="260" align="center"></td>
  </tr>

</table>
  <Table width="100%">
  <tr>
  <td>
  <?php 
  error_reporting(1);
  ?>
  </td>
    <td>
	
<?php
	if(isset($_SESSION['alogin']))
	{
	
	 echo "<h4 class='text-success text-center bg-warning'>
	 <div align=\"left\">&nbsp&nbsp<strong>
	 <a href=\"viewsub.php\">  View Subject</a>&emsp;&emsp;
		<a href=\"testview.php\"> View Test</a>&emsp;&emsp;  
	 <a href=\"questionview.php\">View Question</a>&emsp;&emsp;
	 <a href=\"showuser.php\"> View User</a></strong>
	 &emsp;&emsp;
	 <strong><a href=\"login.php\">Admin Home</a>&emsp;
	 <a href=\"signout.php\">Signout</a></strong>&emsp;&emsp;
	 </div></h4>";
	 }
	 else
	 {
	 	echo "&nbsp;";
	 }
	?>
		</td>
	
  </tr>
  
</table>
