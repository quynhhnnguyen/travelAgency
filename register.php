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
	$_SESSION["activeTab"] = "registrationsTab";
	
	//navigations
	include "menu.php";
	
?>

  <script type="text/javascript">

  function chkother(fld,length,index) //This function allows input of countries other than Canada, Mexico and United States
  {                                   //Also it allows the input of Provinces or States outside of Canada.
    if ((index+1)==length)
      {
        other=prompt("Please indicate 'other' value:");
        fld.options[index].value=other;
        fld.options[index].text=other;
      }
    }


    function validate(myform) //This function ensures a valid Canadian postal code format.
    {
      document.getElementById("message").innerHTML = "";
      var message = "";

      myform.pcode.value = myform.pcode.value.toUpperCase();
      var reg = /^[a-z]\d[a-z] ?\d[a-z]\d$/i;
      if (!reg.test(myform.pcode.value))
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

<div class="container-fluid registerBackground">
    <h2 class="registerme">PLEASE REGISTER BELOW</h2>
   <div class="registerContainer">
   <form action="bouncer.php" method="post">
    <div class="row justify-content-end">
      <div class="col-50">
        <label for="fname">First Name</label>
      </div>
      <div class="col-50">
        <input type="text" id="fname" name="firstname" required="required" placeholder="First name..">
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="mname">Middle Name</label>
      </div>
      <div class="col-50">
        <input type="text" id="mname" name="middlename" placeholder="Middle name..">
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="lname">Last Name</label>
      </div>
      <div class="col-50">
        <input type="text" id="lname" name="lastname" required="required" placeholder="Last name..">
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="userid">User ID</label>
      </div>
      <div class="col-50">
        <input type="text" id="userid" name="userid" required="required" placeholder="User Id..">
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="pswd">Password</label>
      </div>
      <div class="col-50">
        <input type="password" id="pswd" name="password" value="" required="required" placeholder="Password..">
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="pwrepeat">Password Repeat</label>
      </div>
      <div class="col-50">
        <input type="password" id="pwrepeat" name="pwrepeat" value="" required="required" placeholder="Password repeat..">
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="housenumber">House number</label>
      </div>
      <div class="col-50">
        <input type="number" id="housenumber" name="housenumber" required="required" min=
        "1" max="1000000" placeholder="House number.."><!--House number can not be negative  -->
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="street">Street</label>
      </div>
      <div class="col-50">
        <input type="text" id="street" name="street" required="required" placeholder="Street..">
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="city">City</label>
      </div>
      <div class="col-50">
        <input type="text" id="city" name="city" required="required"  placeholder="City..">
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="hphone">Home Phone</label>
      </div>
      <div class="col-50">
        <input type="phone" id="hphone" name="hphone" placeholder="Home Phone..">
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="busphone">Business Phone</label>
      </div>
      <div class="col-50">
        <input type="phone" id="busphone" name="busphone" required="required"  placeholder="Business Phone..">
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="emailD">Email Address</label>
      </div>
      <div class="col-50">
        <input type="email" id="emailD" name="emailD" required="required"  placeholder="Email Address..">
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="pcode">Postal Code</label>
      </div>
      <div class="col-50">
        <input type="text" id="pcode" name="pcode" required="required"><p id="message" style="font-size:20px; font-weight:bold; color:red;"></p>
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="province">Province</label>
      </div>
      <div class="col-50">
        <select onchange="chkother(this,this.options.length,this.options.selectedIndex)" name="province" id="province" class="provinceSelect">
        <option value="select province" id="province1" selected>Select Province</option>
        <option value="Alberta" id="province1">Alberta</option>
        <option value="Bristish Columbia" id="province1">Bristish Columbia</option>
        <option value="Manitiba" id="province1">Manitiba</option>
        <option value="Alberta" id="province1">Alberta</option>
        <option value="New Foundland & Labrador" id="province1">New Foundland & Labrador</option>
        <option value="Nova Scotia" id="province1">Nova Scotia</option>
        <option value="Prince Edward Island" id="province1">Prince Edward Island</option>
        <option value="Quebec" id="province1">Quebec</option>
        <option value="Saskatchewan" id="province1">Saskatchewan</option>
        <option value="Other" id="country1">Other</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="country">Country</label>
      </div>
      <div class="col-50">
        <select onchange="chkother(this,this.options.length,this.options.selectedIndex)" name="country" id="country" class="countrySelect">
         <option value="select country" id="country1" selected>Select Country</option>
         <option value="Canada" id="country1">Canada</option>
         <option value="United States" id="country1">United States</option>
         <option value="Mexico" id="country1">Mexico</option>
         <option value="Other" id="country1">Other</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-50">
        <label for="destination">Travel Destination</label>
      </div>
      <div class="col-50">
        <textarea id="destination" name="destination" placeholder="Write favorite destination.." style="height:150px"></textarea>
      </div>
    </div>
    <div class="row">
	  <button type="submit" class="pure-button pure-button-primary" onclick="return validate(this.form);">Submit</button>
	  <button type="reset" class="pure-button pure-button-primary" onclick="return confirm('Do you really want to reset?');">Reset</button>
    </div>
   </div>

  <script type="text/javascript">
    var pswd = document.getElementById("pswd");
    var pwrepeat = document.getElementById("pwrepeat");

    function passwordValidate() // This function to ensure password and repeat password matches
      {
        if(pswd.value != pwrepeat.value)
          {
            pwrepeat.setCustomValidity("Password does not match");
          }
          else
          {
            pwrepeat.setCustomValidity("");
          }
      }
      pswd.onchange = passwordValidate;
      pwrepeat.onkeyup = passwordValidate;
  </script>
  </form>
  </div>
</div>
<?php 
	include "footer.php";
?>