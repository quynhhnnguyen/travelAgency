<?php
	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 18 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 13
		Summary: implement object DatabaseObject.
	*/
	
	class DatabaseObject {
		function getColumnsName() {
			return array_keys($this -> toArray()/*get_object_vars($this)*/);
		}
		
		function getValues() {
			return array_values($this -> toArray()/*get_object_vars($this)*/);
		}
		
		function toArray() {
			return get_object_vars($this);
		}
	}
?>