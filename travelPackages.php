<?php
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
