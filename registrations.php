<?php
	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 14 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 8
		
		Modified: Nov - 15 - 2018.
		Assignment#: CPRG210 Exercises Day 9 
				(Separated header, footer, menu to different php files & include them back via include function)
				
		Summary: construct the Registration Page 
				to allow user register .
	*/
	
	include "header.php";
	
	//set value to activeTab by session variable
	$_SESSION["activeTab"] = "registrationsTab";
	
	//navigations
	include "menu.php";
	
?>

<!-- footer -->		
<?php
	include "footer.php";
?>