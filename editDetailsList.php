<style>	
	input
	{
		text-align: center;
	}
</style>

<html>
	<head>
		<title>Редактирование списка сопоставленных деталей и работ</title>
		<link href="bodyStyle.css" rel="stylesheet" type="text/css">
		<link href="buttonStyle.css" rel="stylesheet" type="text/css">
		<link href="tableStyle.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<table>
			<td>Действие</td>
			<td>Работа</td>
			<td>Деталь</td>
			<?php
				$link = mysqli_connect("localhost", "admin", "admin", "workshop") or die (mysql_error());
				$query = mysqli_query($link, "SELECT details_list.id, details.title, price_list.title as title2 FROM details_list, details, price_list WHERE details_list.price_list_paragraph_id=price_list.id AND details_list.detail_id=details.id");
				
				if($query)
				{
					$rn = mysqli_num_rows($query);

					for($i = 0; $i < $rn; $i++)
					{
						$row = mysqli_fetch_array($query);
						echo "<tr><td> 
								<form method='post' action='editDetailsListScript.php'>
									<input name=id value=".$row["id"]." type='hidden'>
									<input name='sendButton' type='submit' value='Удалить'>
								</form>
							  </td>
							  
							  <td>
								<div>".$row["title2"]."<div>
							  </td>
							  
							  <td>
								<div>".$row["title"]."<div>
							  </td>";
					}
				}
			?>
		</table>
		
		<div class="menu_field"><a href="adminPage.php">Главное меню</a></div>
	</body>
</html>