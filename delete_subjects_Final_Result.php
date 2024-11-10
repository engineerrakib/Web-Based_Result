<?php
include("config.php");
$c=$_GET['del-subjects-final'];
$sql=mysqli_query($al,"DELETE FROM subjects_final WHERE id='$c'");
if($sql)
{
	?>
	<script type="text/javascript" language="javascript">
	alert('Successfully Deleted');
	window.location="viewSubjects_Final_Result.php";
	</script>
<?php

}
?>