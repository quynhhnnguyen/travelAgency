<?php
	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 19 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 12
		Summary: implement object UserAccount 
			for authentication use.
	*/
	
	// include all neccessary files
	require_once('modal/DatabaseObject.php');
	
	class UserAccount extends DatabaseObject {
		public $userName = "";
		public $password = "";
		public $roleId = 0;
		
		function setUserAccount($account) {
			$this -> userName = $account -> userName;
			$this -> password = $account -> password;
			$this -> roleId = $account -> roleId;
		}
		
		function setUserAccountFromArray($account) {
			$this -> userName = $account['userName'];
			$this -> password = $account['password'];
			$this -> roleId = $account['roleId'];
		}
	}
	
?>