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
$dept=$b['dept'];
$sem=$b['sem'];


$s1=$_POST['s1'];
if($s1==NULL)
{
	// 
}
else
{	
	$sql=mysqli_query($al,"INSERT INTO subjects_final(s1,dept,sem) VALUES('$s1','$dept','$sem')");
	if($sql)
	{
		$msg="Successfully Saved";
	}
	else
	{
		$msg="Already Saved for Your Sem";
	}
}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add Subjects</title>
		<link href="style.css" rel="stylesheet">
		<link rel="icon" href="icon/icon.png">
	</head>

<body>
	
	<div class="logo">
		<img class="picture" src="logo/logo.png" alt="logo">
	</div>
	
	<div align="center">
	<h1>Subject Register</h1>
	</div>
	
	<div class="main-page-add-subject">
	<h3 class="faculty-login">Add Subjects</h3>
		
	<form method="post" action="">
		<table class="enter-roll">
			<tr>
				<td colspan="2" align="center" class="msg"><?php echo $msg;?></td>
			</tr>
			<tr class="tr-1">
				<td>Subject 1 : </td>
				<td><input type="text" required="required" size="20" class="tr-1" placeholder="Enter Subject Name" name="s1"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" class="register" value="SAVE"></td>
			</tr>
		</table>
	</form>
	<br>
	<br>
	<br>
	<a href="dashboard.php" class="cmd">Back Dashboard</a>
	</div>
	<footer class="footer"><p>&copy; Group of RRMM [CSE, NUB]</p></footer>
</body>
</html>