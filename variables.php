<?php
	/*
		Author: Quynh Nguyen (Queenie)
		Date created: Nov - 15 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 9
	*/
	
	

	$images = ["/study/img/lakelouise.jpg", "/study/img/morainelake.jpg", "/study/img/minnewanka.jpg"];
	
	$roles = array("Admin" => "0", "End-User" => "1");
	
	$agentPosColors = array("Senior Agent" => "gold", "Intermediate Agent" => "silver", "Junior Agent" => "lightyellow");
	$agentImgByPos = array("Senior Agent" => "gold_crown.png", "Intermediate Agent" => "silver_crown.png", 
							"Junior Agent" => "copper_crown.png");
	
	$aAdminTabs = array("agentEntryTab");
	$aTabs = array();
	$tab1 = array("tabId" => "homeTab", "tabName" => "Home", "tabURL" => "mainPage.php");
	$tab2 = array("tabId" => "travelPackagesTab", "tabName" => "Travel Packages", "tabURL" => "travelPackages.php");
	$tab3 = array("tabId" => "registerTab", "tabName" => "Registration", "tabURL" => "register.php");
	$tab4 = array("tabId" => "agentEntryTab", "tabName" => "Agent Entry", "tabURL" => "agentEntry.php");
	$tab5 = array("tabId" => "contactTab", "tabName" => "Contact Us", "tabURL" => "contact.php");
	array_push($aTabs, $tab1, $tab2, $tab3, $tab4, $tab5);
	
	$pkgImgByPos
	 = array("Caribbean New Year" => "cb1.jpg", "Polynesian Paradise" => "pp.jpg", 
							"Asian Expedition" => "ae.jpg","European Vacation" => "eu.jpg");

?>