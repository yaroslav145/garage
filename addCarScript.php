<?php
	$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
	
	mysqli_query($link, "INSERT INTO workshop.repaired_cars(car_number, car_mark, car_name, date_in, date_out, owner_id, mileage, VIN, create_year) VALUES ('".$_POST["num"]."', '".$_POST["mar"]."', '".$_POST["name"]."', '".$_POST["in"]."', '".$_POST["out"]."', '".$_POST["ownid"]."', '".$_POST["mil"]."', '".$_POST["vin"]."', '".$_POST["year"]."')");
	
	mysqli_close($link);
	
	header ("Location: addRequiredWorks.php");
?>