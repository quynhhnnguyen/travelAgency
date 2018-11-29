<!-- header -->
<?php
	/*
		Initialized by: Quynh Nguyen
		Date created: Nov - 14 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Assignment#: CPRG210 Exercises Day 8

		Modified: Nov - 15 - 2018.
		Assignment#: CPRG210 Exercises Day 9
				(Separated header, footer, menu to different php files & include them back via include function)

		Modified: Maryam Munir
		Date modified: Nov - 19 - 2018.

		Summary: Home Page.
	*/
	session_cache_expire(30);
	session_start();

	include "header.php";

	//set value to activeTab by session variable
	$_SESSION["activeTab"] = "homeTab";

	//navigations
	include "menu.php";
?>
<?php
date_default_timezone_set('America/Vancouver');

$hour=date('h');
$am_pm=date('a');

if ($am_pm=="am" && ($hour >= 0 && $hour < 12))
		{
			print("<h3>Good Morning</h3>". "<br/>");
		} else if ($am_pm=="pm" && (($hour >= 1 && $hour <= 5) || $hour==12))
		{
			print("<h3>Good Afternoon</h3>". "<br/>");
		} else
		{
			print("<h3>Good Evening</h3>". "<br/>");
		}
		$script_tz = date_default_timezone_get();
 ?>


<!-- Images Dimentions should be 1350x200 or little bit more otherwise
it won't fit. It will take the whole page, So if anyone wants to change
the Images Please consider the dimentions Thanks-->

<div class="slideshow-container">

<div class="mySlides fade">
   <img class="slideImg" src="img/France.jpg" style="width:80%;margin-left: 10%">
  </div>

<div class="mySlides fade">
  <img class="slideImg" src="img/Ibiza.jpg" style="width:80%;margin-left: 10%">
</div>

<div class="mySlides fade">
  <img class="slideImg" src="img/Amsterdam.jpg" style="width:80%;margin-left: 10%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<style media="screen">
#td1 :hover {
		background-color:#000000;
}
</style>
<table style="margin-top:50px;">
		<tr>
			 <div id="img">
				<td colspan="3" >  </td>
			</div>
		</tr>
		<tr margin-top="10px">
				<td id="td1">
							<b> Get the best deals </b> <br/><br/>
							<div id="td1">
							We search and compare real-time prices on flights, hotels and cars so you can find
							the cheapest, quickest and best travel deals
							</div>
				</td>

				<td id="td1">
						<b> 100% price transparency </b> <br/><br/>
						<div id="td1">
						The prices you see are never affected by your searches, no matter how many you make.
						We do not use cookies to adjust or increase prices.
					</div>
				</td>

				<td id="td1">
						 <b> Trusted and free </b> <br/><br/>
						 <div id="td1">
							We’re completely free to use – no hidden charges or fees – and we’re
							endorsed by Frommer’s, CNN and the New York Times.
							</div>
				</td>
		</tr>
</table>
<br/>
	<div>
			We believe that travel is not a reward for working, but the most valuable and impactful form of education for life.
			We aren’t just a travel company; we were built to introduce you to the rest of the world. Carlisle Tacone Travel is about more
			than just going on a trip. We connect you with people and offer experiences that will change the way you view the world. Travel reminds us what is truly important: family, friendship, love, exploration and adventure. We understand how much you
			can grow when you step out of your comfort zone.
	</div>
</div>

<!-- footer -->
<?php
	include "footer.php";
?>
