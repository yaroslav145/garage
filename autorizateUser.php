<?php
	session_start();

	$email = $_POST["email"];
	$pass = $_POST["pass"];
	
	$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
	
	$query = mysqli_query($link, "SELECT * FROM workshop.masters WHERE email = '".$email."' AND password = '".$pass."'");
	
	mysqli_close($link);
	
	if(mysqli_num_rows($query) > 0)
	{	
		$row = mysqli_fetch_array($query);
		
		$_SESSION['ID'] = $row["id"];
		
		if($row["position"] == "admin")
		{		
			$_SESSION['active'] = 1;
			header ("Location: adminPage.php");
		}
		
		if($row["position"] == "master")
		{
			$_SESSION['active'] = 2;
			header ("Location: masterPage.php");
		}
	}
	else
	{
		$_SESSION['active'] = 0;
		header ("Location: loginPage.php");
	}
?>