<?php
	/*
		Author: Quynh Nguyen (Queenie)
		Date created: Nov - 19 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 12
		Summary: construct the Social Menu 
				such as Facebook, Twitter, Instagram and Snapchat.
	*/
?>
	<div id="socialMenu" class="socialMenu">
		<a href="#"><img class="socialIcon" src="/img/twitter.png"/></a>
		<a href="#"><img class="socialIcon" src="/img/facebook.png"/></a>
		<a href="#"><img class="socialIcon" src="/img/instagram.png"/></a>
		<a href="#"><img class="socialIcon" src="/img/snapchat.png"/></a>
		<a href="#"><img class="authenticationIcon" src="/img/sign_up.png"/></a>
		<form id="loginout" action="functions.php" style="display:inline" method="post">
		
			
			<?php
				$login = isset($_SESSION['logged-in'])?$_SESSION['logged-in']:false;
				//print $login;
				if(!$login) {
					print "<input type=\"hidden\" name=\"action1\" id=\"action1\" value=\"login\"></input>";
					// "<input type=\"submit\" name=\"action\" id=\"action\" value=\"login\"/>";
					print "<a href=\"javascript: login()\"><img class=\"authenticationIcon\" src=\"/img/login4.png\"/></a>";
				} else {
					print "<input type=\"hidden\" name=\"action1\" id=\"action1\" value=\"logout\"/>";
					print "<a href=\"javascript: logout()\"><img class=\"authenticationIcon\" src=\"/img/logout.jpg\"/></a>";
				}
			?>		
			
		</form>

	</div>
	<script type="text/javascript">
		function logout() {
			document.getElementById("loginout").submit();
		}
		
		function login() {
			document.getElementById("loginout").submit();
		}
	</script>