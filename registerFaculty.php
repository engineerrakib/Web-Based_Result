<?php
include("config.php");
session_start();
if(!isset($_SESSION['email']))
{
	header("location:admin.php");
}
$email=$_SESSION['email'];
$a=mysqli_query($al,"SELECT * FROM faculty WHERE email='$email'");
$b=mysqli_fetch_array($a);


$name=$_POST['name'];
$sem=$_POST['sem'];
$dept=$_POST['dept'];
$email=$_POST['email'];
$pass=($_POST['pass']);

if($name==NULL || $sem==NULL || $dept==NULL || $email==NULL || $_POST['pass']==NULL)
{
	//
}
else
{
	$sql=mysqli_query($al,"INSERT INTO faculty(name,sem,dept,email,password) VALUES('$name','$sem','$dept','$email','$pass')");
	if($sql)
	{
		$msg="Successfully Registered";
	}
	else
	{
		$msg="Email or Sem Already Exists";
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Institute Register</title>
		<link href="style.css" rel="stylesheet">
		<link rel="icon" href="icon/icon.png">
	</head>

<body>
		
		<div class="logo">
		<img class="picture" src="logo/logo.png" alt="logo">
		</div>
		
		<div align="center">
			<h1>Institute Register</h1>
		</div>
		<div class="main-page-faculty-reg">
		<h3 class="faculty-login">Institute Registration</h3>
		
		<form method="post" action="">
			<table class="enter-roll">
				<tr>
					<td colspan="2" align="center" class="msg"><?php echo $msg;?></td>
				</tr>
				<tr class="tr-1">
					<td>Name :</td>
					<td><input type="text" name="name" class="tr-1" required="required" size="15" placeholder="Enter Full Name"></td>
				</tr>
				<tr class="tr-1">
					<td>Semester :</td>
				<td>
				<select name="sem" required class="tr-1">
					<option value="" disabled="disabled" selected="selected">Select Semester</option>
					<option value="1">1st Semester</option>
					<option value="2">2nd Semester</option>
					<option value="3">3rd Semester</option>
					<option value="4">4th Semester</option>
					<option value="5">5th Semester</option>
					<option value="6">6th Semester</option>
					<option value="7">7th Semester</option>
					<option value="8">8th Semester</option>
				</select>
				</td>
				</tr>
				<tr class="tr-1">
					<td>Department :</td>
				<td>
				<select name="dept" required class="tr-1">
					<option value="" disabled="disabled" selected="selected">Select Department</option>
					<option value="Computer Technology">Computer Technology</option>
					<option value="Electrical Technology">Electrical Technology</option>
					<option value="Electronics Technology">Electronics Technology</option>
					<option value="Civil Technology">Civil Technology</option>
					<option value="Mechanical Technology">Mechanical Technology</option>
					<option value="Architecture Technology">Architecture Technology</option>
					<option value="Food Technology">Food Technology</option>
					<option value="Power Technology">Power Technology</option>
				</select>
				</td>
				</tr>
				<tr class="tr-1">
					<td>E-Mail ID : </td>
					<td><input type="email" name="email" class="tr-1" size="15" placeholder="Enter Email" required="required"></td>
				</tr>
				<tr class="tr-1">
					<td>Password : </td>
					<td><input type="password" name="pass" class="tr-1" size="15" placeholder="Enter Password" required="required"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Register" class="register"></td>
				</tr>
			</table>
		</form>
		<a href="dashboard_admin.php" class="link">Back Admin Page</a>
		</div>
		<footer class="footer"><p>&copy; Group of RRMM [CSE, NUB]</p></footer>
</body>
</html>