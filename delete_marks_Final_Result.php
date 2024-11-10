<?php
include("config.php");
$m=$_GET['del-marks-final'];
$sql=mysqli_query($al,"DELETE FROM marks_final WHERE id='$m'");
if($sql)
{
	?>
	<script type="text/javascript" language="javascript">
	alert('Successfully Deleted');
	window.location="viewMarks_Final_Result.php";
	</script>
<?php

}
?>