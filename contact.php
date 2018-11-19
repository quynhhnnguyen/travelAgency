<?php
	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 14 - 2018.
		Summary: construct the Contact Page 
				to provide information about Agencies and Agents.
	*/
	
	// header
	include "header.php";
	
	//set value to activeTab by session variable
	$_SESSION["activeTab"] = "contactTab";
	
	//navigations
	include "menu.php";
?>	

<div id="halfTopBody">


<div class="container-fluid text-center">
	<!-- input question form -->
	<div class="contentPaddingDiv col-sm-7 slideanim slide">
		<form method="post" id="customerQuestion">
				<div>
				<p id="tipThank" style="display:none">Thank you for sending us the question. We will answer as soon as possible.</p>

					<div class="halfTopBodyDiv">
						<br/>
						<br/>
						<br/>
						<h1><b>How Can We Help You?</b></h1>
						<h2><b>We're eager to answer your questions</b></h2>
						<br/>
						<br/>
					</div>
					<input type="hidden" id="action" name="action" value="sendquestion"></input>
					<div id="table1">				
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" class="form-control" id="name" name="name" required="required" 
									placeholder="Your Name">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input type="email" class="form-control" id="email" name="email" required="required"
									placeholder="Email">
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
							<textarea class="form-control" id="question" name="question" required="required"
									rows="3" placeholder="How Can We Help You?"></textarea>
						</div>
						<div class="input-group" style="padding-top:5px">
							<input type="submit" class="btn btn-primary" value="Send To Us" id="submit"/>							
						</div>			
					</div>
				</div>

			</form>
	</div>
	<br/>
<?php	
	
	
	// get list of agency from database
	$agencies = getAgenciesInfo();
	
	// get list of agent from database
	$agents = getAgentsInfo();

	// generate Agencies information
	print "<div id=\"agenciesDiv\" align=\"center\" class=\"contentPaddingDiv col-sm-5\">";
	print "<div class='agenciesDiv'>";
	foreach ($agencies as $agency) {
		print "<address>";
		print "<h3>" . $agency -> AgncyCity . "</h3>";
		print "<span><i class=\"glyphicon glyphicon-map-marker\"></i></span> ";		
		print $agency -> AgncyAddress . ", " . $agency -> AgncyCity . ", " . $agency -> AgncyProv . ", " . $agency -> AgncyCountry . "<br/>";
		print "<span><i class=\"glyphicon glyphicon-phone\"></i></span>";
		print " " .  $agency -> AgncyPhone . "<br/>";
		print "<span><i class=\"glyphicon glyphicon-print\"></i></span> ";		
		print "  " .  $agency -> AgncyFax . "<br/>";
		print "Toll-Free	<br/>";
		print "Monday	9:30 AM - 7:00 PM<br/>";
		print "Tuesday	9:30 AM - 7:00 PM<br/>";
		print "Wednesday	9:30 AM - 7:00 PM<br/>";
		print "Thursday	9:30 AM - 7:00 PM<br/>";
		print "Friday	10:00 AM - 6:00 PM<br/>";
		print "Saturday	11:00 AM - 5:00 PM<br/>";
		print "Sunday	11:00 AM - 5:00 PM<br/>";
		print "</address>";
	}
	print "</div>";
	print "</div>";

print "</div>";

	//generate Agents information
	print "<div id=\"agentsdiv\" class=\"col-sm-12 contentPaddingDiv\">";
	print "<div align='left'>";
	print "    <h1><b>Our Agents</b></h1>";
	print "</div>";
	print "<div class='agentsDiv'>";
	foreach ($agents as $agent) {
		print "<div class=\"col-sm-4 well well-lg agentWell\">";
		print "			<div id=\"agentimg\">";
		print "				<img class=\"agentImg\" src=\"/study/img/tracyphan.jpg\"/>";
		print "			</div>";
		print "			<div id=\"agentinfo\">";
		print "				<b>" . $agent -> AgtPosition. "</b><br/> " . $agent -> AgtFirstName . " " . $agent -> AgtMiddleInitial . " " . $agent -> AgtLastName . "<br/>";
		print "				<span><i class=\"glyphicon glyphicon-phone\"></i></span>";
		print "				" . $agent -> AgtBusPhone . "<br/>";	
		print "				<a href=\"mailto:" . $agent -> AgtEmail . "\">";
		print "					<span><i class=\"glyphicon glyphicon-envelope\"></i></span></a><br/>";
		print "				<span><i class=\"glyphicon glyphicon-map-marker\"></i></span> ". $agent -> getAgencyName() ;
		print "			</div>";
		print "</div>";
	}
	print "</div>";
	print "</div>";
				
	//print "<div><a href=\"/mainPage.php\">Back to Home Page</a></div>";
	//testInsertFunction();
?>
</div>
<script>
	//sending email without redirecting page
	$('#customerQuestion').submit(function() {		
		var post_data = $('#customerQuestion').serialize();
		document.getElementById('tipThank').style.display = "";
		$.post('functions.php', post_data, function(data) {
			document.getElementById('tipThank').style.display = "";
			alert("Thank you for sending us the question. We will answer as soon as possible.");
			//$('#tipThank').show();
		});
	});
</script>
<!-- footer -->
<?php
	include "footer.php";
?>
