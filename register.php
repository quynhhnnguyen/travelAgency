<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head> <!-- The register page was written by Peter Oganwu -->
  <meta charset="utf-8">
  <title>Registration Page</title>
  <style media="screen">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="../css/reset.css" /> <!-- reset default css settings-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!-- Latest compiled and minified bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> <!-- Latest compiled and minified bootstrap CSS for fomrs -->
	
* {
  box-sizing: border-box; //reset CSS styling to default values
}

body
{
  background-image: url("bee-eaters-.jpg");
  background-repeat: no-repeat;
  background-position: center;
  height: 100%;
  background-size: cover;
}

input[type=text], input[type=phone], input[type=date], /* Styling for input element types text, email, select, textarea and phone */
input[type=email], select, textarea
{
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    background-color: #98FB98;
    color: #00008B;
    font-size: 15px;
}

input[type=password], input[type=number]  /* Styling for input element password and number */
{
    width: 30%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    background-color: #98FB98;
    font-size: 15px;
}
#province1

{
    width: 50%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    margin: 20px;
    background-color: #98FB98;
    font-size: 15px;
}

label

{
    padding: 12px 12px 12px 0;
    display: inline-block;
    font-size: 20px;
    font-weight: bold;
    color: #00008B;
}

button[type=submit]

{
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

button[type=reset]

{
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: left;
}

botton[type=submit]:hover

{
    background-color: #45a049;
}

button[type=reset]:hover

{
    background-color: #45a049;
}


.container

{
    border-radius: 5px;
    background-color: #ADD8E6;
    padding: 20px;
    width: 50%;
}

.registerme

{

  border: 1px solid #ADD8E6;
  background-color: #ADD8E6;
  width: 51%;
  padding: 5px;
  border-radius: 4px;
  text-align: center;
  color: #00008B;
}
  </style>
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

  </head>
  <body>
    <h2 class="registerme">PLEASE REGISTER BELOW</h2>
   <div class="container">
   <form action="bouncer.php" method="post">
    <div class="row">
      <div class="col-50">
        <label for="fname">First Name</label>
      </div>
      <div class="col-50">
        <input type="text" id="fname" name="firstname" required="required" placeholder="First name..">
      </div>
    </div>
    <div class"row">
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
    <div class"row">
      <div class="col-50">
        <label for="city">City</label>
      </div>
      <div class="col-50">
        <input type="text" id="city" name="city" required="required"  placeholder="City..">
      </div>
    </div>
    <div class"row">
      <div class="col-50">
        <label for="hphone">Home Phone</label>
      </div>
      <div class="col-50">
        <input type="phone" id="hphone" name="hphone" placeholder="Home Phone..">
      </div>
    </div>
    <div class"row">
      <div class="col-50">
        <label for="busphone">Business Phone</label>
      </div>
      <div class="col-50">
        <input type="phone" id="busphone" name="busphone" required="required"  placeholder="Business Phone..">
      </div>
    </div>
    <div class"row">
      <div class="col-50">
        <label for="emailD">Email Address</label>
      </div>
      <div class="col-50">
        <input type="email" id="emailD" name="emailD" required="required"  placeholder="Email Address..">
      </div>
    </div>
    <div class"row">
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
        <option value="New Foundland & Labrador id="province1"">New Foundland & Labrador</option>
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

 </body>
</html>
