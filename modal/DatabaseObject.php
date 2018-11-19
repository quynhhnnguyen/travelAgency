<?php
	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 18 - 2018.
		Summary: implement object DatabaseObject.
	*/
	
	class DatabaseObject {
		function getColumnsName() {
			//print_r($this);
			return array_keys(get_object_vars($this));
		}
		
		function getValues() {
			//print "<br/> get values: ";
			//print_r($this);
			return array_values(get_object_vars($this));
		}
	}
?>