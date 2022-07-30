<html>
	<head>
		<title>
			РГЗ - 2 задание
		</title>
	</head>
<body>
  <form action="" method="GET">
      <h4>Выберите столбец таблицы для вывода:</h4>

		<select name = "column">
		  <option value = "name">Имя</option>
		  <option value = "type">Тип</option>
		  <option value = "firm">Фирма</option>		  
		</select>
	  
      <input type="submit" value="Вывести">
  </form>
  
<?php
	$servername = "localhost";
	$user = "root";
	$pass = "";
	$db = "rgz";
	$table = "SUBD";
    
	$conn = mysqli_connect($servername, $user, $pass);
	if (!$conn)
	{ 
		$dberror = mysqli_error($conn);
		print "$dberror";
		return false;
	} 
	
	if (!mysqli_select_db($conn, $db))
	{ 
		$dberror = mysqli_error($conn);
		print "$dberror";
		return false;
	}

	if (isset($_GET["column"]))
	{				
		$col = $_GET["column"];
		
		$result = mysqli_query($conn, "SELECT DISTINCT $col from $table");
		if (!$result)
		{ 
			$dberror = mysqli_error($conn);
			print "$dberror";
			return false;
		}
		
		while ($a_row = mysqli_fetch_array($result))
		{
			print $a_row[$col]."<br>";
		}
	}
	mysqli_close($conn);
?>
  
</body>
</html>
