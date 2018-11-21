<?php

	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 14 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 8
				
		Modified: Nov - 15 - 2018.
		Assignment#: CPRG210 Exercises Day 9 
				(Separated header, footer, menu to different php files & include them back via include function)
				
		Summary: construct the Travel Packages Page 
				to provide Travel Package Information.
	*/
	include "header.php";
	
	//set value to activeTab by session variable
	$_SESSION["activeTab"] = "travelPackagesTab";
	
	
	//navigations
	include "menu.php";
	
	date_default_timezone_set("America/Edmonton");
	$hour = date("h");
	$am_pm = date("a");
	
	if($am_pm == "am" && ($hour >= 0 && $hour <12)) { // morning
		print "<h1>Good Morning!!!</h1>";
	} elseif ($am_pm == "pm" && (($hour >= 1 && $hour <=5) || $hour==12)) { //afternoon
		print "<h1>Good Afternoon!!!</h1>";
	} elseif ($am_pm == "pm" && ($hour >= 6 && $hour <=9)) { //evening
		print "<h1>Good Evening!!!</h1>";
	} else {
		print "<h1>Good Night!!!</h1>";
	}
?>
<div id="contentcontainer" class="col-sm-12 table-responsive"> 
					<table class="table table-dark table-hover imageTableStyle" id="imageTable">
						<thead>
						  <tr>
							<th >Image</th>
							<th>Description</th>
						  </tr>
						</thead>
						<tbody>
							<!-- waiting for loading -->

						</tbody>
					</table>
					
				</div>
				
<div><a href="/mainPage.html">Back to Home Page</a></div>
<!-- footer -->		
<?php
	include "footer.php";
?>
