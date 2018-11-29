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
	// include "sqlfunctions.php";
	
	
	//set value to activeTab by session variable
	$_SESSION["activeTab"] = "travelPackagesTab";
	
	
	//navigations
    include "menu.php";
?>
<?php
$sql = "select ProdName from products";
			$result = mysqli_query($dbh, $sql);
			if (!$result)
			{
				print("Query failed: " . mysqli_errno() . "--" . mysqli_error() . "<br />");
				exit();
			}
			print("<table>");
			$firstrow = true;
			while ($row = mysqli_fetch_assoc($result))
			{
				if ($firstrow)
				{
					print("<tr>");
					$keys = array_keys($row);
					foreach ($keys as $key)
					{
						print("<th>ProductName</th>");
					}
					$firstrow = false;
					print("</tr>");
				}
				print("<tr>");
				$values = array_values($row);
				foreach ($values as $value)
				{
					print("<td>$value</td>");
				}
				print("</tr>");
			}
			print("</table>");
		?>


<div><a href="mainPage.html">Back to Home Page</a></div>

<!-- footer -->		
<?php
//print "<table style=margin-top:35%;>";
include "footer.php";
//print "</table>";
?>

<?php
	mysqli_close($dbh);
?>
