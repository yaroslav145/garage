<?php
	$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
	
	mysqli_query($link, "INSERT INTO workshop.details(title, price, provider_id) VALUES ('".$_POST["name"]."', '".$_POST["pri"]."', '".$_POST["provid"]."')");
	
	mysqli_close($link);
	
	header ("Location: adminPage.php");
?>