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
$s2=$_POST['s2'];
$s3=$_POST['s3'];
$s4=$_POST['s4'];
$s5=$_POST['s5'];
$roll=$_POST['roll'];
if($s1==NULL || $s2==NULL || $s3==NULL || $s4==NULL || $s5==NULL || $roll==NULL)
{
	//
}
else
{
	$sql=mysqli_query($al,"INSERT INTO marks(roll,sem,dept,s1,s2,s3,s4,s5) VALUES('$roll','$sem','$dept','$s1','$s2','$s3','$s4','$s5')");
	if($sql)
	{
		$msg="Successfully Saved Marks";
	}
	else
	{
		$msg="Marks Already Submitted to this Roll No.";
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add Marks</title>
		<link href="style.css" rel="stylesheet">
		<link rel="icon" href="icon/icon.png">
	</head>

<body>
	
	<div class="logo">
		<img class="picture" src="logo/logo.png" alt="logo">
	</div>
		
	<div align="center">
	<h1>Mark Register</h1>
	</div>
	
	<div class="main-page-add-mark">
	<h3 class="faculty-login">Add Marks</h3>
	<?php 
	$x=mysqli_query($al,"SELECT * FROM subjects WHERE dept='$dept' AND sem='$sem'");
	$y=mysqli_fetch_array($x);
	$m=mysqli_query($al,"SELECT * FROM students WHERE dept='$dept' AND sem='$sem'");
	?>
	
	<form method="post" action="">
		<table class="enter-roll">
		<tr>
			<td colspan="2" align="center" class="msg"><?php echo $msg;?></td>
		</tr>
		<tr class="tr-1">
			<td>Roll No : </td>
			<td>
			<select name="roll" class="tr-1" required onfocus='this.size=3;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
			<option value="" selected="selected" disabled="disabled">Select Roll</option>
			<?php
			while($n=mysqli_fetch_array($m))
			{
				?>
			<option value="<?php echo $n['roll'];?>"><?php echo $n['roll'];?></option>
			<?php } ?>
			</select>
			</td>
		</tr>
		<tr class="tr-1">
			<td><?php echo $y['s1'];?></td>
			<td><input type="text" name="s1" class="tr-1" size="5" placeholder="40" required="required"></td>
		</tr>
		<tr class="tr-1">
			<td class="labels"><?php echo $y['s2'];?></td>
			<td><input type="text" name="s2" class="tr-1" size="5" placeholder="40" required="required"></td>
		</tr>
		<tr class="tr-1">
			<td class="labels"><?php echo $y['s3'];?></td>
			<td><input type="text" name="s3" class="tr-1" size="5" placeholder="40" required="required"></td>
		</tr>
		<tr class="tr-1">
			<td class="labels"><?php echo $y['s4'];?></td>
			<td><input type="text" name="s4" class="tr-1" size="5" placeholder="40" required="required"></td>
		</tr>
		<tr class="tr-1">
			<td class="labels"><?php echo $y['s5'];?></td>
			<td><input type="text" name="s5" class="tr-1" size="5" placeholder="40" required="required"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" class="register" value="Submit"></td>
		</tr>
		</table>
	</form>
	<br>
	<br>
	<a href="dashboard.php" class="cmd">Back Dashboard</a>
	</div>
	<footer class="footer"><p>&copy; Group of RRMM [CSE, NUB]</p></footer>
</body>
</html>