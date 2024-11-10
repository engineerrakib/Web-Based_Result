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

	  <!-- DataTable CSS -->
	  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
	  
	  <!-- DataTable Javascript -->
	  <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
	  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	  <script defer src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
	  <script defer src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
	  <script defer src="script.js"></script>


	  <title>View User List</title>
	  <link href="style.css" rel="stylesheet">
	  <link rel="icon" href="icon/icon.png">
	</head>

<body class="table-view">
		<br>
		<br>
		<br>
		<div class="logo-data-table">
		<img class="picture" src="logo/logo.png" alt="logo">
	    </div>
		<div class="container">
			<div class="text-center mb-4">
				<h3>Edit User Information</h3>
				<p class="text-muted">Any Information Update and Delete Click Action Icons</p>
		</div>
	  
		<a href="dashboard_admin.php" class="btn btn-primary mb-3">Back Admin Page</a>

		<table id="example" class="table table-hover table-bordered text-center" style="width:100%">
		  <thead class="table-warning">
			<tr>
			  <th scope="col">ID</th>
			  <th scope="col">Name</th>
			  <th scope="col">Semester</th>
			  <th scope="col">Department</th>
			  <th scope="col">Email</th>
			  <th scope="col">Password</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
				<?php
				$i=1;
				$x=mysqli_query($al,"SELECT * FROM faculty");
				while($row=mysqli_fetch_array($x))
				{
					?>
			  <tr>
				<td><?php echo $i;$i++;?></td>
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['sem'];?></td>
				<td><?php echo $row['dept'];?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['password'];?></td>
				<td>
				  <a href="update_User.php?update-user=<?php echo $row["id"];?>" class="link-dark" onclick="return confirm('Are You Sure..?');"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
				  <a href="delete_User.php?del-user=<?php echo $row["id"];?>" class="link-dark" onclick="return confirm('Are You Sure..?');"><i class="fa-solid fa-trash fs-5"></i></a>
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


