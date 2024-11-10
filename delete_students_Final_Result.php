<?php
include("config.php");
$d=$_GET['del-student-final'];
$sql=mysqli_query($al,"DELETE FROM students_final WHERE id='$d'");
if($sql)
{
	?>
	<script type="text/javascript" language="javascript">
	alert('Successfully Deleted');
	window.location="viewStudents_Final_Result.php";
	</script>
<?php

}
?>