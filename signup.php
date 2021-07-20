<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>New user signup </title>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link href="quiz.css" rel="stylesheet" type="text/css">
<script language="javascript">
function check()
{

 if(document.form1.lid.value=="")
  {
    alert("Please Enter Login Id");
	document.form1.lid.focus();
	return false;
  }
 
 if(document.form1.pass.value=="")
  {
    alert("Please Enter Your Password");
	document.form1.pass.focus();
	return false;
  } 
  if(document.form1.cpass.value=="")
  {
    alert("Please Enter Confirm Password");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.pass.value!=document.form1.cpass.value)
  {
    alert("Passwords do not match");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.name.value=="")
  {
    alert("Please Enter Your Name");
	document.form1.name.focus();
	return false;
  }
  if(document.form1.phone.value=="")
  {
    alert("Please Enter Contact No");
	document.form1.phone.focus();
	return false;
  }
  if(document.form1.email.value=="")
  {
    alert("Please Enter your Email Address");
	document.form1.email.focus();
	return false;
  }
  e=document.form1.email.value;
		f1=e.indexOf('@');
		f2=e.indexOf('@',f1+1);
		e1=e.indexOf('.');
		e2=e.indexOf('.',e1+1);
		n=e.length;

		if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
		{
			alert("Please enter valid Email");
			document.form1.email.focus();
			return false;
		}
  return true;
  }
  
</script>
</head>

<body class="bg-success">
<?php
include("header.php");
?>
 <table width="100%" border="0">
   <tr>
     <h1 class="text-center bg-primary">REGISTRATION PAGE</h1>
   </tr>
   <tr>
     <td><form name="form1" method="post" action="signupuser.php" onSubmit="return check();">
       	
			<table class=" table table-striped">
		
         <tr>
           <td class="style7">LOGIN ID</div></td>
           <td><input class="form-control"type="text" name="lid"></td>
         </tr>
         <tr>
           <td class="style7">Password</td>
           <td><input class="form-control"type="password" name="pass"></td>
         </tr>
         <tr>
           <td class="style7" >Confirm Password </td>
           <td><input class="form-control" name="cpass" type="password" id="cpass"></td>
         </tr>
         <tr>
           <td class="style7">Name</td>
           <td><input class="form-control" name="name" type="text" id="name"></td>
         </tr>
         <tr>
           <td valign="top" class="style7">Phone no.</td>
           <td><input class="form-control" name="phone" type="text" id="phone"></td>
         </tr>
         <tr>
           <td valign="top" class="style7">E-mail</td>
           <td><input class="form-control" name="email" type="text" id="email"></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td><input class="btn btn-danger" type="submit" name="Submit" value="Signup"></td>
         </tr>
       </table>
     </form></td>
   </tr>
 </table>
 <p>&nbsp; </p>
</body>
</html>
