<html> 
	<head>
		<title> 
			Листинг 11-3. Вывод всех записей таблицы
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
	
	if (!$conn)
	{
		die("Нет соединения с MySQL");
	}
	mysqli_select_db($conn, $db) or die ("Нельзя открыть $db: ".mysqli_error($conn));
	
	$result = mysqli_query($conn, "SELECT * FROM $table");
	
	print "<table border=1>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>city</th>
          <th>address</th>
          <th>birthday</th>
          <th>mail</th>
        </tr>
     \n";

	while ($a_row = mysqli_fetch_row($result))
	{
		print "<tr>\n";
		foreach ($a_row as $field)
		{
			print "\t<td>$field</td>\n";			
		}
		print "</tr>\n";
	}
	print "</table>\n";
	mysqli_close($conn);
?>
	</body> 
</html> 