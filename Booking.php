<?php
	/*
		Author: Peter
		Date created: Nov - 14 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 8
		Summary: construct the Registration Page 
				to allow user register .
	*/
	
	session_cache_expire(30);
	session_start();
	
	include "header.php";
	
	//set value to activeTab by session variable
	$_SESSION["activeTab"] = "travelPackagesTab";
	
	
	//navigations
	include "menu.php";
	
?>
<div id="registerPage" class="registerContainer"> 
	<form method="post"> <!--This code checks for valid userid and password is the userid table-->
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
		<button type="submit" name="submit" class="btn btn-default" id="submit1" value="Log In" onclick="alert('We received your booking information. Thank you for using our service.');">Book A Package</button>

	</form>
</div>
<?php 
	include "footer.php";
?>


