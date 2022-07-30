<?php 
	$servername = "localhost";
	$user = "root";
	$pass = "";
	$db = "sample";
	$table = "notebook_brNN";

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
  
	if (isset($_POST['id']) && isset($_POST['field_name'])) 
	{
		$id = $_POST["id"];
		$field_name = $_POST["field_name"];
		$field_value = $_POST["field_value"];
		
		$result = mysqli_query($conn, "UPDATE $table SET $field_name='$field_value' WHERE id='$id'");
		if (!$result)
		{ 
			$dberror = mysqli_error($conn);
			print "$dberror";
			return false;
		}
		else 
		{
			print "Обновление прошло успешно!";
		}
	}
?>
<html>
	<head>
		<title>1-4</title>
	</head>
<body>
<?php
	$result = mysqli_query($conn, "SELECT * FROM $table");	
	if (!$result)
	{ 
		$dberror = mysqli_error($conn);
		print "$dberror";
		return false;
	}
	if (mysqli_num_rows($result) > 0)
	{
		print "<form action='' method=post>
			<table border=1>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>city</th>
				<th>address</th>
				<th>birthday</th>
				<th>mail</th>
				<th>выбрать</th>
			</tr>";
			
		while ($a_row = mysqli_fetch_array($result))
		{
			$id = $a_row["id"];
			print "<tr>";
			print "<td>".$id."</td>";
			print "<td>".$a_row["name"]."</td>";
			print "<td>".$a_row["city"]."</td>";
			print "<td>".$a_row["address"]."</td>";
			print "<td>".$a_row["birthday"]."</td>";
			print "<td>".$a_row["mail"]."</td>";
			print "<td><input type='radio' name='id' value=$id></td>";
			print "</tr>";			
		}
					
		print "</table>";
		print "<br>";
		print "<input type='submit' value='Выбрать'>";
		print "</form>";
		
		if (isset($_POST['id'])) 
		{
			$result = mysqli_query($conn, "SELECT * FROM $table WHERE id=".$_POST['id']);
			if (!$result)
			{ 
				$dberror = mysqli_error($conn);
				print "$dberror";
				return false;
			}

			print "<br>";
			print "<form action='' method=post>";
			print "<input type='hidden' name='id' value=".$_POST['id'].">";
			print "<select name='field_name'>";
			while ($a_row = mysqli_fetch_array($result))
			{
				print "<option value='name'>".$a_row["name"]."</option>";
				print "<option value='city'>".$a_row["city"]."</option>";
				print "<option value='address'>".$a_row["address"]."</option>";
				print "<option value='birthday'>".$a_row["birthday"]."</option>";
				print "<option value='mail'>".$a_row["mail"]."</option>";
			}
			print "</select>";

			print " введите новое значение: ";
			print "<input type='text' name='field_value' />";

			print "<br>";
			print "<input type='submit' value='Заменить'>";
			print "</form>";
		}
	}
	
	mysqli_close($conn);
?>
<br><a href="1-3.php">Файл 1-3</a>
</body>
</html>