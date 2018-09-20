<html>
	<head>
		<title>Назначение на работу</title>
		<link href="buttonStyle.css" rel="stylesheet" type="text/css">
		<link href="bodyStyle.css" rel="stylesheet" type="text/css">
		<link href="inputStyle.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<form method='post' action='assignToWorkScript.php'>
			<div>Работа</div>
			<div>
				<select name='workid' type='text'>
					<?php
						$link = mysqli_connect("localhost", "admin", "admin", "workshop") or die (mysql_error());
						$query = mysqli_query($link, "SELECT required_works.id, price_list.title FROM required_works, price_list WHERE required_works.breaking_id=price_list.id AND required_works.id NOT IN (SELECT repair_orders.work_id FROM repair_orders)");
						
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
				</select>
			</div>
			
			<div>Мастер</div>
			<div>
				<select name='mastid' type='text'>
					<?php
						$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
						$query = mysqli_query($link, "SELECT * FROM workshop.masters WHERE position='master'");
						
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
			<div>Дата начала работы</div>
			<div><input name='in' type='date'></div>
			<div>Дата окончания работы</div>
			<div><input name='out' type='date'></div>
			<div>Примечание</div>
			<div><input name='com' type='text'></div>
			<br>
			<div><input type="submit" value="Назначить"></div>
		</form>
		
		<div class="menu_field"><a href="adminPage.php">Главное меню</a></div>
	</body>
</html>