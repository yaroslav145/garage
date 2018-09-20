<?php
	session_start();

	$tableName = $_SESSION['lastActiveTable'];
	
	$link = mysqli_connect("localhost", "admin", "admin") or die (mysql_error());
	$query = mysqli_query($link, "SELECT * FROM ".$tableName."");
	
	if($query)
	{
		if($_POST["sendButton"] == "Сохранить")
		{
			$cn = 0;
			while($finfo = mysqli_fetch_field($query))
			{
				$columnName[$cn] = $finfo->name;
				$cn++;
			}
			
			for($i = 1; $i < $cn; $i++)
			{
				mysqli_query($link, "UPDATE ".$tableName." SET ".$columnName[$i]."='".$_POST[$i]."' WHERE ".$columnName[0]."='".$_POST[0]."'");
			}
		}
		
		if($_POST["sendButton"] == "Добавить")
		{
			$cn = 0;
			while($finfo = mysqli_fetch_field($query))
			{
				$columnName[$cn] = $finfo->name;
				$cn++;
			}
			
			$str = "INSERT INTO ".$tableName." VALUES (";
			for($i = 0; $i < $cn - 1; $i++)
			{
				$str .= "'$_POST[$i]', ";
			}
			$str .= "'$_POST[$i]')";

			
			mysqli_query($link, $str);
		}
		
		if($_POST["sendButton"] == "Удалить")
		{
			mysqli_query($link, "DELETE FROM ".$tableName." WHERE id=".$_POST[0]."");
		}
	}
	
	mysqli_close($link);
	
	header ("Location: showTablesPage.php");
?>