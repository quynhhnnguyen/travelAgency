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
	
	require_once('variables.php');
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
					<form id="tabsForm" action="functions.php" method="post">
						<input type="hidden" name="actionTab" id="actionTab" value="tabClicked"/>
						<input type="hidden" name="tabURL" id="tabURL"/>
						<ul class="nav navbar-nav navbar-right">
							<?php
								//print $_SESSION["activeTab"]; 
								global $aTabs;
								global $aAdminTabs;
								$tabStyle = "";
								$login = isset($_SESSION['logged-in'])?$_SESSION['logged-in']:false;
								
								foreach($aTabs as $tab) {
									//Home
									if( $_SESSION["activeTab"]=="") {
										$_SESSION["activeTab"] = "homeTab";
									} 
									
									if(!$login && in_array($tab["tabId"], $aAdminTabs)) {
										continue;
									}
									
									if ($_SESSION["activeTab"]==$tab["tabId"]) {
										$tabStyle = "class=\"active\"";
									} else {
										$tabStyle = "";
									}
									print "<li " . $tabStyle . "><a href=\"javascript: changeTab('" . 
													$tab["tabURL"] . "')\">" . $tab["tabName"] . "</a></li>";
									
								}
								
								
							?>
							
						</ul>
					</form>
				</div>
			</div>
		</nav>
	
		<script>
			function changeTab($tabURLVal) {
				document.getElementById("tabURL").value = $tabURLVal;
				//alert();
				document.getElementById("tabsForm").submit();

			}
		</script>
		