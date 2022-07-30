<html>
	<head>
		<title>
			РГЗ - 1 задание
		</title>
	</head>
<body>
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
	
	$result = mysqli_query($conn, "DROP TABLE IF EXISTS $table");
	if (!$result)
	{ 
		$dberror = mysqli_error($conn);
		print "$dberror";
		return false;
	}
	
    $result = mysqli_query($conn, "CREATE TABLE IF NOT EXISTS $table 
									(
										n INT NOT NULL AUTO_INCREMENT,
										name VARCHAR(255) NOT NULL,
										type VARCHAR(255) NOT NULL,
										firm VARCHAR(255) NOT NULL,
										PRIMARY KEY (n)
									)");
	if (!$result)
	{ 
		$dberror = mysqli_error($conn);
		print "$dberror";
		return false;
	}
	
    $sql = "INSERT INTO $table (name, type, firm)
    VALUES ('Access', 'Реляц', 'Microsoft');";
    $sql .= "INSERT INTO $table (name, type, firm)
    VALUES ('FoxPro', 'Реляц', 'Microsoft');";
    $sql .= "INSERT INTO $table (name, type, firm)
    VALUES ('Oracle7', 'Реляц', 'Oracle');";
    $sql .= "INSERT INTO $table (name, type, firm)
    VALUES ('Orion3', 'ОО', 'Orion');";
    $sql .= "INSERT INTO $table (name, type, firm)
    VALUES ('Orion4', 'ОО', 'Orion');";
    $sql .= "INSERT INTO $table (name, type, firm)
    VALUES ('Delphi', 'ОО', 'Microsoft');";
    $sql .= "INSERT INTO $table (name, type, firm)
    VALUES ('Essbase1', 'Многом', 'Arbor');";
    $sql .= "INSERT INTO $table (name, type, firm)
    VALUES ('Essbase2', 'Многом', 'Arbor');";
    $sql .= "INSERT INTO $table (name, type, firm)
    VALUES ('Orion5', 'Многом', 'Orion');";
    $sql .= "INSERT INTO $table (name, type, firm)
    VALUES ('Oracle8', 'Многом', 'Oracle');";

    if (mysqli_multi_query($conn, $sql)) 
	{
		print "Таблица создана";
    } 
	else 
	{
		$dberror = mysqli_error($conn);
		print "$dberror";
		return false;
    }

	mysqli_close($conn);
?>