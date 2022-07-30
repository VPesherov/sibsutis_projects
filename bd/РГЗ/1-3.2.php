<html>
	<head>
		<title>
			РГЗ - 3 задание
		</title>
	</head>
<body>
  <form action="" method="GET">
    <input type="checkbox" name="id[]" value=1>
    <label>Первая</label><br>
    <input type="checkbox" name="id[]" value=10>
    <label>Последняя</label><br>
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
		if (isset($_GET["id"]))
		{		
			$ids = $_GET["id"];	
			$ids = implode("', '", $ids);
			
			$result = mysqli_query($conn, "SELECT name FROM $table where n NOT IN ('$ids') ORDER BY name");
			if (!$result)
			{ 
				$dberror = mysqli_error($conn);
				print "$dberror";
				return false;
			}
			
			print "<form action='' method=post>
				<table border=1>
				<tr>
					<th>name</th>
				</tr>";
			while ($a_row = mysqli_fetch_array($result))
			{
				print "<tr>";
				print "<td>".$a_row["name"]."</td>";
				print "</tr>";			
			}
		}

		mysqli_close($conn);
?>
</body>
</html>