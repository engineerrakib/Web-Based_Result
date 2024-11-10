<?php
include("config.php");
$m=$_GET['del-marks'];
$sql=mysqli_query($al,"DELETE FROM marks WHERE id='$m'");
if($sql)
{
	?>
	<script type="text/javascript" language="javascript">
	alert('Successfully Deleted');
	window.location="viewMarks.php";
	</script>
<?php

}
?>