<?php
	/*
		Author: Maryam Munir
		Date created: Nov - 29 - 2018.
		Course Module: CPRG-210-OSD - Web Application Development - PHP and MySQL
		Summary: Limited Suppliers Information From Database
	*/
?>
<?php
include "header.php";

$_SESSION["activeTab"] = "homeTab";
include "menu.php"; ?>
<?php
	$dbh = mysqli_connect("localhost", "Maryam1", "1947@23", "travelexperts");
	if (!$dbh)
	{
		print("Connection failed: " . mysqli_connect_errno() . "--" .mysqli_connect_error() . "<br />");
		exit();
	}
?>
<?php
$sql = "SELECT  `SupName` FROM `suppliers` LIMIT 30";
$result = mysqli_query($dbh, $sql);
if (!$result)
{
  print("Query failed: " . mysqli_errno() . "--" . mysqli_error() . "<br />");
  exit();
}
print("<table style=text-align:center;margin-left:35%;>");
$firstrow = true;
while ($row = mysqli_fetch_assoc($result))
{
  if ($firstrow)
  {
    print("<tr <br />");
    $keys = array_keys($row);
    foreach ($keys as $key)
    {
      print("<th >  $key  </th>");
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
<?php
mysqli_close($dbh);
?>

<?php
include "footer.php"; ?>
