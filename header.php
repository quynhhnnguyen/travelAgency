<?php
	/*
		Author: Quynh Nguyen (quynhnnguyen)
		Date created: Nov - 14 - 2018.
		Summary: construct the Header Section 
				to include all necessary libraries for CSS and JavaScript.
	*/
	
	session_start();
	include "sqlfunctions.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Dream Land Travel Agency</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

		<link rel="stylesheet" type="text/css" href="/css/css.css"></link>
		<script src="/study/js/utils.js"></script>
		
	</head>

	<body >

<?php
	include "socialmenu.php";
?>
	<div id="banner" class="bannerDiv"></div>
