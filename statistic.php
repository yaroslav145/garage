<style>
	div
	{
		font-family: 'Arial';
		font-weight: bold;
		margin: 2%;
	}
</style>

<html>
	<head>
		<title>Статистические показатели</title>
		<link href="bodyStyle.css" rel="stylesheet" type="text/css">
		<link href="buttonStyle.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<form method='post' action='statistic.php'>
			<div>Укажите период:</div>
			<div>
				<input name='in' type='date'>
				по
				<input name='out' type='date'>
			</div>
			<div><input type="submit" value="Вывести"></div>
		</form>
		
		<?php
			if(isset($_POST["in"]) && isset($_POST["out"]))
			{
				$link = mysqli_connect("localhost", "admin", "admin", "workshop") or die (mysql_error());
				
				$query = mysqli_query($link, "SELECT SUM(t.summ) FROM (SELECT COUNT(required_works.breaking_id) * price_list.pay_h as summ FROM required_works, price_list WHERE required_works.car_id in (SELECT id FROM repaired_cars WHERE DATE(date_out) BETWEEN '".$_POST["in"]."' AND '".$_POST["out"]."') and price_list.id=required_works.breaking_id GROUP BY required_works.breaking_id) t");
				if($query)
				{	
					$row = mysqli_fetch_array($query);
					echo "<div>Общая сумма выплат сотрудникам: ".$row["SUM(t.summ)"]." руб.</div>";
				}
				
				
				$query = mysqli_query($link, "SELECT COUNT(required_works.breaking_id) as c FROM required_works, price_list WHERE required_works.car_id in (SELECT id FROM repaired_cars WHERE DATE(date_out) BETWEEN '".$_POST["in"]."' AND '".$_POST["out"]."') and price_list.id=required_works.breaking_id");
				if($query)
				{	
					$row = mysqli_fetch_array($query);
					echo "<div>Количество выполненных работ: ".$row["c"]."</div>";
				}
				
				
				$query = mysqli_query($link, "SELECT count(*) FROM repaired_cars WHERE DATE(date_out) BETWEEN '".$_POST["in"]."' AND '".$_POST["out"]."'");
				if($query)
				{	
					$row = mysqli_fetch_array($query);
					echo "<div>Количество отремонтированных машин: ".$row["count(*)"]."</div>";
				}
				
				
				$query = mysqli_query($link, "SELECT sum(details.price * a.c_b) FROM details, (SELECT details_list.detail_id, t.c_b FROM details_list, (SELECT price_list.id ,count(required_works.breaking_id) as c_b FROM required_works, price_list WHERE required_works.car_id in (SELECT id FROM repaired_cars WHERE DATE(date_out) BETWEEN '".$_POST["in"]."' AND '".$_POST["out"]."') and price_list.id=required_works.breaking_id GROUP BY required_works.breaking_id) as t WHERE details_list.price_list_paragraph_id=t.id) as a WHERE detail_id=details.id");
				if($query)
				{	
					$row = mysqli_fetch_array($query);
					echo "<div>Затраты на детали: ".$row["sum(details.price * a.c_b)"]." руб.</div>";
				}
			
				
				$query = mysqli_query($link, "SELECT sum(income) FROM (SELECT (price_list.price - price_list.pay_h) * count(required_works.breaking_id) as income FROM required_works, price_list WHERE required_works.car_id in (SELECT id FROM repaired_cars WHERE DATE(date_out) BETWEEN '".$_POST["in"]."' AND '".$_POST["out"]."') and price_list.id=required_works.breaking_id GROUP BY required_works.breaking_id) as a");
				if($query)
				{	
					$row = mysqli_fetch_array($query);
					echo "<div>Прибыль: ".$row["sum(income)"]." руб.</div>";
				}	
				
				mysqli_close($link);
			}
		?>
		<div class="menu_field"><a href="adminPage.php">Главное меню</a></div>
	</body>
	
</html>