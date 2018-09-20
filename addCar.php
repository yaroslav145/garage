<html>
	<head>
		<title>Регистрация машины</title>
		<link href="buttonStyle.css" rel="stylesheet" type="text/css">
		<link href="bodyStyle.css" rel="stylesheet" type="text/css">
		<link href="inputStyle.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<form method='post' action='addCarScript.php'>
			<div>Номер</div>
			<div><input name='num' type='text'></div>
			<div>Марка</div>
			<div><input name='mar' type='text'></div>
			<div>Название</div>
			<div><input name='name' type='text'></div>
			<div>Дата поступления</div>
			<div><input name='in' type='date'></div>
			<div>Дата окончания работ</div>
			<div><input name='out' type='date'></div>
			<div>Владелец</div>
			<div>
				<select name='ownid' type='text'>
					<?php
						$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
						$query = mysqli_query($link, "SELECT * FROM workshop.owners");
						
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
			</div>
			<div>Пробег</div>
			<div><input name='mil' type='text'></div>
			<div>VIN номер</div>
			<div><input name='vin' type='text'></div>
			<div>Год выпуска</div>
			<div><input name='year' type='text'></div>
			<br>
			<div><input type="submit" value="Добавить"></div>
		</form>
		
		<div class="menu_field"><a href="adminPage.php">Главное меню</a></div>
	</body>
</html>