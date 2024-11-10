<?php
include("config.php");
$roll=$_POST['roll'];
$x=mysqli_query($al,"SELECT * FROM students_final WHERE roll='$roll'");
$y=mysqli_fetch_array($x);
$sem=$y['sem'];
$dept=$y['dept'];
$name=$y['name'];
$a=mysqli_query($al,"SELECT * FROM marks_final WHERE roll='$roll' AND sem='$sem'");
$b=mysqli_fetch_array($a);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Web Result Student</title>
		<link href="style.css" rel="stylesheet">
		<link rel="icon" href="icon/icon.png">
		
		
		<script type="text/javascript" language="javascript">
			window.addEventListener("load", () => {
				const loader = document.querySelector(".loader");

				loader.classList.add("loader--hidden");

				loader.addEventListener("transitionend", () => {
					document.body.removeChild(loader);
			});
			});
		</script>
		
		
	</head> 

<body>
	<?php 
	function gradeletter($mark) {
		if($mark >= 80) {
			echo "A+";
		} 
		elseif ($mark >= 75 && $mark <= 79) {
			echo "A";
		} 
		elseif ($mark >= 70 && $mark <= 74) {
			echo "A-";
		} 
		elseif ($mark >= 65 && $mark <= 69) {
			echo "B+";
		}
		elseif ($mark >= 60 && $mark <= 64) {
			echo "B";
		}
		elseif ($mark >= 55 && $mark <= 59) {
			echo "B-";
		}
		elseif ($mark >= 50 && $mark <= 54) {
			echo "C+";
		}
		elseif ($mark >= 45 && $mark <= 49) {
			echo "C";
		}
		elseif ($mark >= 40 && $mark <= 44) {
			echo "D";
		}
		else {
			echo "F";
		}
	}
	
	function cgpaGenerator($gpa) {
		if($gpa >= 80) {
			return 4.00;
		} 
		elseif ($gpa >= 75 && $gpa <= 79) {
			return 3.75;
		} 
		elseif ($gpa >= 70 && $gpa <= 74) {
			return 3.50;
		} 
		elseif ($gpa >= 65 && $gpa <= 69) {
			return 3.25;
		}
		elseif ($gpa >= 60 && $gpa <= 64) {
			return 3.00;
		}
		elseif ($gpa >= 55 && $gpa <= 59) {
			return 2.75;
		}
		elseif ($gpa >= 50 && $gpa <= 54) {
			return 2.50;
		}
		elseif ($gpa >= 45 && $gpa <= 49) {
			return 2.25;
		}
		elseif ($gpa >= 40 && $gpa <= 44) {
			return 2.00;
		}
		else {
			return "Failed";
		}
	}
	?>
	
	<div class="loader"></div>
	<div class="print-container">
	
	<div class="result-view-header">
	<h1 class="result-view-h1">
	<img class="hearder-logo" src="logo/logo.png" alt="logo">
	<br>
	Munshiganj Polytechnic Institute, Munshiganj
	</h1>
	<h2 class="result-view-h2">Diploma-in-Engineering</h2>
	<h3 class="result-view-h3">WEB BASED SEMESTER RESULT TRANSCRIPT</h3>
	</div>
	
		<table id="marksheet-table">
			<?php 
				$x=mysqli_query($al,"SELECT * FROM students_final WHERE roll='$roll'");
				while($y=mysqli_fetch_array($x))
				{
			?>
			<tr>
				<td>Roll No : <?php echo $roll;?></td>
				<td>Semester : <?php echo $y['sem'];?></td>
				<td>Department : <?php echo $y['dept'];?></td>
				<td>Year : <?php echo $y['year'];?></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="4">Name : <?php echo $name;?></td>
			</tr>
			<tr>
				<th colspan="3">Subject</th>
				<th>Grade</th>
			</tr>	
			<?php 
				$m=mysqli_query($al,"SELECT * FROM subjects_final WHERE sem='$sem' AND dept='$dept'");
				$n=mysqli_fetch_array($m);
			?>
			<?php 
				if($n) {
			?>
					<tr>
						<td colspan="3"><?php echo $n['s1'];?></td>
						<td id="marksheet-table-data"><?php echo gradeletter($b['s1'])?></td>
					</tr>
					<tr>
						<th colspan="3">GPA</th>
						<th>
							<?php 
								if(in_array('Failed', [cgpaGenerator($b['s1'])])) 
								{
									echo "Failed";
								} else {
									echo (cgpaGenerator($b['s1'])) / 1;
								}
							?>
						</th>
					</tr>
					<?php 
					} else { 
					?>	
							<script type="text/javascript" language="javascript">
							alert('Result not published Yet!');
							window.location="Final_Result_index.php";
					</script>
					<?php 
					}
					?>
			
		</table>
		</div>
		<br>
		<button onclick="window.print()" id="button">Print</button>
		<button onclick="location.href='Final_Result_index.php'" type="button" name="button" id="search_again">Search Again</button>
		<br>
		<footer class="footer"><p>&copy; Group of RRMM [CSE, NUB]</p></footer>
</body>
</html>