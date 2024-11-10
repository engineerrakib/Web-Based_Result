<?php
include("config.php");
session_start();
if(isset($_SESSION['email']))
{
	header("location:dashboard_admin.php");
}
$email=mysqli_real_escape_string($al,$_POST['email']);
$pass=mysqli_real_escape_string($al,($_POST['pass']));
if($_POST['email']==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$sql=mysqli_query($al,"SELECT * FROM admin WHERE email='$email' AND password='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['email']=$email;
		header("location:dashboard_admin.php");
	}
	else
	{
		$msg="Incorrect Email ID or Password";
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
			<title>Admin Login</title>
			<link href="style.css" rel="stylesheet">
			<link rel="icon" href="icon/icon.png">
	</head>

<body class="admin-login">
		<div class="logo">
		<img class="picture" src="logo/logo.png" alt="logo">
		</div>
		<div align="center">
			<h1>Administrator Login</h1>
		</div>
		<div class="main-page-admin-login">
			<h3 class="faculty-login">Admin Login</h3>
		
		<form method="post" action="">
			<table class="enter-roll">
				<tr>
					<td colspan="2" align="center" class="msg"><?php echo $msg;?></td>
				</tr>
				<tr class="tr-1">
					<td>Email ID	:</td>
					<td><input type="text" required="required" name="email" class="tr-1" size="15" placeholder="Enter Email ID"></td>
				</tr>
				<tr class="tr-1">
					<td>password	:</td>
					<td><input type="password" required="required" name="pass" class="tr-1" size="15" placeholder="Enter Password" id="myInput"></td>
				</tr>
				<tr>
					<td>   </td>
					<td><input type="checkbox" onclick="myFunction()">Show Password</td>
				</tr>
				<script>
					function myFunction() {
					  var x = document.getElementById("myInput");
					  if (x.type === "password") {
						x.type = "text";
					  } else {
						x.type = "password";
					  }
					}
				</script>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Login" class="login"></td>
				</tr>
			</table>
		</form>
		
		<!--
		<a href="index.php" class="link">Main Page</a>
		-->
		</div>
		<footer class="footer"><p>&copy; Group of RRMM [CSE, NUB]</p></footer>
</body>
</html>