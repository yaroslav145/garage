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

			$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
			$query = mysqli_query($link, "SELECT * FROM workshop.repair_orders");	

			if($query)
			{
				echo "<h1 align=center>Автомобили:</h1>";
				
				echo "<table>";
				
				echo "<tr>
						<td>Номер</td>
						<td>Марка</td>
						<td>Название</td>	
						<td>Дата поступления</td>
						<td>Дата окончания работ</td>
						<td>Владелец</td>
						<td>Пробег</td>
						<td>VIN</td>
						<td>Год выпуска</td>";
				
				$rn = mysqli_num_rows($query);
				
				for($i = 0; $i < $rn; $i++)
				{
					$row = mysqli_fetch_array($query);
					
					echo "<tr>
						<td>".$row["car_number"]."</td>
						<td>".$row["car_mark"]."</td>
						<td>".$row["car_name"]."</td>	
						<td>".$row["date_in"]."</td>
						<td>".$row["date_out"]."</td>
						<td>".$row["owner_id"]."</td>
						<td>".$row["mileage"]."</td>
						<td>".$row["VIN"]."</td>
						<td>".$row["create_year"]."</td>";
				}
				   
				
				echo "</table>";
			}

			echo "<br><br>";

			$query = mysqli_query($link, "SELECT * FROM workshop.details WHERE id in (SELECT detail_id FROM workshop.details_list WHERE price_list_paragraph_id in (SELECT id FROM workshop.price_list WHERE id in (SELECT breaking_id FROM workshop.required_works WHERE id in (SELECT id FROM workshop.repair_orders WHERE id_master='".$_SESSION['ID']."'))))");	

			if($query)
			{
				echo "<h1 align=center>Details and providers:</h1>";
				
				echo "<table>";
				
				echo "<tr>
						<td>Title</td>
						<td>Pricce</td>
						<td>Phone number</td>
						<td>Address</td>
						<td>Email</td>
						<td>Name</td>";
				
				$rn = mysqli_num_rows($query);
				
				for($i = 0; $i < $rn; $i++)
				{
					$row = mysqli_fetch_array($query);
					
					$query2 = mysqli_query($link, "SELECT * FROM workshop.providers WHERE id='".$row["provider_id"]."'");
					$row2 = mysqli_fetch_array($query2);
					
					echo "<tr>
						<td>".$row["title"]."</td>
						<td>".$row["price"]."</td>
						<td>".$row2["phone_number"]."</td>
						<td>".$row2["addr"]."</td>
						<td>".$row2["email"]."</td>
						<td>".$row2["name"]."</td>";
				}
				echo "</table>";
			}
		?>
	</body>
</html>