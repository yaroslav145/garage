<html>
	<head>
		<title>Сопоставление работ и требуемых деталей</title>
		<link href="buttonStyle.css" rel="stylesheet" type="text/css">
		<link href="bodyStyle.css" rel="stylesheet" type="text/css">
		<link href="inputStyle.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<form method='post' action='addWorkAndRequiredDetailsScript.php'>
			<div>Детали</div>
				<?php
					$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
					$query = mysqli_query($link, "SELECT * FROM workshop.details");
					
					if($query)
					{
						$rn = mysqli_num_rows($query);
						
						for($i = 0; $i < $rn; $i++)
						{
							$row = mysqli_fetch_array($query);
							echo "<div><input type='checkbox' name='".$row["id"]."'>".$row["title"]."</div><br>";
						}
					}
					
					mysqli_close($link);
				?>	
			<div>Работа</div>
				<select name='plid' type='text'>
					<?php
						$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
						$query = mysqli_query($link, "SELECT * FROM workshop.price_list");
						
						if($query)
						{
							$rn = mysqli_num_rows($query);
							
							for($i = 0; $i < $rn; $i++)
							{
								$row = mysqli_fetch_array($query);
								echo "<option value='".$row["id"]."'>".$row["title"]."</option>";
							}
						}
						
						mysqli_close($link);
					?>	
				<select>		
			<br>
			<br>
			<div><input type="submit" value="Сопоставить"></div>
		</form>
		
		<div class="menu_field"><a href="adminPage.php">Главное меню</a></div>
	</body>
</html>