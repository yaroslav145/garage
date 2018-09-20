<style>	
	input
	{
		text-align: center;
	}
</style>

<html>
	<head>
		<title>Редактирование списка требуемых работ</title>
		<link href="bodyStyle.css" rel="stylesheet" type="text/css">
		<link href="buttonStyle.css" rel="stylesheet" type="text/css">
		<link href="tableStyle.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<table>
			<td>Действие</td>
			<td>Поломка</td>
			<td>Автомобиль</td>
			<?php
				$link = mysqli_connect("localhost", "admin", "admin", "workshop") or die (mysql_error());
				$query = mysqli_query($link, "SELECT required_works.id, price_list.title, repaired_cars.car_name FROM required_works, price_list, repaired_cars WHERE required_works.breaking_id=price_list.id AND repaired_cars.id=required_works.car_id");
				
				if($query)
				{
					$rn = mysqli_num_rows($query);

					for($i = 0; $i < $rn; $i++)
					{
						$row = mysqli_fetch_array($query);
						echo "<tr><td> 
								<form method='post' action='editRequiredWorksScript.php'>
									<input name=id value=".$row["id"]." type='hidden'>
									<input name='sendButton' type='submit' value='Удалить'>
								</form>
							  </td>
							  
							  <td>
								<div>".$row["title"]."<div>
							  </td>
							  
							  <td>
								<div>".$row["car_name"]."<div>
							  </td>";
					}
				}
			?>
		</table>
		
		<div class="menu_field"><a href="adminPage.php">Главное меню</a></div>
	</body>
</html>