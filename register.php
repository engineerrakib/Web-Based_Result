<?php
include("config.php");
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
$email=$_SESSION['email'];
$a=mysqli_query($al,"SELECT * FROM faculty WHERE email='$email'");
$b=mysqli_fetch_array($a);


$roll=$_POST['roll'];
$sem=$_POST['sem'];
$dept=$_POST['dept'];
$year=$_POST['year'];
$name=$_POST['name'];

if($roll==NULL || $sem==NULL || $dept==NULL || $year==NULL || $name==NULL)
{
	//
}
else
{
	$sql=mysqli_query($al,"INSERT INTO students(name,roll,sem,dept,year) VALUES('$name','$roll','$sem','$dept','$year')");
	if($sql)
	{
		$msg="Successfully Registered";
	}
	else
	{
		$msg="Email Already Exists";
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Student Register</title>
		<link href="style.css" rel="stylesheet">
		<link rel="icon" href="icon/icon.png">
	</head>

<body>
		
		<div class="logo">
		<img class="picture" src="logo/logo.png" alt="logo">
		</div>
		
		<div align="center">
		<h1>Student Register</h1>
		</div>
		
		<div class="main-page-student-reg">
		<h3 class="faculty-login">Student Registration</h3>

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
					<td>Roll No :</td>
					<td><input type="text" name="roll" maxlength="6" class="tr-1" required="required" size="15" placeholder="Enter Roll No"></td>
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
					<option value="" disabled="disabled" selected="selected" required="required">Select Department</option>
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
					<td>Year :</td>
				<td>
				<select name="year" required class="tr-1">
					<option value="" disabled="disabled" selected="selected">Select Year</option>
					<option value="2024">2024</option>
					<option value="2023">2023</option>
					<option value="2022">2022</option>
				</select>
				</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Register" class="register"></td>
				</tr>
			</table>
		</form>
		<a href="dashboard.php" class="link">Back Dashboard</a>
		</div>
		<footer class="footer"><p>&copy; Group of RRMM [CSE, NUB]</p></footer>
</body>
</html>