<?php
	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 6 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - HTML/ CSS/ JavaScript
		Assignment#: CPRG210 Exercises Day 1 - Day 2 - Day 4 - Day 6
		Summary: implement registration page in html & javascript.
	*/
	include "header.php";
?>

		
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
	
	<div class="col-sm-12">
		<div class="col-sm-6 shadow-lg p-4 mb-4 bg-black container-fluid rounded" style="background-color:lightblue">
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
	</div>
	<br/>
	<hr/>
	<br/>
<?php
	include "footer.php";
?>