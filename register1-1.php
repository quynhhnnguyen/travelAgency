<?php 
	session_cache_expire(30);
	session_start();
//This code submits customer register data to the database

if(isset($_REQUEST['submit'])){
//echo $_REQUEST['CustomerId'] . "<br />";
echo $_REQUEST['CustFirstName']	. "<br />";
echo $_REQUEST['CustLastName']	. "<br />";
echo $_REQUEST['CustAddress']	. "<br />";
echo $_REQUEST['CustCity']	. "<br />";
echo $_REQUEST['CustProv']	. "<br />";
echo $_REQUEST['CustPostal']	. "<br />";
echo $_REQUEST['CustCountry']	. "<br />";
echo $_REQUEST['CustHomePhone']	. "<br />";
echo $_REQUEST['CustBusPhone']	. "<br />";
echo $_REQUEST['CustEmail']	. "<br />";
echo $_REQUEST['AgentId']	. "<br />";
echo $_REQUEST['UserId']	. "<br />";
echo hash('ripemd160', $_REQUEST['UserPassword'])	. "<br />";

//$customerid=$_REQUEST['CustomerId'];
$custfirstname=$_REQUEST['CustFirstName'];
$custlastname=$_REQUEST['CustLastName'];
$custaddress=$_REQUEST['CustAddress'];
$custcity=$_REQUEST['CustCity'];
$custprov=$_REQUEST['CustProv'];
$custpostal=$_REQUEST['CustPostal'];
$custcountry=$_REQUEST['CustCountry'];
$custhomephone=$_REQUEST['CustHomePhone'];
$custbusphone=$_REQUEST['CustBusPhone'];
$custemail=$_REQUEST['CustEmail'];
$agentid=$_REQUEST['AgentId'];
$userid=$_REQUEST['UserId'];
$password=hash('ripemd160', $_REQUEST['UserPassword']); //Hash the password to the database
}



// Create connection
$mysqli = new mysqli("localhost", "sa", "sa", "travelexperts");
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 

$sql = "INSERT INTO customers(CustFirstName, CustLastName, CustAddress, CustCity, CustProv, CustPostal, CustCountry, CustHomePhone, 
CustbusPhone, CustEmail, AgentId, UserName, Password)
VALUES ('$custfirstname','$custlastname','$custaddress', '$custcity', '$custprov', '$custpostal', '$custcountry','$custhomephone', 
'$custbusphone', '$custemail', '$agentid', '$userid', '$password')";

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();

$_SESSION["message"] = "New record created successfully";
header("Location: register.php");
?>


