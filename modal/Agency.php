<?php
	/*
		Author: Quynh Nguyen (Queenie)
		Date created: Nov - 18 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 13
		Summary: implement object Agency.
	*/
	
	// include all neccessary files
	require_once('modal/DatabaseObject.php');
	
	class Agency extends DatabaseObject {

		function Agency() {
			$this -> AgencyId = "";
			$this -> AgncyAddress = "";
			$this -> AgncyCity = "";
			$this -> AgncyProv = "";
			$this -> AgncyPostal = "";
			$this -> AgncyCountry = "";
			$this -> AgncyPhone = "";
			$this -> AgncyFax = "";
		}
		
		
		function setAgency($agency) {
			$this -> AgencyId = $agency -> AgencyId;
			$this -> AgncyAddress = $agency -> AgncyAddress;
			$this -> AgncyCity = $agency -> AgncyCity;
			$this -> AgncyProv = $agency -> AgncyProv;
			$this -> AgncyPostal = $agency -> AgncyPostal;
			$this -> AgncyCountry = $agency -> AgncyCountry;
			$this -> AgncyPhone = $agency -> AgncyPhone;
			$this -> AgncyFax = $agency -> AgncyFax;
		}
	}
?>