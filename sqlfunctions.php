<?php
	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 16 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 10
		Summary: implement all activities on database.
	*/
	
	// include all neccessary files
	require_once('modal/Agency.php');
	require_once('modal/Agent.php');
	require_once('modal/UserAccount.php');
	require_once('modal/Packages.php');
	$dbh = null;
	
	/* 
		initialize database connection
	*/
	function getDBConnection() {
	
		global $dbh;

		if(!$dbh) {
			$dbh = mysqli_connect("localhost", "yatri", "Y@tri1995p@tel", "travelexperts");
			if(!$dbh) {
				print("Connection failed: " . mysqli_connect_errno($dbh) . "--" . mysqli_connect_error($dbh) . "<br/>");
				exit;
			}
		} else {
			//db connection exists, do not need to create again.
		}
		
	}

	/*
		close database connection
	*/
	function closeDBConnection() {
		global $dbh;
		if($dbh) {
			/*if(mysqli_close($dbh)) {
				print "Close successfull else {";
			} else {
				print "Cannot Close successfull else {";
			}	*/
			mysqli_close($dbh);
			$dbh = null;
		}
	}
	
	/*
		Get list of Agency from database
	*/
	function getAgenciesInfo() {
		global $dbh;
		$agencies = array();
		
		$sql = "SELECT * FROM Agencies";
		try {
			getDBConnection();
			
			$result = mysqli_query($dbh, $sql);
			
			if(!$result) {
				print("Query failed: " . mysqli_errno($dbh) . "--" . mysqli_error($dbh) . "<br/>");
				exit();
			}
			
			while ($values = mysqli_fetch_object($result)) {
				$agency = new Agency();
				$agency -> setAgency($values);
				array_push($agencies, $agency);
			}

			return $agencies;
			
		} catch (Exception $e){
			print "<br/> $e";
		} finally {
			closeDBConnection();
		}
	}
	
	/*
		Get list of Agency(AgencyId, Agency-Name) from database
	*/
	function getAgencyListForDropdownCom() {
		global $dbh;
		$agencies = array();
		
		$sql = "SELECT AgentId, AgncyCity FROM Agencies";
		try {
			getDBConnection();
			
			$result = mysqli_query($dbh, $sql);
			
			if(!$result) {
				print("Query failed: " . mysqli_errno($dbh) . "--" . mysqli_error($dbh) . "<br/>");
				exit();
			}
			
			while ($values = mysqli_fetch_object($result)) {
				$agency = new Agency();
				$agency -> setAgency($values);
				array_push($agencies, $agency);
			}

			return $agencies;
			
		} catch (Exception $e){
			print "<br/> $e";
		} finally {
			closeDBConnection();
		}
	}
	
	/*
		Get list of Agent from database
	*/
	function getAgentsInfo() {
		global $dbh;
		$agents = array();
		
		
		$sql = "SELECT A.*, (SELECT B.AgncyCity FROM Agencies AS B WHERE B.AgencyId=A.AgencyId) as AgencyName
				FROM agents AS A";

		try {
			getDBConnection();
			
			$result = mysqli_query($dbh, $sql);
			
			if(!$result) {
				print("Query failed: " . mysqli_errno($dbh) . "--" . mysqli_error($dbh) . "<br/>");
				exit();
			}
			
			while ($values = mysqli_fetch_object($result)) {
				$agent = new Agent();
				$agent -> setAgent($values);
				array_push($agents, $agent);
			}

			return $agents;
			
		} catch (Exception $e){
			print "<br/> $e";
		} finally {
			closeDBConnection();
		}
	}
	
	function getPackagesInfo() {
		global $dbh;
		$packages = array();
		
		
		$sql = "SELECT PkgName, PkgStartDate, PkgEndDate, PkgDesc, PkgBasePrice FROM packages";

		try {
			getDBConnection();
			
			$result = mysqli_query($dbh, $sql);
			
			if(!$result) {
				print("Query failed: " . mysqli_errno($dbh) . "--" . mysqli_error($dbh) . "<br/>");
				exit();
			}
			
			while ($values = mysqli_fetch_object($result)) {
				$package = new Package();
				$package -> setPackage($values);
				array_push($packages, $package);
			}

			return $packages;
			
		} catch (Exception $e){
			print "<br/> $e";
		} finally {
			closeDBConnection();
		}
	}
	
	/*
		Get User Information via inputted User Name.
		Return UserAccount object.		
	*/
	function getUserAccountInfo($userName) {
	
		global $dbh;
		$userAccount = new UserAccount();

		
		$sql = "SELECT userName, password, roleId FROM agents WHERE userName = '" . $userName . "'";
		try {
			getDBConnection();
			
			/*$stmt = mysqli_prepare($dbh, $sql);

			mysqli_stmt_bind_param($stmt, "s", $userName);*/
			
			$result = mysqli_query($dbh, $sql);
			
			if(!$result) {
				print("Query failed: " . mysqli_errno($dbh) . "--" . mysqli_error($dbh) . "<br/>");
				exit();
			}
			
			/*$_SESSION["message"] .= print_r($stmt);
			$result = mysqli_stmt_execute($stmt);*/
			
			while ($values = mysqli_fetch_object($result)) {
				$userAccount -> setUserAccount($values);
				break;
			}
			
			print_r($userAccount);

			if($userAccount -> userName == "") {
				return null;
			}
			return $userAccount;
		} catch (Exception $e){
			print "<br/> $e";
		} finally {
			closeDBConnection();
		}
	}
	
	/*
		General function to insert data to database.
		$table: Table Name
		$data: object variable contains array of <Key, Value> 
				which Key is Column Name in database.
				      Value is the value to insert to database.
		return true - insert data successful.
			   false - some errors may happen.
	*/
	function insertDatatoBD($table, $data) {
		global $dbh;
		
		try {
			getDBConnection();
			
			if($data == null) {
				print("Data failed: The insertion data is null <br/>");
				return false;
			}
			
			if($table == null) {
				print("Data failed: Missing table Name <br/>");
				return false;
			}

			$values = $data -> getValues();
			
			$cols = implode(',', $data -> getColumnsName());
			
			foreach ($values as $value) {
				isset($vals) ? $vals .= ',' : $vals = '';
				print "<br/> $vals";
				$vals .= '\''. mysqli_real_escape_string($dbh, $value).'\'';
			}
			
			$result = mysqli_real_query($dbh, 'INSERT INTO '.$table.' ('.$cols.') VALUES ('.$vals.')');
			if(!$result) {
				print("Query failed: " . mysqli_errno($dbh) . "--" . mysqli_error($dbh) . "<br/>");
				exit();
			}
			
			return true;
		} catch (Exception $e){
			print "<br/> $e";
		} finally {
			closeDBConnection();
		}

	}
	
	/*
		Add New Agent
	*/
	function addNewAgentToDB($data) {
		print "<br/>\$data: ";
		print_r($data);
		return insertDatatoBD("agents", $data) ;
	}
	
	/*
		TESTING AREA.
	*/
	function testInsertFunction() {
	
		$data = new Agent();
		
		print_r($data);

		insertDatatoBD("agents", $data -> getDummyData()) ;
	}
?>