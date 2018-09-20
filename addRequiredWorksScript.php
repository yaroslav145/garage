<?php
	$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
	
	$query = mysqli_query($link, "SELECT * FROM workshop.price_list");
	
	if($query)
	{
		$rn = mysqli_num_rows($query);
		
		for($i = 0; $i < $rn; $i++)
		{
			$row = mysqli_fetch_array($query);
			
			if(isset($_POST[$row["id"]]))
			{
				mysqli_query($link, "INSERT INTO workshop.required_works(breaking_id, car_id, completed) VALUES ('".$row["id"]."', '".$_POST["carid"]."', '0')");
			}
		}
	}

	mysqli_close($link);
	
	header ("Location: adminPage.php");
?>