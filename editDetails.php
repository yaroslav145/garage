<style>	
	input
	{
		text-align: center;
	}
</style>

<html>
	<head>
		<title>Редактирование списка деталей</title>
		<link href="bodyStyle.css" rel="stylesheet" type="text/css">
		<link href="buttonStyle.css" rel="stylesheet" type="text/css">
		<link href="tableStyle.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<table>
			<td>Действие</td>
			<td>Название</td>
			<td>Цена</td>
			<td>Поставщик</td>
			<?php
				$link = mysqli_connect("localhost", "admin", "admin", "workshop") or die (mysql_error());
				$query = mysqli_query($link, "SELECT details.*, providers.name FROM details, providers WHERE providers.id=details.provider_id");
				
				if($query)
				{
					$rn = mysqli_num_rows($query);

					for($i = 0; $i < $rn; $i++)
					{
						$row = mysqli_fetch_array($query);
						echo "<tr><td> 
								<form method='post' action='editDetailsScript.php'>
									<input name=id value=".$row["id"]." type='hidden'>
									<input name='sendButton' type='submit' value='Удалить'>
								</form>
							  </td>
							  
							  <td>
								<div>".$row["title"]."<div>
							  </td>
							  
							  <td>
								<div>".$row["price"]."<div>
							  </td>
							  
							  <td>
								<div>".$row["name"]."<div>
							  </td>
							  ";
					}
				}
			?>
		</table>
		
		<div class="menu_field"><a href="adminPage.php">Главное меню</a></div>
	</body>
</html>