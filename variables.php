<?php
	/*
		Author: Quynh Nguyen (queeniehnnguyen)
		Date created: Nov - 15 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 9
	*/
	
	
	$travelPkgs = array();
							
	$travelPkg1	= array("URL" => "https://www.banfflakelouise.com/lake-louise",
						"Description" => "Lake Louise is world famous for its turquoise lakes, the Victoria Glacier, 
												soaring mountain backdrop, palatial hotel, and incredible hiking and skiing. 
												Surrounded by a lifetime’s worth of jaw-dropping sights and adventures, 
												Lake Louise is a rare place that must be experienced to be believed.");	
	
	$travelPkg2	= array("URL" => "https://www.banfflakelouise.com/moraine-lake",
							  "Description" => "Its waters are the most amazing colour, a vivid shade of turquoise that changes 
												in intensity through the summer as the glaciers melt. Set in the rugged Valley of 
												the Ten Peaks, Moraine Lake is surrounded by mountains, waterfalls, and rock piles, 
												creating a scene so stunning it almost seems unreal. Sit lakeside and absorb the sights 
												and pure mountain air, or explore further by canoeing and hiking. 
												It’s an iconically jaw-dropping place that is sure to leave a lasting impression.");
	
	$travelPkg3	= array("URL" => "https://www.banfflakelouise.com/lake-minnewanka",
							  "Description" => "The early morning light casts a soft glow on the dark water. Across the lake, 
												the mountains stand stark and impressive against the sky. 
												A lone deer is drinking at the shoreline, and you can hear the faint tapping of 
												a woodpecker somewhere in the woods. A shuffling noise behind alerts you to 
												a herd of majestic bighorn sheep watching you inquisitively. 
												Nature is coming alive around you and you’re happy you woke early to experience it. 
												This is what you came to the Canadian Rockies for.");
	
	array_push($travelPkgs, $travelPkg1, $travelPkg2, $travelPkg3);
	
	$roles = array("Admin" => "0", "End-User" => "1");
	
	$_ADMIN_ROLE = 0;
	$_ENDUSER_ROLE = 1;
	
	
?>