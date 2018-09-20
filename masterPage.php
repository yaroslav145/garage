<html>
	<head>
		<title>Автомастерская</title>
		<link href="buttonStyle.css" rel="stylesheet" type="text/css">
		<link href="bodyStyle.css" rel="stylesheet" type="text/css">
		<link href="tableStyle.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<?php
			session_start();

			$link = mysqli_connect("localhost", "master", "master", "workshop") or die (mysql_error());
			$query = mysqli_query($link, "SELECT * FROM (SELECT * FROM repair_orders WHERE repair_orders.id_master=".$_SESSION['ID'].") AS orders, required_works, repaired_cars, price_list WHERE orders.work_id = required_works.id AND required_works.breaking_id = price_list.id AND required_works.car_id=repaired_cars.id GROUP BY repaired_cars.id");	
			
			if($query)
			{
				$carn = mysqli_num_rows($query);
				
				for($i = 0; $i < $carn; $i++)
				{
					$row = mysqli_fetch_array($query);
					
					$cars[$i] = $row["car_id"];
				}
			}
			
			

			echo "<h1 align=center>Требуемые работы:</h1>";
					
			echo "<table>";	
			
			echo "<tr>
							
							<td>Дата поступления</td>
							<td>Дата окончания работ</td>
							<td>Комментарий</td>
							<td>Номер</td>
							<td>Марка</td>
							<td>Название</td>
							<td>Пробег</td>
							<td>VIN</td>
							<td>Год выпуска</td>
							<td>Работа</td>
							<td>Оплата</td>";
								
			
			
			for($j = 0; $j < $carn; $j++)
			{
				$query = mysqli_query($link, "SELECT orders.date_in as di, orders.date_out as do, orders.comment, repaired_cars.*, price_list.* FROM (SELECT * FROM repair_orders WHERE repair_orders.id_master=".$_SESSION['ID'].") AS orders, required_works, repaired_cars, price_list WHERE orders.work_id = required_works.id AND required_works.breaking_id = price_list.id AND required_works.car_id=repaired_cars.id AND required_works.car_id=".$cars[$j]."");
					
				if($query)
				{
					$rn = mysqli_num_rows($query);
					
					for($i = 0; $i < $rn; $i++)
					{
						$row = mysqli_fetch_array($query);
						
						echo "<tr>
							<td>".$row["di"]."</td>
							<td>".$row["do"]."</td>
							<td>".$row["comment"]."</td>	
							<td>".$row["car_number"]."</td>
							<td>".$row["car_mark"]."</td>
							<td>".$row["car_name"]."</td>
							<td>".$row["mileage"]."</td>
							<td>".$row["VIN"]."</td>
							<td>".$row["create_year"]."</td>
							<td>".$row["title"]."</td>
							<td>".$row["pay_h"]."</td>";
					}
				}
			}

			echo "</table>";
		?>
	</body>
</html>