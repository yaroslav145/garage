<?php
	$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
	
	mysqli_query($link, "INSERT INTO workshop.owners(name, addr, phone_number) VALUES ('".$_POST["fio"]."', '".$_POST["address"]."', '".$_POST["phone_number"]."')");
	
	mysqli_close($link);
	
	header ("Location: addCar.php");
?>