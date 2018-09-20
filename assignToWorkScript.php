<?php
	$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
	
	mysqli_query($link, "INSERT INTO workshop.repair_orders(work_id, id_master, date_out, date_in, comment) VALUES ('".$_POST["workid"]."', '".$_POST["mastid"]."', '".$_POST["in"]."', '".$_POST["out"]."', '".$_POST["com"]."')");
	
	mysqli_close($link);
	
	header ("Location: adminPage.php");
?>