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
$name=$b['name'];
$sem=$b['sem'];
$dept=$b['dept'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dashboard</title>
		<link href="style.css" rel="stylesheet">
		<link rel="icon" href="icon/icon.png">
	</head>

<body class="body-dashboard">
	
	<div class="header-dashboard-bg">
	<div class="logo-dashboard">
		<img class="picture" src="logo/logo.png" alt="logo">
	</div>
	<div class="header-dashboard">
	<h3 class="header-text-dashboard">Munshiganj Polytechnic Institute (MUPI)</h3>
	<h1 class="header-text-dashboard-2">Web Based Result Dashboard</h1>
	<h3 class="header-text-dashboard-3">Faculty Name : <?php echo $name;?></h3>
	<h4 class="header-text-dashboard-4">Semester : <?php echo $sem;?></h4>
	<h4 class="header-text-dashboard-5">Department : <?php echo $dept;?></h4>
	</div>
	</div>
	
	
	<div class="main-page-dashboard">
		<div class="dashboard-body">
				<button type="button" onclick="location.href='submitMarks.php'" class="cmd">Add Marks</button>
			<br>
			<br>
				<button type="button" onclick="location.href='addSubjects.php'" class="cmd">Add Subjects</button>
			<br>
			<br>
				<button type="button" onclick="location.href='viewStudents.php'" class="cmd">View Students</button>
			<br>
			<br>
				<button type="button" onclick="location.href='viewMarks.php'" class="cmd">View Marks</button>
			<br>
			<br>
				<button type="button" onclick="location.href='viewSubjects.php'" class="cmd">View Subjects</button>
			<br>
			<br>
				<button type="button" onclick="location.href='changePassword.php'" class="cmd">Change Password</button>
			<br>
			<br>
				<button type="button" onclick="location.href='logout.php'" class="cmd-2">Logout</button>
		</div>
		<br>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="register.php" class="link">Student Registration</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<!--
		<a href="registerFaculty.php" class="link">Faculty Registration</a>
		-->
	</div>
	<div class="Final-Resut-Panel">
		<div class="Final-Result-2">
			<p>8th Semester Result Panel</p>
		</div>
		<div class="dashboard-body">
				<button type="button" onclick="location.href='submitMarks_Final_Result.php'" class="cmd-3">Add Marks</button>
			<br>
			<br>
				<button type="button" onclick="location.href='addSubjects_Final_Result.php'" class="cmd-3">Add Subjects</button>
			<br>
			<br>
				<button type="button" onclick="location.href='viewStudents_Final_Result.php'" class="cmd-3">View Students</button>
			<br>
			<br>
				<button type="button" onclick="location.href='viewMarks_Final_Result.php'" class="cmd-3">View Marks</button>
			<br>
			<br>
				<button type="button" onclick="location.href='viewSubjects_Final_Result.php'" class="cmd-3">View Subjects</button>
		</div>
		<br>
		<a href="register_Final_Result.php" class="link">Student Registration</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</div>
	<footer class="footer-dashboard"><p>&copy; Group of RRMM [CSE, NUB]</p></footer>
</body>
</html>