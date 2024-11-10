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
$sem=$b['sem'];
$dept=$b['dept'];
?>

<!DOCTYPE html>
<html lang="en">

	<head>
	  <meta charset="UTF-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	  <!-- Bootstrap -->
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	  <title>View Subject List</title>
	  <link href="style.css" rel="stylesheet">
	  <link rel="icon" href="icon/icon.png">
	</head>

<body>
		<br>
		<br>
		<br>
		<div class="logo-data-table">
		<img class="picture" src="logo/logo.png" alt="logo">
	    </div>
		<div class="container">
			<div class="text-center mb-4">
				<h3>Edit Subjects Information</h3>
				<p class="text-muted">Any Information Update and Delete Click Action Icons</p>
		</div>
	  
		<a href="dashboard.php" class="btn btn-dark mb-3">Back Dashboard</a>

		<table class="table table-hover table-bordered border-dark text-center">
		  <thead class="table-dark">
			<tr>
			  <th scope="col">ID</th>
			  <th scope="col">Subject-1</th>
			  <th scope="col">Subject-2</th>
			  <th scope="col">Subject-3</th>
			  <th scope="col">Subject-4</th>
			  <th scope="col">Subject-5</th>
			  <th scope="col">Semester</th>
			  <th scope="col">Department</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
				<?php
				$i=1;
				$x=mysqli_query($al,"SELECT * FROM subjects WHERE sem='$sem' AND dept='$dept'");
				while($row=mysqli_fetch_array($x))
				{
					?>
			  <tr>
				<td><?php echo $i;$i++;?></td>
				<td><?php echo $row['s1'];?></td>
				<td><?php echo $row['s2'];?></td>
				<td><?php echo $row['s3'];?></td>
				<td><?php echo $row['s4'];?></td>
				<td><?php echo $row['s5'];?></td>
				<td><?php echo $row['sem'];?></td>
				<td><?php echo $row['dept'];?></td>
				<td>
				  <a href="update_subjects.php?update-subjects=<?php echo $row["id"];?>" class="link-dark" onclick="return confirm('Are You Sure..?');"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
				  <a href="delete_subjects.php?del-subjects=<?php echo $row["id"];?>" class="link-dark" onclick="return confirm('Are You Sure..?');"><i class="fa-solid fa-trash fs-5"></i></a>
				</td>
			  </tr>
			<?php
			}
			?>
		</tbody>
		</table>
		</div>

		<!-- Bootstrap -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


		<footer class="footer"><p>&copy; Group of RRMM [CSE, NUB]</p></footer>

</body>
</html>