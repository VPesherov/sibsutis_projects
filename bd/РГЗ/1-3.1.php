<html>
	<head>
		<title>
			РГЗ - 3 задание
		</title>
	</head>
<body>
  <form action="" method="GET">
    <input type="checkbox" name="types[]" value="Реляц">
    <label>Реляц</label><br>
    <input type="checkbox" name="types[]" value="ОО">
    <label>ОО</label><br>
    <input type="checkbox" name="types[]" value="Многом">
    <label>Многом</label><br>
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
		
		if (isset($_GET["types"]))
		{		
			$types = $_GET["types"];	
			$types = implode("', '", $types);
			
			$result = mysqli_query($conn, "SELECT * FROM $table WHERE type NOT IN ('$types')");
			if (!$result)
			{ 
				$dberror = mysqli_error($conn);
				print "$dberror";
				return false;
			}
			
			print "<form action='' method=post>
				<table border=1>
				<tr>
					<th>id</th>
					<th>name</th>
					<th>type</th>
					<th>firm</th>
				</tr>";
			while ($a_row = mysqli_fetch_array($result))
			{
				$id = $a_row["n"];
				print "<tr>";
				print "<td>".$id."</td>";
				print "<td>".$a_row["name"]."</td>";
				print "<td>".$a_row["type"]."</td>";
				print "<td>".$a_row["firm"]."</td>";
				print "</tr>";			
			}
		}

    mysqli_close($conn);
?>
</body>
</html>