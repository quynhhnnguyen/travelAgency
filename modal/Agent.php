<?php
	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 18 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 13
		Summary: implement object Agent.
	*/
	
	// include all neccessary files
	require_once('modal/DatabaseObject.php');
	
	class Agent extends DatabaseObject {	
	
		private $AgentId = "";
		public $AgtFirstName = "";
		public $AgtMiddleInitial = "";
		public $AgtLastName = "";
		public $AgtBusPhone = "";
		public $AgtEmail = "";
		public $AgtPosition = "";
		public $AgencyId = "";
		private $AgencyName = "";
			
		function Agent() {
			$this -> AgentId = "";
			$this -> AgtFirstName = "";
			$this -> AgtMiddleInitial = "";
			$this -> AgtLastName = "";
			$this -> AgtBusPhone = "";
			$this -> AgtEmail = "";
			$this -> AgtPosition = "";
			$this -> AgencyId = "";
			$this -> AgencyName = "";
		}
		
		function setAgent($agent) {
			$this -> AgentId = $agent -> AgentId;
			$this -> AgtFirstName = $agent -> AgtFirstName;
			$this -> AgtMiddleInitial = $agent -> AgtMiddleInitial;
			$this -> AgtLastName = $agent -> AgtLastName;
			$this -> AgtBusPhone = $agent -> AgtBusPhone;
			$this -> AgtEmail = $agent -> AgtEmail;
			$this -> AgtPosition = $agent -> AgtPosition;
			$this -> AgencyId = $agent -> AgencyId;
			$this -> AgencyName = $agent -> AgencyName;
		}
		
		function setAgentFromArray($agent) {
			$this -> AgentId = $agent['AgentId'];
			$this -> AgtFirstName = $agent['AgtFirstName'];
			$this -> AgtMiddleInitial = $agent['AgtMiddleInitial'];
			$this -> AgtLastName = $agent['AgtLastName'];
			$this -> AgtBusPhone = $agent['AgtBusPhone'];
			$this -> AgtEmail = $agent['AgtEmail'];
			$this -> AgtPosition = $agent['AgtPosition'];
			$this -> AgencyId = $agent['AgencyId'];
			$this -> AgencyName = $agent['AgencyName'];
		}

		function getDummyData() {
			//$this -> AgentId; -- generate automatically in database
			$this -> AgtFirstName = "Dum";
			$this -> AgtMiddleInitial = "";
			$this -> AgtLastName = "My";
			$this -> AgtBusPhone = "123456789";
			$this -> AgtEmail = "dummy@dummy.ca";
			$this -> AgtPosition = "Dummy";
			$this -> AgencyId = "1";

			return $this;
		}
		
		function getAgencyName() {
			return $this -> AgencyName;
		}
		
		function getAgenId() {
			return $this -> AgentId;
		}
		
		function toString() {
			return $this -> AgtFirstName . ", " . $this -> AgtLastName;
		}
	}
?>