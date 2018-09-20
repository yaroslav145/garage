<html>
	<head>
		<title>Регистрация деталей</title>
		<link href="buttonStyle.css" rel="stylesheet" type="text/css">
		<link href="bodyStyle.css" rel="stylesheet" type="text/css">
		<link href="inputStyle.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<form method='post' action='addDetailsScript.php'>
			<div>Название</div>
			<div><input name='name' type='text'></div>
			<div>Цена</div>
			<div><input name='pri' type='text'></div>
			<div>Поставщик</div>
				<select name='provid' type='text'>
					<?php
						$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
						$query = mysqli_query($link, "SELECT * FROM workshop.providers");
						
						if($query)
						{
							$rn = mysqli_num_rows($query);
							
							for($i = 0; $i < $rn; $i++)
							{
								$row = mysqli_fetch_array($query);
								echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
							}
						}
						
						mysqli_close($link);
					?>
				</select>
			<br>
			<br>
			<div><input type="submit" value="Добавить"></div>
		</form>
		
		<div class="menu_field"><a href="adminPage.php">Главное меню</a></div>
	</body>
</html>