<?php
include("config.php");
$d=$_GET['del-user'];
$sql=mysqli_query($al,"DELETE FROM faculty WHERE id='$d'");
if($sql)
{
	?>
	<script type="text/javascript" language="javascript">
	alert('Successfully Deleted');
	window.location="viewUser_List.php";
	</script>
<?php

}
?>