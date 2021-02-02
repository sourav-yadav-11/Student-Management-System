<?php
	include 'config.php';

	$RollNo = $_GET['rn'];
	$query = "DELETE  FROM happy WHERE RollNO=$RollNo ";
	$data = mysqli_query($con,$query);

	if ($data) {
		?> 
			<script> 
				alert ("Record Deleted Successfully"); 
				location.replace("display.php");
			</script>
		<?php

		
	}else{
		echo "<font color = Red, font size = 20px> Record Deleted Successfully";
	}
?> 