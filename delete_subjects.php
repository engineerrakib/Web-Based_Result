<?php
include("config.php");
$j=$_GET['del-subjects'];
$sql=mysqli_query($al,"DELETE FROM subjects WHERE id='$j'");
if($sql)
{
	?>
	<script type="text/javascript" language="javascript">
	alert('Successfully Deleted');
	window.location="viewSubjects.php";
	</script>
<?php

}
?>