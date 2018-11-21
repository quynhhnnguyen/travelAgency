<?php
	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 15 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 9
	*/
	
	require_once('variables.php');
	
	function displayWelcomeWordsByTime() {
			date_default_timezone_set("America/Edmonton");
			
			$currentD = date_create("2013-05-01");
			date_time_set($currentD,12,0,0);
			
			//echo date_format($currentD,"Y-m-d H:i:s");
			
			$hour = date("h");
			$am_pm = date("a");
			
			//print "<br/>" . $hour;
			//print "<br/>" . $am_pm;
			
			if($am_pm == "am" && $hour >= 0 && $hour <=11) { // morning
				print "<h1>Good Morning!!!</h1>";
			} elseif ($am_pm == "pm" && (($hour >= 1 && $hour <=5) || $hour==12)) { //afternoon
				print "<h1>Good Afternoon!!!</h1>";
			} elseif ($am_pm == "pm" && ($hour >= 6 && $hour <=9)) { //evening
				print "<h1>Good Evening!!!</h1>";
			} else {
				print "<h1>Good Night!!!</h1>";
			}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewpoint" content="width=device-width, initial-scale=1"/>
		<!-- initial-scale: zoom -->
		<link rel="stylesheet" type="text/css" href="/study/css/css.css"></link>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<script src="/study/js/utils.js"></script>
		
		<title>Happy Together Travel Agency</title>
		
		<script>
			var images = ["/study/img/lakelouise.jpg", "/study/img/morainelake.jpg", "/study/img/minnewanka.jpg"];
			var linkWebsites = ["https://www.banfflakelouise.com/lake-louise", "https://www.banfflakelouise.com/moraine-lake", "https://www.banfflakelouise.com/lake-minnewanka"];
			var descriptions = ["Lake Louise is world famous for its turquoise lakes, the Victoria Glacier, soaring mountain backdrop, palatial hotel, and incredible hiking and skiing. Surrounded by a lifetime’s worth of jaw-dropping sights and adventures, Lake Louise is a rare place that must be experienced to be believed.",
								"Its waters are the most amazing colour, a vivid shade of turquoise that changes in intensity through the summer as the glaciers melt. Set in the rugged Valley of the Ten Peaks, Moraine Lake is surrounded by mountains, waterfalls, and rock piles, creating a scene so stunning it almost seems unreal. Sit lakeside and absorb the sights and pure mountain air, or explore further by canoeing and hiking. It’s an iconically jaw-dropping place that is sure to leave a lasting impression.",
								"The early morning light casts a soft glow on the dark water. Across the lake, the mountains stand stark and impressive against the sky. A lone deer is drinking at the shoreline, and you can hear the faint tapping of a woodpecker somewhere in the woods. A shuffling noise behind alerts you to a herd of majestic bighorn sheep watching you inquisitively. Nature is coming alive around you and you’re happy you woke early to experience it. This is what you came to the Canadian Rockies for."];
								
			//var timer = setTimeout("code to run", 60000);
			//clearTimeout(timer);
			var popupWin = null;
			var timer = null;
			
			function loadImagesAndDescriptionsToTable() {

				if(doExist("imageTable")) {
							
					var table = document.getElementById("imageTable");
					var imagesLength = images.length;
					var link = "";
					
					for(i=0; i<imagesLength; i++) {
						var row = table.createTBody();
						
						row.innerHTML += "<tr onclick=\"openWindow('" + linkWebsites[i] + "');\">" +
													"<td><img class=\"rounded-circle travelimage\" src=\"" + images[i] + "\"/></td>" +
													"<td>" + descriptions[i] + "</td>" +
												"</tr>";
						table.appendChild(row);
					}
				} else {
					//no need to load images & descriptions.
				}
			}
			
			function openWindow(url) {
				//debugger;
				popupWin = window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=30%,left=50%,width=400,height=400");

				if(popupWin!=null) {
					//wait for pop up window loaded completely
					//debugger;
					setTimeout(startTimer,2000);
				}
			}
			
			function startTimer() {
				timer = setTimeout(closeWindow, 6000);
			}
			
			function closeWindow() {
				clearTimeout(timer);
				popupWin.close();
			}
			
			function moveItem() {
				pos +=5;
				document.getElementById("movingContainer").style.left = pos + "px";
			}
			
			
			function loadDestinationsToTable() {

				if(doExist("imageTable1")) {
				
					var table = document.getElementById("imageTable1");
					var imagesLength = images.length;
					
					for(i=0; i<imagesLength; i++) {
						var row = table.createTBody();
						row.innerHTML += "<tr>" +
												"<td data-toggle=\"popover\" data-trigger=\"hover\" html=\"true\" data-content=\""
												+ "<img class='rounded-circle travelimage' src='" + images[i] + "'/>" + "\"" + ">" + descriptions[i] + "</td>" +
												"</tr>";							
						table.appendChild(row);
					}
				} else {
					//no need to load images & descriptions.
				}
			}
			
			$(document).ready(function(){
				$('[data-toggle="popover"]').popover();   
			});
			
			//setInterval(doItemMovement, 100);
		</script>

	</head>
	
	<body class="background col-sm-12" onload="loadImagesAndDescriptionsToTable(); setInterval(doItemMovement, 100)">
		<!-- pre: keep the format as our decoration in File such as text in multi-lines - we don't need to add tag br -->
		<div id="headercontainer" class="headercontainer">
			<!--div id="logo" class="logoresize"><img src="/study/img/plane.jpg" alt="Happy Together Travel Agency"/></div-->
			<!--div id="logo" class="logoresize"><img src="/study/img/graphics-planes-picgifscom.gif" alt="Happy Together Travel Agency"/></div-->
			<div id="movingItem" class="welcomesentence"><h1><?php displayWelcomeWordsByTime(); ?></h1></div>
		</div>
		<!--div id="movingContainer" class="movingContainer">
			<img src="/study/img/graphics-planes-picgifscom.gif" alt="Happy Together Travel Agency" id="movingItem"/>
		</div-->
		<hr/>
		<main>
			<section >
				<div id="contentcontainer" class="col-sm-12 table-responsive"> 
					<div><h3>Travel Packages</h3></div>
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
			</section>
			
			<hr/>
			<!--section >
				<div id="contentcontainer1" class="col-sm-8 table-responsive"> 
					<table class="table table-dark table-hover imageTableStyle" id="imageTable1">
						<thead>
						  <tr>
							<th >Destination</th>
						  </tr>
						</thead>
						<tbody-->
							<!-- waiting for loading -->

						<!--/tbody>
					</table>
					
				</div>
			</section-->
			
			<hr/>
			<section>
				<div id="navigatorcontainer"> 
					<div id="contact"><a href="/contact.html"><img src="/study/img/contacticon.jpg"/></a></div>
					<div id="register"><a href="/register.html"><img src="/study/img/registericon.jpg"/></a></div>
				</div>
			</section>
			
		</main>
		
		<hr/>
		<div class="copyright">This page copyrighted &copy; by Happy Together Travel Agency</div>
	</body>
</html>
