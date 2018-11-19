<?php

	require_once('variables.php');

	$action = $_POST['action'];
	print_r($_POST);
	switch ($action) {
		case "sendquestion":
			alert("received");
			sendCustomerQuestion();
			break;
	}
	
	function sendEmail($from, $to, $subject, $message) {
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= "From: $from \r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";
		//$to = "quynh1020917@gmail.com";
		
		


		mail($to, $subject, $message, $headers);
	}
	
	function sendCustomerQuestion() {
		
		$to = "quynh1020917@gmail.com";
		$subject = "Customer Question!";
		
		
		$keys = array("email" => "", "name" => "", "question" => "");
		
		getDataForm($keys);
		
		$from = $keys['email']; 
		$message = "Customer Name: " . $keys['name'] . "<br/>"
					. "Question: " . $keys['question'];
		sendEmail($from, $to, $subject, $message);
		
	}
	
	/*
		This function receive associative array of keys.
		Return  array of values which were submmited via Form Submit method
	*/
	function getDataForm($aarray) {
		
		//$values;
		
		foreach (array_keys($aarray) as $key) {
			//if ($_GET)
			if ($_SERVER["REQUEST_METHOD"] == "GET") {
				$aarray[$key] = $_GET[$key];
				//array_push($values,  $_GET[$key]);				
			} else if (isset($_POST)) {
				$aarray[$key] = $_POST[$key];
				//array_push($values,  $_POST[$key]);		
			} else {
				$aarray[$key] = $_REQUEST[$key];
				//array_push($values,  $_REQUEST[$key]);
			}
		}
		
		//return values;
		return $aarray;
	}
	
	function authentication() {
	
	
		$inputValue = array("userName" => "", "password" => "");
		$inputValue = getDataForm($inputValue);
	
		$accountDB = getUserAccountInfo($inputValue['userName']);
	
		$encryptPassword = 
	
		//encryption
		/* md5(String password);*/
		if (password_verify ($inputValue['password'] , $accountDB -> password) {
			switch($accountDB -> roleId) {
				case roles['Admin']: //redirect to Agent Entry Page (Home Page & active Agent Entry link)
					break;
				case roles['End-User']: //redirect to Home Page & active the profile link
					break;
			}

			
		} 
		
		//decryption
		/*$password = 'examplepassword';
		$crypted = password_hash($password, PASSWORD_DEFAULT);*/
		
		//authentication false, stay at this page & notify to user.

	}
?>