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


<!-- Images Dimentions should be 1350x200 or little bit more otherwise
it won't fit. It will take the whole page, So if anyone wants to change
the Images Please consider the dimentions Thanks-->

<div class="slideshow-container">

<div class="mySlides fade">
   <img class="slideImg" src="/img/France.jpg" style="width:80%;margin-left: 10%">
  </div>

<div class="mySlides fade">
  <img class="slideImg" src="/img/Ibiza.jpg" style="width:80%;margin-left: 10%">
</div>

<div class="mySlides fade">
  <img class="slideImg" src="/img/Amsterdam.jpg" style="width:80%;margin-left: 10%">
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


<!-- footer -->
<?php
	include "footer.php";
?>