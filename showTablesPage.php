<style>	
	input
	{
		text-align: center;
	}
</style>

<html>
	<head>
		<title>List</title>
		<link href="bodyStyle.css" rel="stylesheet" type="text/css">
		<link href="buttonStyle.css" rel="stylesheet" type="text/css">
		<link href="tableStyle.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<table>
			<?php
				session_start();
			
				if(isset($_GET["table"]))
				{
					$fieldName = $_GET["table"];
				}
				else
				{
					$fieldName = $_SESSION['lastActiveTable'];
				}
					
				$_SESSION['lastActiveTable'] = $fieldName;
					
				$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
				
				$sql = "SELECT * FROM ".$fieldName."";
				
				if(isset($_POST["sf"]))
				{
					$sql .= " WHERE ".$_POST["sfname"]."='".$_POST["sf"]."'";
				}
				
				$query = mysqli_query($link, $sql);	
				
				if($query)
				{
					$rn = mysqli_num_rows($query);
					
					
					echo "<td>Действие</td>";
					$finfo = mysqli_fetch_field($query);
					$cn = 1;
					
					while($finfo = mysqli_fetch_field($query))
					{
						$columnName[$cn] = $finfo->name;
						
						$buff = $columnName[$cn];
						
						if($buff == "name")
						{
							$seach_field = "имени";
							$col_name = "name";
						}

						if($buff == "title")
						{
							$seach_field = "названию";
							$col_name = "title";
						}
						
						if($buff == "car_number")
						{
							$seach_field = "номеру машины";
							$col_name = "car_number";
						}
						
						if($buff == "pasport_number")
							$buff = "Номер паспорта";
						
						if($buff == "name")
							$buff = "Имя";
						
						if($buff == "addr")
							$buff = "Адрес";
						
						if($buff == "phone_number")
							$buff = "Номер телефона";
						
						if($buff == "password")
							$buff = "Пароль";
						
						if($buff == "position")
							$buff = "Должность";
						
						if($buff == "title")
							$buff = "Название";
						
						if($buff == "price")
							$buff = "Цена";
						
						if($buff == "pay_h")
							$buff = "Зарплата";
						
						if($buff == "car_number")
							$buff = "Номер машины";
						
						if($buff == "car_mark")
							$buff = "Марка машины";
						
						if($buff == "car_name")
							$buff = "Название машины";
						
						if($buff == "date_in")
							$buff = "Дата начала работ";
						
						if($buff == "date_out")
							$buff = "Дата окончания работ";
						
						if($buff == "owner_id")
							$buff = "Владелец";
						
						if($buff == "mileage")
							$buff = "Пробег";
						
						if($buff == "create_year")
							$buff = "Год выпуска";
						
						echo "<td>".$buff."</td>";
						$cn++;
					}

					
					for($i = 0; $i < $rn; $i++)
					{
						$row = mysqli_fetch_array($query);
						
						echo "<tr><form method='post' action='editScript.php'>";
						
						echo "<input name='0' value=".$row["id"]." type='hidden'>";
						
						echo "<td><input name='sendButton' type='submit' value='Сохранить'><br>
									<input name='sendButton' type='submit' value='Удалить'></td>";
						
						for($j = 1; $j < $cn; $j++)
						{
							$str = $row[$columnName[$j]];
							$size = mb_strlen($str);
							
							echo "<td><input name='$j' size=$size type='text' value='$str'></td>";
						}
						
						echo "</form>";
					}
					
					echo "<tr><form method='post' action='editScript.php'>";
					
					echo "<td><input name='sendButton' type='submit' value='Добавить'>";
					
					if(isset($row["id"]))
					{
						$id = $row["id"] + 1;
					}
					else
					{
						$id = 1;
					}
					
					echo "<input name='0' value=".$id." type='hidden'>";
					
					for($j = 1; $j < $cn; $j++)
					{	
						echo "<td><input name='$j' size=10 type='text'></td>";
					}
					
					echo "</form>";
				}
				
				mysqli_close($link);
			?>
		</table>
		
		<br>
		<form method='post' action='showTablesPage.php'>
			<div>Поиск по <?php echo $seach_field;?></div>
			<div><input name='sf' size=30 type='text'></div>
			<input name='sfname' value="<?php echo $col_name;?>" type='hidden'>
			<div><input name='sendButton' type='submit' value='Поиск'></div>
		</form>
		
		<div class="menu_field"><a href="adminPage.php">Главное меню</a></div>
		
	</body>
</html>