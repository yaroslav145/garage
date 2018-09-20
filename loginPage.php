<style>
	.login_field
	{
		position: relative;
		text-align: center;
	}

	.input_width
	{
		width: 80%;
	}
	
	body 
	{
		background-image: url(title.jpg);
		background-repeat: repeat-y, repeat-y;
		background-size: 100% 100%;
	}
	
	.arial_style
	{
		font-family: 'Arial';
		text-decoration: none;
		color: black;	
	}
</style>


<html>
	<head>
		<title>Автомастерская</title>
	</head>
	
	<body>
		<div style="position: absolute; width: 25%; background: #8850ee; border: 7px solid #434343; -moz-border-radius: 30px; -webkit-border-radius: 30px; right: 5%; top: 20px;">
			<form method="post" action="autorizateUser.php">
				<div class="login_field">
					<div class="arial_style">
						Email
					</div>
					<input class="input_width" name="email" type="text">
				</div>
				
				<div class="login_field">
					<div class="arial_style">
						Пароль
					</div>
					<input class="input_width" name="pass" type="password">
				</div>
				
				<div class="login_field">
					<input type="submit" value="Вход">
				</div>	
				
				<?php
					session_start();
					if(isset($_SESSION['active']))
					{
						if($_SESSION['active'] == 0)
						{
							echo "<div class='login_field arial_style'>Неверный логин/пароль</div>";
						}
					}
				?>
			</form>
		</div>
	</body>
</html>