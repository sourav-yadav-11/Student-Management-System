<?php
	include 'config.php';
	error_reporting(0);

	$RollNo = $_GET['urn'];
	$sql = "SELECT * FROM happy WHERE RollNo = $RollNo";
	$result = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="style.css">

	</style>

</head>
<body background="img/bg5.jpg">
	<marquee  scrollamount="20" hspace="550"> <h1 style="color: #2C81F9;">UPDATE PORTAL</h1></marquee>
	
	

	<div class="col">
		<div class="row justify-content-center">
			<?php
				$qwert = mysqli_fetch_array($result);
			?>

			<form action="" method="POST" class="form-container">

				<div class="row"><h5>UPDATE INFORMATION</h5></div><hr>
				<div><label>User Name</label></div>
				<div class="row"><input type="text" name="uname" value="<?php echo $qwert['uname'];?>" placeholder="User Name"><br></div><br>
				<div><label>Course</label></div>
				<div class="row"><input type="text" name="course" value="<?php echo $qwert['course'];?>" placeholder="Course"><br></div><br>
				<div><label>Phone Number</label></div>
				<div class="row"><input type="text" name="PhoneNo" value="<?php echo $qwert['PhoneNo'];?>" placeholder="Phone Number"><br></div><br>
				<div><label>Email</label></div>
				<div class="row"><input type="email" name="email" value="<?php echo $qwert['email'];?>" placeholder="Email"><br></div><br><hr>
				<div class="row"><button type="submit" name="submit" class="btn btn-primary">Update</button><br>
			</form>

		</div>

	</div>

	<div>
		
		<?php

			if (isset($_POST['submit'])) {
				
				$uname 		= $_POST['uname'];
				$course 	= $_POST['course'];
				$PhoneNo 	= $_POST['PhoneNo'];
				$email 		= $_POST['email'];

				$query = "UPDATE happy SET uname='$uname', course='$course', PhoneNo= '$PhoneNo', email='$email' WHERE RollNo= '$RollNo'";
				$run = mysqli_query($con,$query);

				if ($run == True) {
					
					?> <script type="text/javascript">
							alert("Successfully Updated.");
						location.replace("display.php");
						</script>

					<?php
				}else{
					echo "Something went wrong";
				}
			}

		?>

	</div>

</body>
</html>