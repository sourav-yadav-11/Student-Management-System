<?php
	session_start();

	if (!isset($_SESSION['uname'])) {
		header('location:index.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="style.css">

    	<style type="text/css">
    		.alert-sms{
			color: red;
			}
    	</style>

  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    	<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/css/jquery.dataTables_themeroller.css">
		<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
    	$(document).ready( function () {
    		$('#mytable').DataTable();
		} );
	</script>
</head>
<body>
	<h1 class="text-center " style="font-family: cursive; background-color: black; color: white;">Student Registration INFO</h1>
	<marquee  scrollamount="20" hspace="400"> <p style="color: #2C81F9; font-size: 30px;  margin: 3px;">Welcome <?php echo $_SESSION['uname']; ?></p ></marquee>
	<div class="container">
		<div class="row">
			<div class="text-right col-lg-6"><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add_new">Add New</button></div>
			<div class="text-right"><button class="btn btn-primary btn-lg"><a href="logout.php" style="color: white;









			">Logout</a></button></div>
		</div>
	</div><hr>
	<table id="mytable" class="table table-bordered table-striped table-hover">
		<thead>
				<tr>
					<th>ROLL NUMBER</th>
					<th>USER NAME</th>
					<th>COURSE</th>
					<th>YEAR</th>
					<th>SEMESTER</th>
					<th>PHONE NUMBER</th>
					<th>EMAIL ADDRESS</th>
					<th>OPERATIONS</th>
				</tr>
		</thead>
		<tbody>
					<?php

					include 'config.php';
					$sql = "SELECT * FROM happy";
					$query1 = mysqli_query($con, $sql);
					 

					?>
			<tr>
				<?php while ($result = mysqli_fetch_array($query1)) { ?>
					<td><?php echo $result['RollNo']; ?></td>
					<td><?php echo $result['uname']; ?></td>
					<td><?php echo $result['course']; ?></td>
					<td><?php echo $result['year']; ?></td>
					<td><?php echo $result['sem']; ?></td>
					<td><?php echo $result['PhoneNo']; ?></td>
					<td><?php echo $result['email']; ?></td>
					<td>
						<a href="update1.php?urn=<?php echo $result['RollNo']; ?>"><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#update">Update</button>
						<a href="delete.php?rn=<?php echo $result['RollNo']; ?>"><button class="btn btn-danger">Delete</button></a>
					</td>
			</tr>
			<?php 
					}
				?>
		</tbody>
	</table>


<!-----------------------------------------------------INSERT NEW DATA------------------------------------------------------>


	<div class="modal fade" id="add_new" data-backdrop="static">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<button type="button" class="close" data-dismiss="modal"> &times; </button>
				
				<div class="model-header">
					<h1 class="text-primary" style="text-align: center; font-family: cursive;"><b>REGISTRATION</b></h1><hr>	
				</div>

				<div class="modal-body">
					<form action="reg.php" method="POST" onsubmit="return valfun()">

						<div class="row">
							<div class="form-group col-lg-6 col-md-6">
								<input type="text" name="RollNo" id="RollNo" class="form-control" placeholder="ROLL NUMBER" maxlength="8" required>
								<span id="ralert" class="alert-sms"></span>
							</div>
							<div class="form-group col-lg-6 col-md-6">
								<input type="text" name="uname" id="uname" class="form-control" placeholder="USER NAME" maxlength="20" required>
								<span id="ualert" class="alert-sms"></span>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-lg-6 col-md-6">
								<input type="text" name="course" id="course" class="form-control" placeholder="COURSE" maxlength="30" required>
								<span id="calert" class="alert-sms"></span>
							</div>

							<div class="form-group col-lg-3 col-md-3">
							
								<select name="year" class="form-control col-auto" required >
									<option selected="">Year</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
							</div>

							<div class="form-group col-lg-3 col-md-3">
								<select type="text" name="sem"  class="form-control" required>
									<option selected="">Semester</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="4">5</option>
									<option value="4">6</option>
									<option value="4">7</option>
									<option value="4">8</option>
								</select>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-lg-6 col-md-6">
								<input type="text" name="PhoneNo" id="PhoneNo" class="form-control" placeholder="MOBILE NUMBER" maxlength="10" required>
								<span id="palert" class="alert-sms"></span>
							</div>
							<div class="form-group col-lg-6 col-md-6">
								<input type="email" name="email" id="email" class="form-control" placeholder="EMAIL ADDRESS" maxlength="50" required>
								<span id="ealert" class="alert-sms"></span>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-lg-6 col-md-6">
								<input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD" maxlength="10" required>
								<span id="passalert" class="alert-sms"></span>
							</div>
							<div class="form-group col-lg-6 col-md-6">
								<input type="password" name="cpassword" class="form-control" placeholder="CONFIRM PASSWORD" maxlength="10" required>
							</div>
						</div><hr>

						<div class="form-group text-center">
							<button class="btn btn-danger" name="s_new_data" type="submit">Register Now</button>
						</div>

					</form>
				</div>

				
			</div>
		</div>
	</div>

<!---------------------------------------------------NEW DATA VALIDATION---------------------------------------------------->

	<script type="text/javascript">
		function valfun(){
			var RollNo 		= document.getElementById("RollNo").value;
			var uname 		= document.getElementById("uname").value;
			var course 		= document.getElementById("course").value;
			var PhoneNo 	= document.getElementById("PhoneNo").value;
			// var email 		= document.getElementById("email").value;
			var password 	= document.getElementById("password").value;

			var r_correct = /^[0-9]+$/;
			var u_correct = /^[A-Za-z ]+$/;
			var c_correct = /^[A-Za-z. ]+$/;
			var p_correct = /^[0-9]+$/;
			// var e_correct = /^[]+$/;
			var pass_correct = /^[A-Za-z0-9@#&*]+$/;

			var temp = 0;

			// -----------Roll Number Validation------------------------
			if (RollNo.length != 8){
				document.getElementById("ralert").innerHTML="**Roll Number Must be 8 digits";
				return false;
			}else if(!r_correct.test(RollNo)) {
				document.getElementById("ralert").innerHTML="**Only Numeric value can be taken as Roll Number";
				return false;
			}
			if (temp == 0) {
				document.getElementById("ralert").innerHTML="";

			}
			// ---------User Name Validation-----------------------------
			if (uname.length <3 || uname.length > 20) {
				document.getElementById("ualert").innerHTML="**User Name must be 3-20 characters.";
				return false;
			}else if (!u_correct.test(uname)) {
				document.getElementById("ualert").innerHTML="**Use A-Z/a-z, other characters are not allowed";
				return false;
			}if (temp == 0) {
				document.getElementById("ualert").innerHTML="";

			}
			// ---------Course Validation---------------------------------
			if (!c_correct.test(course)) {
				document.getElementById("calert").innerHTML="**Use A-Z,a-z, . and space, other characters are not allowed";
				return false;
			}
			if (temp == 0) {
				document.getElementById("calert").innerHTML="";

			}
			// ---------Phone Number Validation---------------------------
			if (PhoneNo.length != 10){
				document.getElementById("palert").innerHTML="**Phone Number Must be 10 digits";
				return false;
			}else if(!p_correct.test(PhoneNo)) {
				document.getElementById("palert").innerHTML="**Enter a valid Phone Number";
				return false;
			}
			if (temp == 0) {
				document.getElementById("palert").innerHTML="";

			}
			
			// --------Email Validation-----------------------------------

			// ---------Password Validation-------------------------------
			if (password.length != 10){
				document.getElementById("passalert").innerHTML="**Password Must be 10 digits";
				return false;
			}else if(!pass_correct.test(password)) {
				document.getElementById("passalert").innerHTML="**A-Z,a-z,0-9 & some special characters are allowed";
				return false;
			}if (temp == 0) {
				document.getElementById("passalert").innerHTML="";

			}
			
		}
	</script>

	<!--------------------------------------------------------Validations Over---------------------------------------------------->

</body>
</html>