<?php
	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 14 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 8
		
		Modified: Nov - 14 - 2018.
		Assignment#: CPRG210 Exercises Day 9
	*/
	
	require_once('variables.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<Title>PHP Exercise - Day 8</Title>
	</head>
	
	<body>
		<?php
			/* Exercise - Day 8*/
			//variable declaration
			$links = array("exercised8/page1.php", "exercised8/page2.php", "exercised8/page3.php", 
				"exercised8/page4.php", "exercised8/page5.php", "exercised8/page6.php");
			$linkNames = array("page1.php", "page2.php", "page3.php", 
				"page4.php", "page5.php", "page6.php");
			
			//coding
			print "<a href='index.php'>index.php</a><br/>";
			print "<a href='register.php'>register.php</a><br/>";
			print "<a href='contact.php'>contact.php</a><br/>";
			
			print "<table border='1px'>";
			print "<tr><td>#</td><td>Link</td></tr>";
			for ($i=0; $i<count($links); $i++) {
				$index = $i + 1;
				print "<tr>";
				print "<td> $index </td><td><a href='$links[$i]'>$linkNames[$i]</a></td>";
				print "</tr>";
			}
			print "</table>";
			
			print "<br/><br/>";
			
			/* Exercise - Day 9*/
			$index = 0;
			print "<table border='1px'>";
			print "<tr><td>#</td><td>Travel Package Description</td></tr>";
			foreach($travelPkgs as $travelPkg) {
				$index += 1;
				print "<tr>";
				print "<td> $index </td><td><a href='" .$travelPkg['URL'] . "'>" . $travelPkg['Description'] . "</a></td>";
				print "</tr>";
			}
			print "</table>";
			
			$times = localtime(time(), true);
			print_r($times);
			print "<br/>";
			print time();
			print "<br/>" .mktime();
			print "<br/>" .mktime(2,30,0,11,14,2019);
			print "<br/>" . date("h");
			print "<br/>" . date("a");
			print "<br/>" . date("D d-m-Y h:i:sa");
			print "<br/>" . date_default_timezone_get();
			print "<br/>" . date_default_timezone_set("America/Edmonton");
			print "<br/>" . date_default_timezone_get();
			print "<br/>" . date("D d-m-Y h:i:sa");
			print "<br/>" . date("h");
			print "<br/>" . date("a");
			 
			date_default_timezone_set("America/Edmonton");
			
			$currentD = date_create("2013-05-01");
			date_time_set($currentD,12,0,0);
			
			echo date_format($currentD,"Y-m-d H:i:s");
			
			$hour = date("h");
			$am_pm = date("a");
			
			print "<br/>" . $hour;
			print "<br/>" . $am_pm;
			
			if($am_pm == "am" && $hour >= 0 && $hour <=11) { // morning
				print "<h1>Good Morning!!!</h1>";
			} elseif ($am_pm == "pm" && (($hour >= 1 && $hour <=5) || $hour==12)) { //afternoon
				print "<h1>Good Afternoon!!!</h1>";
			} elseif ($am_pm == "pm" && ($hour >= 6 && $hour <=9)) { //evening
				print "<h1>Good Evening!!!</h1>";
			} else {
				print "<h1>Good Night!!!</h1>";
			}
			
		//include 'contact.php';
		?>
	</body>
</html>