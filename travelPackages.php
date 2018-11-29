<?php
/*$dbh = mysqli_connect("localhost", "sa", "sa", "travelexperts");
if (!$dbh)
{
	print("Connection failed: " . mysqli_connect_errno() . "--" .mysqli_connect_error() . "<br />");
	exit();
}*/
?>

<?php
	/*
		Author: Yatri Patel
		Date created: Nov - 14 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Summary: construct the Travel Packages Page 
				to provide Travel Package Information.
	*/
	
	session_cache_expire(30);
	session_start();
	include "header.php";
	require_once("sqlfunctions.php");
	require_once("variables.php");
	
	//set value to activeTab by session variable
	$_SESSION["activeTab"] = "travelPackagesTab";
	
	
	//navigations
	include "menu.php";
	
?>

<div id="travelPackageContainer">

<?php
			
			// Get list from Packages from database
			$packages = getPackagesInfo();

			global $agentPosColors;
			global $pkgImgByPos;
			
			print "<div id=\"packagesdiv\" class=\"col-sm-12 contentPaddingDiv\">";
			print "<div align='left'>";
			print "    <h1><b>Our Packages</b></h1>";
			print "</div>";

			print "<table><tr><td>";
			foreach ($packages as $package) {
				$pos = $package -> PkgName;

				
				
				
				
				
				print "<div class=\"col-sm-4 well well-lg agentWell\" >";
				
				
				print "			<div id=\"packageimg\">";
				print "				<img class=\"agentImg\" src=\"img/" . $pkgImgByPos[$pos] . "\"/>";
				print "			</div>";
				print "			<div id=\"packageinfo\">";
				print"				". $package -> PkgName . "<br/>";
				print "				". $package -> PkgStartDate . "<br/>";
				print "             " . $package -> PkgEndDate . " <br/>";
				print "				" . $package -> PkgDesc . "<br/>";
				print "				" . $package -> PkgBasePrice . "<br/>";	
				print "			</div>";
				print "</div>";
				

			}
			//print "</table>";
		
	?>
	</td></tr>
	<tr>
		<td>
			<div>
				<div class="btn">
				<button type="button" style="margin:20px; color:black; height:40px; width:90px"><b> Order </b> </button>
				</button>
				</div>
			</div>
		</td>	
	</tr>
	</table>

</div>	
<!-- <div><a href="mainPage.php" >Back to Home Page</a></div>		 -->
<!-- footer -->		
<?php
	include "footer.php";
?>
