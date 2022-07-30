<html>
	<head>
		<title>
			РГЗ - 3 задание
		</title>
	</head>
<body>
  <form action="" method="GET">
    <input type="checkbox" name="names[]" value="Access">
    <label>Access</label><br>
    <input type="checkbox" name="names[]" value="FoxPro">
    <label>FoxPro</label><br>
    <input type="checkbox" name="names[]" value="Oracle7">
    <label>Oracle7</label><br>
    <input type="checkbox" name="names[]" value="Orion3">
    <label>Orion3</label><br>
    <input type="checkbox" name="names[]" value="Orion4">
    <label>Orion4</label><br>
    <input type="checkbox" name="names[]" value="Delphi">
    <label>Delphi</label><br>
    <input type="checkbox" name="names[]" value="Essbase1">
    <label>Essbase1</label><br>
    <input type="checkbox" name="names[]" value="Essbase2">
    <label>Essbase2</label><br>
    <input type="checkbox" name="names[]" value="Orion5">
    <label>Orion5</label><br>
    <input type="checkbox" name="names[]" value="Oracle8">
    <label>Oracle8</label><br>
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
		
		if (isset($_GET["names"]))
		{		
			$names = $_GET["names"];	
			$names = implode("', '", $names);
			
			$result = mysqli_query($conn, "SELECT DISTINCT type FROM $table WHERE firm IN(SELECT firm FROM $table WHERE name IN ('$names'));");
			if (!$result)
			{ 
				$dberror = mysqli_error($conn);
				print "$dberror";
				return false;
			}
					
			print "<form action='' method=post>
				<table border=1>
				<tr>
					<th>type</th>
				</tr>";
			while ($a_row = mysqli_fetch_array($result))
			{
				print "<tr>";
				print "<td>".$a_row["type"]."</td>";
				print "</tr>";			
			}
		}

		mysqli_close($conn);
?>
</body>
</html>