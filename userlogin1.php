<?php
	session_cache_expire(30);
	session_start();
?>

<!DOCTYPE html>
<html><!--This the customer registration page-->
	<title>LoginPage</title>
	<Head>
	  <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link href="style.css" type="text/css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" media="screen" href="reset.css" /> <!-- reset default css settings-->
      <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin" />   <!--  my favourite font  -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> <!-- Latest compiled and minified bootstrap CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  
	  <script type="text/javascript">
		
      function validate(myform) //This function ensures a valid Canadian postal code format.
      {
      document.getElementById("message").innerHTML = "";
      var message = "";

      myform.CustPostal.value = myform.CustPostal.value.toUpperCase();
      var reg = /^[a-z]\d[a-z] ?\d[a-z]\d$/i;
      if (!reg.test(myform.CustPostal.value))
      {
        message += "Invalid Postal Code format: should be X9X 9X9<br />";
      }

       if (message)
      {
        document.getElementById("message").innerHTML = message;
        return false;
      }
    }
	
    </script>
	  
	</Head>
	<body>
	<form method="post" action="register1-1.php">
		<div class="form-group">
			<h3 style="color:red; font-family: Papyrus; font-weight: bold; margin-top: 20px;">Please Register Below</h3>
		</div>
		<div class="form-group">
			<label for="CustFirstName" id="label1">First Name:</label>
			<input type="text" class="form-control" name="CustFirstName"  id="CustFirstName" placeholder="First name..." required="required">
		</div>
		<div class="form-group">
			<label for="CustLastName" id="label1">Last Name:</label>
			<input type="text" class="form-control" name="CustLastName"  id="CustLastName" placeholder="Last name..." required="required">
		</div>
		<div class="form-group">
			<label for="CustAddress" id="label1">Address:</label>
			<input type="text" class="form-control" name="CustAddress"  id="CustAddress" placeholder="Customer address..." required="required">
		</div>
		<div class="form-group">
			<label for="CustCity" id="label1">City:</label>
			<input type="text" class="form-control" name="CustCity"  id="CustCity" placeholder="City..." required="required">
		</div>
		<div class="form-group">
			<label for="CustProv" id="label1">Province:</label><br />
			<select class="form-control" name="CustProv" id="CustProv" onchange="chkother(this,this.options.length,this.options.selectedIndex)">
				<option value="select province" id="CustProv" selected>Select Province</option>
				<option value="Alberta" id="CustProv" name="CustProv">Alberta</option>
				<option value="Bristish Columbia" id="CustProv"name="CustProv" >Bristish Columbia</option>
				<option value="Manitiba" id="CustProv" name="CustProv">Manitiba</option>
				<option value="Alberta" id="CustProv" name="CustProv">Alberta</option>
				<option value="New Foundland & Labrador" id="CustProv" name="CustProv">New Foundland & Labrador</option>
				<option value="Nova Scotia" id="CustProv" name="CustProv">Nova Scotia</option>
				<option value="Prince Edward Island" id="CustProv" name="CustProv">Prince Edward Island</option>
				<option value="Quebec" id="CustProv" name="CustProv">Quebec</option>
				<option value="Saskatchewan" id="CustProv" name="CustProv">Saskatchewan</option>
				<option value="Other" id="CustProv" name="CustProv">Other</option>
			</select>
		</div>
		<div class="form-group">
			<label for="CustPostal" id="label1">Postal Code:</label>
			<input type="text" class="form-control" name="CustPostal"  value="" id="CustPostal" placeholder="Postal code..." required="required">
			<p id="message" style="font-size:20px; font-weight:bold; color:red;"></p>
		</div>
		<div class="form-group">
			<label for="CustCountry" id="label1">Country:</label>
			<select class="form-control" name="CustCountry" id="CustCountry" onchange="chkother(this,this.options.length,this.options.selectedIndex)">
				<option value="select country" id="country1" selected>Select Country</option>
				<option value="Canada" id="country1" name="CustCountry">Canada</option>
				<option value="United States" id="country1" name="CustCountry">United States</option>
				<option value="Mexico" id="country1" name="CustCountry">Mexico</option>
				<option value="Other" id="country1" name="CustCountry">Other</option>
			</select>
		</div>
		<div class="form-group">
			<label for="CustHomePhone" id="label1">Home Phone:</label>
			<input type="phone" class="form-control" name="CustHomePhone"  id="CustHomePhone" placeholder="Home Phone..." required="required">
		</div>
		<div class="form-group">
			<label for="CustBusPhone" id="label1">Business Phone:</label>
			<input type="phone" class="form-control" name="CustBusPhone"  id="CustBusPhone" placeholder="Business Phone..." required="required">
		</div>
		<div class="form-group">
			<label for="CustEmail" id="label1">Email:</label>
			<input type="email" class="form-control" name="CustEmail"  id="CustEmail" placeholder="Email..." required="required">
		</div>
		
		<div class="form-group">
			<label for="AgentId" id="label1">Agent ID:</label>
			<select class="form-control" name="AgentId" id="AgentId">
				<option value="agent ID" id="AgentId" selected>Select agent ID</option>
				<option value="1" id="AgentId" name="AgentId">1</option>
				<option value="2" id="AgentId" name="AgentId">2</option>
				<option value="3" id="AgentId" name="AgentId">3</option>
				<option value="4" id="AgentId" name="AgentId">4</option>
				<option value="5" id="AgentId" name="AgentId">5</option>
				<option value="6" id="AgentId" name="AgentId">6</option>
				<option value="7" id="AgentId" name="AgentId">7</option>
				<option value="8" id="AgentId" name="AgentId">8</option>
				<option value="9" id="AgentId" name="AgentId">9</option>
				<option value="10" id="AgentId" name="AgentId">10</option>
				<option value="11" id="AgentId" name="AgentId">11</option>
				<option value="12" id="AgentId" name="AgentId">12</option>
				<option value="13" id="AgentId" name="AgentId">13</option>
				<option value="14" id="AgentId" name="AgentId">14</option>
				<option value="15" id="AgentId" name="AgentId">15</option>
				<option value="16" id="AgentId" name="AgentId">16</option>
			</select>
		</div>
		<div class="form-group">
			<label for="UserId" id="label1">User ID:</label>
			<input type="text" class="form-control" name="UserId"  id="UserId" placeholder="UserId ID..." required="required">
		</div>
		<div class="form-group">
			<label for="UserPassword" id="label1">Password:</label>
			<input type="UserPassword" class="form-control" name="UserPassword" value="" id="UserPassword" placeholder="Password..." required="required">
		</div>
		<div class="checkbox">
			<label id="label1"><input type="checkbox" name="remember" id="checkbox"> Remember me</label>
		</div>
		<button type="submit" class="btn btn-default" name="submit" id="submit1" value="Log In">Register</button>
		
	</form>
	
	</body>
</html>

