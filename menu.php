<?php
	/*
		Author: Quynh Nguyen (Queenie)
		Date created: Nov - 15 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 9
		Summary: implement main menu (navigations).
			Home
			Travel Packages
			Registrations
			Contact Us
	*/
?>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="mainPage.php">
						<!--img src="/img/logo.png" class="logoImage"/-->
						<b>Dream Land Travel Agency</b>
					</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<?php
							//print $_SESSION["activeTab"]; 
							//Home
							if ($_SESSION["activeTab"]=="homeTab" || $_SESSION["activeTab"]=="") {
								$_SESSION["activeTab"] = "homeTab";
								print "<li class=\"active\"><a href=\"mainPage.php\">HOME</a></li>";
							} else {
								print "<li><a href=\"mainPage.php\">HOME</a></li>";
							}
							
							//travel packages
							if ($_SESSION["activeTab"]=="travelPackagesTab") {
								$_SESSION["activeTab"] = "travelPackagesTab";
								print "<li class=\"active\"><a href=\"travelPackages.php\">Travel Packages</a></li>";
							} else {
								print "<li><a href=\"travelPackages.php\">Travel Packages</a></li>";
							}
							
							//registrations
							if ($_SESSION["activeTab"]=="registerTab") {
								$_SESSION["activeTab"] = "registerTab";
								print "<li class=\"active\"><a href=\"register.php\">Registrations</a></li>";
							} else {
								print "<li><a href=\"register.php\">Registrations</a></li>";
							}
							
							//contact
							if ($_SESSION["activeTab"]=="contactTab") {
								$_SESSION["activeTab"] = "contactTab";
								print "<li class=\"active\"><a href=\"contact.php\">Contact Us</a></li>";
							} else {
								print "<li><a href=\"contact.php\">Contact Us</a></li>";
							}
						?>
						
					</ul>
				</div>
			</div>
		</nav>
		
		