<?php
	session_cache_expire(30);
	session_start();
?>

<!DOCTYPE html>
<html>
	<title>BookingPage</title>
	<Head>
	  <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link href="style.css" type="text/css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" media="screen" href="reset.css" /> <!-- reset default css settings-->
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin" />   <!--  my favourite font  -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> <!-- Latest compiled and minified bootstrap CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	</Head>
	<body>
	<form method="post" action="valid_data1.php"> <!--This code checks for valid userid and password is the userid table-->
		<div class="form-group">
			<label for="CustFirstName" id="label1">First Name:</label>
			<input type="text" class="form-control" name="firstname"  id="CustFirstName" placeholder="First name..." >
		</div>
		<div class="form-group">
			<label for="CustLastName" id="label1">Last Name:</label>
			<input type="text" class="form-control" name="lastname"  id="CustLastName" placeholder="Last name...">
		</div>
		<div class="form-group">
			<label for="text" id="label1">USERID:</label>
			<input type="text" class="form-control" name="userid"  id="userid" placeholder="Userid..." >
		</div>
		<div class="form-group">
			<label for="pwd" id="label1">Password:</label>
			<input type="password" class="form-control" name="password" value="" id="pwd" placeholder="Password..." >
		</div>
		<div class="form-group">
			<label for="bookings" id="label1">Packages:</label>
			<select class="form-control" name="bookings" id="bookings" >
				<option value="select a packages" id="package1" selected>Select A Package</option>
				<option value="Canada" id="country1" name="package1">Canada</option>
				<option value="United States" id="country1" name="package1">United States</option>
				<option value="Mexico" id="country1" name="package1">Mexico</option>
				<option value="Other" id="country1" name="package1">Brazil</option>
			</select>
		</div>
		<div class="checkbox">
			<label id="label1"><input type="checkbox" name="remember" id="checkbox"> Remember me</label>
		</div>
		<button type="submit" name="submit1" class="btn btn-default" id="submit1" value="Log In">Book A Package</button>
		<button type="submit" name="submit1" class="btn btn-default" id="submit1" value="Log In"><a href="userlogin1.php"></a>Signup</button>
	</form>
	</body>
</html>


