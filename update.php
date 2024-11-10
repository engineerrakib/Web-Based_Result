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


$id = $_GET["update"];

if (isset($_POST["submit"])) {
  $name = $_POST['name'];
  $roll = $_POST['roll'];
  $sem = $_POST['sem'];
  $dept = $_POST['dept'];
  $year = $_POST['year'];

  $z =mysqli_query($al,"UPDATE students SET name='$name', roll='$roll', sem='$sem', dept='$dept', year='$year' WHERE id = $id");
  
  if($z) {
	?>
	<script type="text/javascript" language="javascript">
	alert('Successfully Updated');
	window.location="viewStudents.php";
	</script>
	<?php
}
}

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

  <title>View Student List</title>
  <link href="style.css" rel="stylesheet">
  <link rel="icon" href="icon/icon.png">
</head>

<body>
		<br>
		<br>
		<div class="logo-data-table">
		<img class="picture" src="logo/logo.png" alt="logo">
	    </div>
	
  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Students Information</h3>
      <p class="text-muted">Click Update after changing any information</p>
    </div>
	
	<?php
    $sql =mysqli_query($al,"SELECT * FROM students WHERE id = $id LIMIT 1");
    $row = mysqli_fetch_assoc($sql);
    ?>

   

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Roll:</label>
            <input type="text" class="form-control" name="roll" value="<?php echo $row['roll'] ?>">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Semester:</label>
          <input type="text" class="form-control" name="sem" value="<?php echo $row['sem'] ?>">
        </div>
		<div class="mb-3">
          <label class="form-label">Department:</label>
          <input type="text" class="form-control" name="dept" value="<?php echo $row['dept'] ?>">
        </div>
		<div class="mb-3">
          <label class="form-label">Year:</label>
          <input type="text" class="form-control" name="year" value="<?php echo $row['year'] ?>">
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="viewStudents.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	
	<footer class="footer"><p>&copy; Group of RRMM [CSE, NUB]</p></footer>
</body>

</html>