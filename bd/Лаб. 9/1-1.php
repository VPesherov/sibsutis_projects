<html> 
	<head>
		<title> 
			Листинг 11-1. Добавление записи в таблицу
		</title> 
	</head> 
		<body>
<?php
	$servername = "localhost";
	$user = "root";
	$pass = "";
	$db = "sample"; 
	$table = "notebook_brNN";
	
	$conn = mysqli_connect($servername, $user, $pass);
	if (!$conn )
	{
		die("Нет соединения с MySQL");
	}
	mysqli_select_db($conn, $db) or die ("Нельзя открыть $db: ".mysqli_error($conn));
	 
	$query = "DROP TABLE IF EXISTS $table";
	mysqli_query($conn, $query) or die ("<p>Ошибка: ".mysqli_error($conn));
	
	$query = "create table $table
	(
		id INT NOT NULL AUTO_INCREMENT,
		PRIMARY KEY(id), 
		name VARCHAR(50),
		city VARCHAR(50),
		address VARCHAR(50),
		birthday DATE,
		mail VARCHAR(20)
	)";
	mysqli_query($conn, $query) or die ("<p>Ошибка: ".mysqli_error($conn));
	
	print "<p>Таблица $table создана";
	mysqli_close($conn);
?> 
		</body> 
</html> 