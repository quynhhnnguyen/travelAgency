<?php
	/*
		Author: Quynh Nguyen (Queenie)
		Date created: Nov - 19 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 10
		Summary: implement common functions.
	*/
	session_cache_expire(30);
	session_start();
	
	require_once('variables.php');
	require_once('modal/Agent.php');
	require_once('sqlfunctions.php');
	require_once('modal/Packages.php');
	
	$nextPage = isset($_SESSION['nextPage']) ? $_SESSION['nextPage'] : null;

	$action = isset($_POST['action'])?$_POST['action']:
			(isset($_POST['action1'])?$_POST['action1']:
			(isset($_POST['actionTab'])?$_POST['actionTab']:$_SESSION['action']));
	//print_r($_POST);

	switch ($action) {
		case "sendQuestion":
			redirectPage("contact.php", "Thank you for sending us the question. We will answer as soon as possible.");
			sendCustomerQuestion();
			//redirectPage("contact.php", "Thank you for sending us the question. We will answer as soon as possible.");
			break;
		case "addNewAgent":
			addNewAgent();
			break;
		case "signup":
			redirectPage("register.php", "");
			break;
		case "authentication":
			authentication();
			break;
		case "logout":
			$_SESSION["logged-in"] = false;
			print "log out";
			redirectPage("mainpage.php", "");
			break;
		case "login":
			//if user already logged into system, redirect to nextPage directly instead of login page.
			redirectPage("login.php", "");
			break;
		case "tabClicked":
			redirectPage($_POST["tabURL"], "");
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

		if(isset($aValues['AgtFirstName'])) {
			if(addNewAgentToDB($values)) {
				$message = "New Agent was added successfully";
			} else {
				$message = "Cannot add New Agent right now. Please try again.";
			}
			
		} else {
			$message = "Invalid Information.Please check the information again.";
		}
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
		
		if(!is_array($aarray)) { //try to  transform to array
				$aarray = get_object_vars($aarray);
		} else {
			print "<br/> don't need to convert object to array: ";
		}
			
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

		/**should try catch unexpected exception may happen */
		return $aarray;
	}
	
	/* 
		Validation and Authentication Login information 
	*/
	function authentication() {
	
		global $roles;
		global $nextPage;
		
		$logInInfo = array("userName" => "", "password" => "");
		$inputValues = getDataForm($logInInfo);
	
		print_r($inputValues);
		// validate login information
		if(!isset($inputValues['userName'])) {
			redirectPage("login.php", "User Name and Password are required.");
		}
		
		// authenticate	
		$accountDB = getUserAccountInfo($inputValues['userName']);
		$encryptPassword = "";
		print "<br/> Acount Info: ";
		print_r($accountDB);

		print $accountDB -> password;
		if($accountDB==null) {
			redirectPage("login.php", "Your account does not exist.");
		}
		
		//encryption
		/* md5(String password);*/
		/*password_verify($inputValues['password'] , $accountDB -> password)*/
		if ($inputValues['password'] == $accountDB -> password) {
			$_SESSION["message"] .=  $accountDB -> roleId;
			switch($accountDB -> roleId) {
				case $roles['Admin']: //redirect to Agent Entry Page (Home Page & active Agent Entry link)
					$_SESSION['logged-in'] = true;
					//if(!$nextPage) {
						//redirectPage($nextPage, "");
					//} else {
						redirectPage("agententry.php", "");
					//}
					break;
				case $roles['End-User']: //redirect to Home Page & active the profile link
					break;
			}

			
		} else {
			redirectPage("login.php", "Password is incorrect.");
		}
		
		//decryption
		/*$password = 'examplepassword';
		$crypted = password_hash($password, PASSWORD_DEFAULT);*/

	}
?>