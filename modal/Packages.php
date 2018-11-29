<?php
	/*
		Author: Yatri Patel
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQl
		Summary: implement object Package.
	*/
	
	// include all neccessary files
	require_once('modal/DatabaseObject.php');
	
	class Package extends DatabaseObject {	
	
		// private $PackageId = "";
		// public $PkgName = "";
		// public $PkgStartDate = "";
		// public $PkgEndDate = "";
		// public $PkgDesc = "";
		// public $PkgBasePrice = "";
		// private $PkgAgencyCommission = "";
			
		// function Package() {
		// 	$this -> PackageId = "";
		// 	$this -> PkgName = "";
		// 	$this -> PkgStartDate = "";
		// 	$this -> PkgEndDate = "";
		// 	$this -> PkgDesc = "";
		// 	$this -> PkgBasePrice = "";
		// 	$this -> PkgAgencyCommission = "";
		// }
		
		function setPackage($package) {
			$this -> PkgName = $package -> PkgName;
			$this -> PkgStartDate = $package -> PkgStartDate;
			$this -> PkgEndDate = $package -> PkgEndDate;
			$this -> PkgDesc = $package -> PkgDesc;
			$this -> PkgBasePrice = $package -> PkgBasePrice;
			
		}
		
		function setPackageFromArray($package) {
			$this -> PkgName = $package['PkgName'];
			$this -> PkgStartDate = $package['PkgStartDate'];
			$this -> PkgEndDate = $package['PkgEndDate'];
			$this -> PkgDesc = $package['PkgDesc'];
			$this -> PkgBasePrice = $package['PkgBasePrice'];
			
			
		}

		
		
		// function toString() {
		// 	return $this -> PkgName;
		// }
	}
?>