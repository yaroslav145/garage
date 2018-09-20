<html>
	<head>
		<title>Регистрация клиента</title>
		<link href="buttonStyle.css" rel="stylesheet" type="text/css">
		<link href="bodyStyle.css" rel="stylesheet" type="text/css">
		<link href="inputStyle.css" rel="stylesheet" type="text/css">
	</head>
	
	<body>
		<form method='post' action='addClientScript.php'>
			<div>ФИО</div>
			<div><input name='fio' type='text'></div>
			<div>Адрес</div>
			<div><input name='address' type='text'></div>
			<div>Телефонный номер</div>
			<div><input name='phone_number' type='text'></div>
			<br>
			<div><input type="submit" value="Добавить"></div>
		</form>
		
		<div class="menu_field"><a href="adminPage.php">Главное меню</a></div>
	</body>
</html>