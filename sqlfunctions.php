<?php
	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 14 - 2018.
		Summary: implement all activities on database.
	*/
	
	// include all neccessary files
	require_once('modal/Agency.php');
	require_once('modal/Agent.php');
	require_once('modal/UserAccount.php');
	
	$dbh = null;
	
	//getDBConnection();
	
	//initialize database connection
	function getDBConnection() {
		global $dbh;
		if(!$dbh) {
			$dbh = mysqli_connect("localhost", "sa", "sa", "travelexperts");
			if(!$dbh) {
				print("Connection failed: " . mysqli_connect_errno() . "--" . mysqli_connect_error() . "<br/>");
				exit;
			}
		} else {
			//print "<br/>Connection: "; //. $dbh;
		}
		
	}

	function closeDBConnection() {
		global $dbh;
		if($dbh) {
			mysqli_close($dbh);
		}
	}
	
	function getAgenciesInfo() {
		global $dbh;
		$agencies = array();
		
		$sql = "SELECT * FROM Agencies";
		try {
			getDBConnection();
			
			$result = mysqli_query($dbh, $sql);
			
			if(!$result) {
				print("Query failed: " . mysql_errno() . "--" . mysql_error() . "<br/>");
				exit();
			}
			
			while ($values = mysqli_fetch_object($result)) {
				//print "Value: -------------------<br/>";
				//print_r($values);
				//print "Agency Object: -------------------<br/>";
				$agency = new Agency();
				$agency -> setAgency($values);
				//print_r($agency);
				//print "-------------------<br/>";
				array_push($agencies, $agency);
			}
			//print "-------------------<br/>";
			//print_r($agencies);
			return $agencies;
		} catch (Exception $e){
			print "<br/> $e";
		} finally {
			//closeDBConnection();
		}
	}
	
	function getAgentsInfo() {
		global $dbh;
		$agents = array();
		
		
		$sql = "SELECT A.*, (SELECT B.AgncyCity FROM Agencies AS B WHERE B.AgencyId=A.AgencyId) as AgencyName
FROM agents AS A";

		try {
			getDBConnection();
			
			$result = mysqli_query($dbh, $sql);
			
			if(!$result) {
				print("Query failed: " . mysql_errno() . "--" . mysql_error() . "<br/>");
				exit();
			}
			
			while ($values = mysqli_fetch_object($result)) {
				//print "Value: -------------------<br/>";
				//print_r($values);
				//print "Agency Object: -------------------<br/>";
				$agent = new Agent();
				$agent -> setAgent($values);
				
				//print_r($agent);
				//print "-------------------<br/>";
				array_push($agents, $agent);
			}
			//print "-------------------<br/>";
			//print_r($agents);
			return $agents;
		} catch (Exception $e){
			print "<br/> $e";
		} finally {
			//closeDBConnection();
		}
	}
	
	function getUserAccountInfo($userName) {
	
		global $dbh;
		$accounts = array();
		
		$sql = "SELECT userName, password, roleId FROM Agents WHERE userName = ?";
		try {
			getDBConnection();
			
			$stmt = mysqli_prepare($dbh, $sql);

			mysqli_stmt_bind_param($stmt, "ssss", $userName);
			
			$result = mysqli_stmt_execute($stmt);
			
			if(!$result) {
				print("Query failed: " . mysql_errno() . "--" . mysql_error() . "<br/>");
				exit();
			}
			
			while ($values = mysqli_fetch_object($result)) {
				$userAccount = new UserAccount();
				$userAccount -> setUserAccount($value);
				array_push($accounts, $userAccount);
			}

			return $accounts;
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
			   false - some error may happen.
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
				return;
			}

			//print("<br/> \$data");
			//print_r($data);
			$values = $data -> getValues();
			
			$cols = implode(',', $data -> getColumnsName());
			
			foreach ($values as $value) {
				isset($vals) ? $vals .= ',' : $vals = '';
				print "<br/> $vals";
				$vals .= '\''. mysqli_real_escape_string($dbh, $value).'\'';
			}
			
			$result = mysqli_real_query($dbh, 'INSERT INTO '.$table.' ('.$cols.') VALUES ('.$vals.')');
			if(!$result) {
				//mysql_
				print "Cannot insert data to Database.";
				return false;
			}
			
			return true;
		} catch (Exception $e){
			print "<br/> $e";
		} finally {
			closeDBConnection();
		}
		//return mysqli_real_query($dbh, 'INSERT INTO '.$table.' ('.$cols.') VALUES ('.$vals.')');
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