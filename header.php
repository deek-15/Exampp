<style type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css"/>
</style>
<table>
<tr>
    <td align="center" class="bg-success">
     <img border="0" src="image/i5.png" width="90%" height="260" align="center"></td>
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
	if(isset($_SESSION['login']))
	{
	 echo "<h4 align=\"right\"><strong><a href=\"loginuser.php\"> Home </a>|<a href=\"signout.php\">Signout</a>&nbsp&nbsp&nbsp</strong></h4>";
	 }
	 else
	 {
	 	echo "&nbsp;";
	 }
	?>
	</td>
	
  </tr>
  
</table>
