<?php
	$link = mysqli_connect("localhost", "admin", "admin", "workshop") or die (mysql_error());

	if($_POST["sendButton"] == "Удалить")
	{
		mysqli_query($link, "DELETE FROM details_list WHERE id=".$_POST["id"]."");
	}
	
	header ("Location: editDetailsList.php");
?>