<?php
	include "header.php";
	
	//set value to activeTab by session variable
	$_SESSION["activeTab"] = "registrationsTab";
	
	//navigations
	include "menu.php";
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" type="text/css" href="/study/css/css.css"></link>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		
		<script src="/study/js/utils.js"></script>
		
		<style>
		    //input[value] { background-color:blue }
			input[type*=wo] { background-color:green }
			//input[type*=e] { background-color:yellow }
			option[value=wp] { background-color:orange }
			#table1 {
				//background-image: url(study/img/iggy2.png);
				opacity: 1;
			}
			
			.tip {
				visibility: hidden;
				position: absolute;
				left: 30%;
				//top: 50%;
				background-color: green;
				color: yellow;
			}
		</style>
		
		<script>
		
			function preSubmit() {
				if (validateInfo()) {
				resetMissingInfoNotification();
					return confirm('Are you sure that you want to submit all information?');
				}
				
				return false;				
			}
			
			function validateInfo() {
				
				resetMissingInfoNotification();

				if (isNull("fname")) {
					elementDisplay("fnameMissing");
					return false;
				}
				
				if (isNull("lname")) {
					elementDisplay("lnameMissing");
					return false;
				}
				
				if (isNull("email")) {
					//		harv.peters@a-1.com.sait.ca		!#$%&'*+\/=?^_`{-
					var reg = /^[a-zA-Z][a-zA-Z0-9.!#$%&'*+\/=?^_`{-]+@([a-zA-Z][a-zA-Z0-9-]+\.)+[a-zA-Z]{2,6}$/;
					
					if (!reg.test(document.getElementById("email").value))
					{
						elementDisplay("invalidEmail");
						return false;
					}
				}
				
				if (isNull("postalcode")) {
					var postalcodeEle = document.getElementById("postalcode");
					postalcodeEle.value = postalcodeEle.value.toUpperCase();
					var reg2 = /(^[A-Z]\d[A-Z] ?\d[A-Z]\d$)|(^\d{5}( ?\d{4})?$)/i;
					if (!reg2.test(postalcodeEle.value))
					{
						elementDisplay("invalidPostalCode");
						return false;
					}
				}
	
				return true;
			}
			
			function resetMissingInfoNotification() {
				elementHidden("fnameMissing");
				elementHidden("lnameMissing");
				elementHidden("invalidEmail");
				elementHidden("invalidPostalCode");
			}
			
		</script>

		<title>Happy Together Travel Agency</title>
	</head>
	
	<body class="background" onload="setInterval(doItemMovement, 100)">
		<div id="headercontainer" class="headercontainer">
			<!--div id="logo" class="logoresize"><img src="/study/img/plane.jpg" alt="Happy Together Travel Agency"/></div-->
			<div id="movingItem" class="welcomesentence"><h1>Registration</h1></div>
		</div>
		<hr/>
		<div class="col-sm-6 rounded shadow-lg p-4 mb-4 bg-black">
			<form method="post" action="bouncer.php" id="custInfo">
				<div>
					<div>
						<h2><b>Enter your information:</b></h2>
						<br/>
						<p class="tip" id="tipFname">Enter your First Name</p>
						<p class="tip" id="tipLname">Enter your Last Name</p>
						<p class="tip" id="tipEmail">Enter your Email Address</p>
						<p class="tip" id="tipAddress">Enter your Home Address</p>
						<p class="tip" id="tipHomePhone">Enter your Home Phone <br/> 999-999-9999.</p>
						<p class="tip" id="tipCellPhone">Enter your Cell Phone <br/> 999-999-9999.</p>
						<p class="tip" id="tipCity">Enter your City</p>
						<p class="tip" id="tipPostalCode">Enter your Postal Code</p>
						<br/>
						<br/>
					</div>
					
					<div id="table1">				
						<div class="form-inline">
							<label class="col-sm-4 control-label labelStyle">First Name:</label>
							<input type="text" class="form-control" id="fname" name="fname" required="required" 
									onfocus="tipFname.style.visibility='visible'"
									onblur="tipFname.style.visibility='hidden'">
							<span class="missingInfo" style="display:none" id="fnameMissing">* First Name is missing</span>
						</div>
						<div class="form-inline">
							<label class="col-sm-4 control-label labelStyle">Last Name:</label>
							<input type="text" class="form-control" id="lname" name="lname" required="required"
									onfocus="tipLname.style.visibility='visible'"
									onblur="tipLname.style.visibility='hidden'">
							<span class="missingInfo" style="display:none" id="lnameMissing">* Last Name is missing</span>
						</div>
						<div class="form-inline">
							<label class="col-sm-4 control-label labelStyle">Age:</label>
							<input type="number" class="form-control" id="age" name="age">
						</div>
						<div class="form-inline">
							<label class="col-sm-4 control-label labelStyle">Date Of Birth:</label>
							<input type="date" class="form-control" id="birthday" name="birthday">
						</div> 
						<div class="form-inline">
							<label class="col-sm-4 control-label labelStyle">Email address:</label>
							<input type="email" class="form-control" id="email" name="email" required="required"
									onfocus="tipEmail.style.visibility='visible'"
									onblur="tipEmail.style.visibility='hidden'">
							<span class="missingInfo" style="display:none" id="invalidEmail">* Invalid Email Address.</span>
						</div>
						<div class="form-inline">
							<label class="col-sm-4 control-label labelStyle">Address:</label>
							<textarea class="form-control" id="address" name="address" required="required"
									rows="3" placeholder="Enter your address"
									onfocus="tipAddress.style.visibility='visible'"
									onblur="tipAddress.style.visibility='hidden'"></textarea>
						</div>
						<div class="form-inline">
							<label class="col-sm-4 control-label labelStyle">Home Phone:</label>
							<input type="phone" class="form-control" id="homephone" name="homephone"
									onfocus="tipHomePhone.style.visibility='visible'"
									onblur="tipHomePhone.style.visibility='hidden'">
						</div>
						<div class="form-inline">
							<label class="col-sm-4 control-label labelStyle">Cell Phone:</label>
							<input type="phone" class="form-control" id="cellphone" name="cellphone"
									onfocus="tipCellPhone.style.visibility='visible'"
									onblur="tipCellPhone.style.visibility='hidden'">
						</div>	
						<div class="form-inline">
							<label class="col-sm-4 control-label labelStyle">City:</label>
							<input type="text" class="form-control" id="city" name="city"
									onfocus="tipCity.style.visibility='visible'"
									onblur="tipCity.style.visibility='hidden'">
						</div>	
						<div class="form-inline">
							<label class="col-sm-4 control-label labelStyle">Province:</label>
							<select id="provinces" name="provinces" multiple="multiple" class="form-control">
									<option value="">Select a province</option>
									<option value="AB">Alberta</option>
									<option value="SK">Saskatchewan</option>
									<option value="BC">British Columbia</option>
									<option value="MB">Manitoba</option>
									<option value="WP">Winnipeg</option>
							</select>
						</div>
						<div class="form-inline">
							<label class="col-sm-4 control-label labelStyle">Postal Code:</label>
							<input type="phone" class="form-control" id="postalcode" name="postalcode"
									onfocus="tipPostalCode.style.visibility='visible'"
									onblur="tipPostalCode.style.visibility='hidden'">
							<span class="missingInfo" style="display:none" id="invalidPostalCode">* Invalid Postal Code. The format should be X9X 9X9.</span>
						</div>		
				
						<div class="form-inline">
							<label class="col-sm-4 control-label labelStyle">Travel Destinations:</label>
							<select id="destinations" name="destinations" multiple="multiple" class="form-control">
									<option value="">Select a destination</option>
									<option value="bf">Banff</option>
									<option value="mx">Mexico</option>
									<option value="to">Toronto</option>
									<option value="wp">Winnipeg</option>
									<option value="hw">Hawaii</option>
									<option value="jv">Java</option>
							</select>
						</div>
						<div class="form-inline">
							<input type="submit" class="btn btn-primary" value="Register" onclick="return preSubmit();"/>
							<input type="reset" class="btn btn-warning" value="Reset" 
									onclick="return confirm('Do you really want to reset all information?')? resetMissingInfoNotification():false;"/>
						</div>			
					</div>
				</div>

			</form>
		</div>
		<br/>
		<div><a href="/index.html">Back to Home Page</a></div>
		<hr/>
		<div class="copyright">This page copyrighted &copy; by Happy Together Travel Agency</div>
	</body>
</html>
<!-- footer -->		
<?php
	include "footer.php";
?>