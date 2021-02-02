
<?php
  if(isset($_SESSION['uname']))
  {
  	header('location:display.php');
  }
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login | Page</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body background="img/bg5.jpg">
	<marquee  scrollamount="20" hspace="550"> <h1 style="color: #2C81F9;">LOGIN PAGE</h1></marquee>

	<?php
		include 'config.php';
	?>

	<div class="col">
		<div class="row justify-content-center">
			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form-container">
				
				<div style="width: 240px; text-align: center;"><h1 style="color: #2C81F9">USER LOGIN</h1><hr></div>


				<div class="row"><input type="text" name="id" placeholder ="Admin ID Number"><br><div><br>
				<div class="row"><input type="password" name="password" placeholder ="Password"><br></div><br>
				<div class="row"><button name="submit" type="submit" class="btn btn-primary">Login</button></div>
				<div style="width: 240px; text-align: center;"><p>Don't have an Account? <a href="reg.php"><br> Register Now. </a></p>
			</form>
		</div>
	</div>

	<div>
		<?php

			if (isset($_POST['submit'])) {
				$id 		= $_POST['id'];
				$password 	= $_POST['password'];

				$id_search = "SELECT * FROM admin WHERE id ='$id'";
				$query = mysqli_query($con , $id_search);
				$id_count = mysqli_num_rows($query);
				
				if ($id_count) {

					$id_pass = mysqli_fetch_assoc($query);
					$user_pass = $id_pass['password'];

					if ($password == $user_pass) {
					session_start();
					$_SESSION['uname'] = $id_pass['uname'];
						echo "Login Successful";
						?>
							<script>
									location.replace("display.php");
							</script>
						<?php
					}else{
						echo "<p style='color: red; text-align: center;'><b>**Incorrect Password</b></p>";
					}

				}else{
					echo "<p style='color: red; text-align: center;'><b>**Invalid Roll Number</b></p>";
				}

			}
		?>
	</div>
</body>
</html>