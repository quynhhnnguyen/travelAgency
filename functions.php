<?php
	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 19 - 2018.
		Course Module: 
		Assignment#: 
		Summary: implement common functions.
	*/
	session_cache_expire(30);
	session_start();
	
	require_once('variables.php');
	require_once('modal/Agent.php');
	require_once('sqlfunctions.php');

	$action = isset($_POST['action'])?$_POST['action']:"";
	//print_r($_POST);
	switch ($action) {
		case "sendQuestion":
			sendCustomerQuestion();
			redirectPage("contact.php", "Thank you for sending us the question. We will answer as soon as possible.");
			break;
		case "addNewAgent":
			addNewAgent();
			break;
		case "authentication":
			authentication();
			break;
	}	
	
	/*
		Send Customer's Question to Admin's inbox.
	*/
	function sendEmail($from, $to, $subject, $message) {
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= "From: $from \r\n";

		mail($to, $subject, $message, $headers);
	}
	
	/*
		Compose Email & Send Customer's Question to Admin's inbox.
	*/
	function sendCustomerQuestion() {
		
		$to = "quynh1020917@gmail.com";
		$subject = "Customer Question!";
		
		
		$keys = array("email" => "", "name" => "", "question" => "");
		
		getDataForm($keys);
		
		$from = $keys['email']; 
		$message = "Customer Name: " . $keys['name'] . "<br/>"
					. "Question: " . $keys['question'];
		
		if(sendEmail($from, $to, $subject, $message)) {
			redirectPage("contact.php", "Thank you for sending us the question. We will answer as soon as possible.");
		}		
		
	}
	
	/*
		Prepare Agent Data and Insert to database
	*/
	function addNewAgent() {
		
		$values = new Agent();
		$aValues = $values -> toArray();
		$message = "";
		
		$aValues = getDataForm($aValues);
		$values -> setAgentFromArray($aValues);
		//print "<br/>" . $aValues['AgtFirstName'];
		if(isset($aValues['AgtFirstName'])) {
			if(addNewAgentToDB($values)) {
				$message = "New Agent was added successfully";
			} else {
				$message = "Cannot add New Agent right now. Please try again.";
			}
			
		} else {
			$message = "Invalid Information.Please check the information again.";
		}
		//print $message;
		redirectPage("agententry.php", $message);
	}
	
	/*
		redirect to page with notification.
	*/
	function redirectPage($pageName, $message) {
		$_SESSION["message"] = $message;
		header("Location: $pageName");
	}
	
	/*
		This function receive associative array of keys.
		Return  array of values which were submmited via Form Submit method
	*/
	function getDataForm($aarray) {
		
		//print "<br/> original  array: ";
				//print_r($aarray);
				
		//if(!$aarray) {
			if(!is_array($aarray)) { //try to  transform to array
				$aarray = get_object_vars($aarray);
				//print "<br/> convert object to array: ";
				//print_r($aarray);
			} else {
				print "<br/> don't need to convert object to array: ";
				//print_r($aarray);
			}
			
			/*print "<br/> Keys: ";
			print_r(array_keys($aarray));*/
			$value = "";
			foreach (array_keys($aarray) as $key) {
				//if ($_GET)
				if ($_SERVER["REQUEST_METHOD"] == "GET") {
					$value = $_GET[$key];
				} else if (isset($_POST)) {
					$value = $_POST[$key];
				} else {
					$value = $_REQUEST[$key];
				}
				$aarray[$key] = $value;
			}
		//}

		/**should try catch unexpected exception may happen */
		return $aarray;
	}
	
	/* 
		Validation and Authentication Login information 
	*/
	function authentication() {
	
		global $roles;
		$logInInfo = array("userName" => "", "password" => "");
		$inputValues = getDataForm($logInInfo);
	
		print_r($inputValues);
		// validate login information
		if(!isset($inputValues['userName'])) {
			/*$_SESSION["message"] = "User Name and Password are required.";
			header("Location: login.php");*/
			redirectPage("login.php", "User Name and Password are required.");
		}
		
		// authenticate	
		$accountDB = getUserAccountInfo($inputValues['userName']);
		$encryptPassword = "";
		print "<br/> Acount Info: ";
		print_r($accountDB);

		print $accountDB -> password;
		if($accountDB==null) {
			/*$_SESSION["message"] .= "Your account does not exist." . $inputValues['userName'];
			header("Location: login.php");*/
			redirectPage("login.php", "Your account does not exist.");
		}
		
		//encryption
		/* md5(String password);*/
		if (/*password_verify($inputValues['password'] , $accountDB -> password)*/$inputValues['password'] == $accountDB -> password) {
			$_SESSION["message"] .=  $accountDB -> roleId;
			switch($accountDB -> roleId) {
				case $roles['Admin']: //redirect to Agent Entry Page (Home Page & active Agent Entry link)
					$_SESSION['logged-in'] = true;
					/*$returnPage = $_SESSION['returnpage'];
					unset($_SESSION['returnPage']);*/
					header("Location: agententry.php");
					break;
				case $roles['End-User']: //redirect to Home Page & active the profile link
					break;
			}

			
		} else {
			redirectPage("login.php", "Password is incorrect.");
			/*$_SESSION["message"] .=  "Password is incorrect." . $accountDB -> password . ", " . $accountDB -> roleId . $inputValues['password'];
			header("Location: login.php");*/
		}
		
		//$_SESSION["message"] = "ERROR!!!!." . $accountDB["userName"] . $accountDB -> password;
		//header("Location: login.php");
		//decryption
		/*$password = 'examplepassword';
		$crypted = password_hash($password, PASSWORD_DEFAULT);*/
		
		//authentication false, stay at this page & notify to user.

	}
?>