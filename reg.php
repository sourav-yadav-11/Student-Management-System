<?php require_once"config.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
	<?php

		if (isset($_POST['s_new_data'])) {

			$RollNo = $_POST['RollNo'];
			$uname = $_POST['uname'];
			$course = $_POST['course'];
			$year = $_POST['year'];
			$sem = $_POST['sem'];
			$PhoneNo = $_POST['PhoneNo'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];


			$RollNoquery = "SELECT * FROM happy WHERE RollNO = '$RollNo' ";
			$Rquery = mysqli_query($con,$RollNoquery);
			$RollNocount = mysqli_num_rows($Rquery);

			$emailquery = "SELECT * FROM happy WHERE email = '$email' ";
			$equery = mysqli_query($con,$emailquery);
			$emailcount = mysqli_num_rows($equery);

			if ($RollNocount>0) {

				?> <script type="text/javascript">
						alert("Roll Number Already Exist. Please Try Something other");
						location.replace("display.php");
					</script> 
				<?php

			}else if ($emailcount>0) {

				?> <script type="text/javascript">
						alert("Email Already Used. Please use another Email.");
						location.replace("display.php");
					</script> 
				<?php

			}else if ($password !== $cpassword) {
				
				?> <script type="text/javascript">
						alert("Password Don't match.");
						location.replace("display.php");
					</script>

				<?php

			}else{

				$sql = "INSERT INTO happy(RollNo, uname, course, year, sem, PhoneNo, email, password, cpassword) Values('$RollNo', '$uname', '$course', '$year', '$sem', '$PhoneNo', '$email', '$password', '$cpassword')";

				$result = mysqli_query($con,$sql);

				if ($result) {
					
					?> <script type="text/javascript">
						alert("Registered successfully.");
						location.replace("display.php");
					</script>

				<?php

				}else{
					echo "Please try someting other";
					
				}
			}

		}
	?>	
</body>
</html>