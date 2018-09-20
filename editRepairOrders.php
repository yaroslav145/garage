<style>	
	input
	{
		text-align: center;
	}
</style>

<html>
	<head>
		<title>Редактирование ордеров на ремонт</title>
		<link href="bodyStyle.css" rel="stylesheet" type="text/css">
		<link href="buttonStyle.css" rel="stylesheet" type="text/css">
		<link href="tableStyle.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<table>
			<td>Действие</td>
			<td>Название</td>
			<td>Имя</td>
			<td>Дата начала</td>
			<td>Дата окончания</td>
			<td>Комментарий</td>
			<?php
				$link = mysqli_connect("localhost", "admin", "admin", "workshop") or die (mysql_error());
				$query = mysqli_query($link, "SELECT repair_orders.id, t.title, masters.name, repair_orders.date_out, repair_orders.date_in, repair_orders.comment  FROM repair_orders, masters, (SELECT required_works.id, price_list.title FROM required_works, price_list WHERE required_works.breaking_id=price_list.id) as t WHERE repair_orders.id_master=masters.id AND repair_orders.work_id=t.id");
				
				if($query)
				{
					$rn = mysqli_num_rows($query);

					for($i = 0; $i < $rn; $i++)
					{
						$row = mysqli_fetch_array($query);
						echo "<tr><td> 
								<form method='post' action='editRepairOrdersScript.php'>
									<input name=id value=".$row["id"]." type='hidden'>
									<input name='sendButton' type='submit' value='Удалить'>
								</form>
							  </td>
							  
							  <td>
								<div>".$row["title"]."<div>
							  </td>
							  
							  <td>
								<div>".$row["name"]."<div>
							  </td>
							  
							  <td>
								<div>".$row["date_in"]."<div>
							  </td>
							  
							  <td>
								<div>".$row["date_out"]."<div>
							  </td>
							  
							  <td>
								<div>".$row["comment"]."<div>
							  </td>";
					}
				}
			?>
		</table>
		
		<div class="menu_field"><a href="adminPage.php">Главное меню</a></div>
	</body>
</html>