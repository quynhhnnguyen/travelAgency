<?php
$dbh = mysqli_connect("localhost", "yatri", "Y@tri1995p@tel", "travelexperts");
if (!$dbh)
{
	print("Connection failed: " . mysqli_connect_errno() . "--" .mysqli_connect_error() . "<br />");
	exit();
}
?>

<?php
	/*
		Author: Yatri Patel
		Date created: Nov - 14 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Summary: construct the Travel Packages Page 
				to provide Travel Package Information.
	*/

	include "header.php";
	include "sqlfunctions.php";
	include "variables.php";
	
	
	//set value to activeTab by session variable
	$_SESSION["activeTab"] = "travelPackagesTab";
	
	
	//navigations
	include "menu.php";
	
?>

<?php
			
			// Get list from Packages from database
			$packages = getPackagesInfo();

			global $agentPosColors;
			global $pkgImgByPos;
			
			print "<div id=\"agentsdiv\" class=\"col-sm-12 contentPaddingDiv\">";
			print "<div align='left'>";
			print "    <h1><b>Our Packages</b></h1>";
			print "</div>";
			foreach ($packages as $package) {
				$pos = $package -> PkgName;

				
				
				print "<table>";
				
				
				print "<div class=\"col-sm-4 well well-lg agentWell\" style=\"background-color:" . $agentPosColors[$pos] . "\">";
				
				
				print "			<div id=\"agentimg\">";
				print "				<img class=\"agentImg\" src=\"img/" . $pkgImgByPos[$pos] . "\"/>";
				print "			</div>";
				print "			<div id=\"agentinfo\">";
				print"				". $package -> PkgName . "<br/>";
				print "				". $package -> PkgStartDate . "<br/>";
				print "             " . $package -> PkgEndDate . " <br/>";
				print "				" . $package -> PkgDesc . "<br/>";
				print "				" . $package -> PkgBasePrice . "<br/>";	
				print "			</div>";
				print "</div>";
				print "</table>";
			}
		
	?>
	<div>
		<div class="btn">
		<button type="button" style="margin:20px; color:black; height:40px; width:90px"><b> Order </b> </button>
		</button>
		</div>
	</div>
	
<!-- <div><a href="mainPage.php" >Back to Home Page</a></div>		 -->
<!-- footer -->		
<?php
    //print "<table style=margin-top:35%;>";
	include "footer.php";
	//print "</table>";
?>
