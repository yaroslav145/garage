<?php
	$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
	
	$query = mysqli_query($link, "SELECT * FROM workshop.details");
	
	if($query)
	{
		$rn = mysqli_num_rows($query);
		
		for($i = 0; $i < $rn; $i++)
		{
			$row = mysqli_fetch_array($query);
			
			if(isset($_POST[$row["id"]]))
			{
				mysqli_query($link, "INSERT INTO workshop.details_list(detail_id, price_list_paragraph_id) VALUES ('".$row["id"]."', '".$_POST["plid"]."')");
			}
		}
	}

	mysqli_close($link);
	
	header ("Location: adminPage.php");
?>