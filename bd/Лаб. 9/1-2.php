<html> 
	<head>
		<title> 
			Листинг 11-2. Добавление в базу данных информации, введенной пользователем
		</title> 
	</head> 
		<body>
<?php
	function Add_to_database($name, $city, $address, $birthday, $mail, &$dberror)
	{
		$servername = "localhost";
		$user = "root";
		$pass = ""; 
		$db = "sample";
		$table = "notebook_brNN";
		$conn = mysqli_connect($servername, $user, $pass);
		if (!$conn)
		{ 
			$dberror = "Нет соединения с MySQL сервером";
			return false; 
		} 
		
		if (!mysqli_select_db($conn, $db))
		{ 
			$dberror = mysqli_error($conn);
			return false;
		}
			
		$query = "INSERT INTO $table(name, city, address, birthday, mail) VALUES('$name', '$city', '$address', '$birthday', '$mail')";
		if (!mysqli_query($conn, $query))
		{ 
			$dberror = mysqli_error($conn);
			return false;
		}
		return true;
	}
	
	function Write_form()
	{ 
		print "<form action='' method='POST'>\n";
		print "<p>Введите фамилию и имя [*]: \n";
		print "<input type='text' name='name'> ";
		print "<p>Введите город: \n";
		print "<input type='text' name='city'> ";
		print "<p>Введите адрес: \n";
		print "<input type='text' name='address'> ";
		print "<p>Введите дату рождения в формате ГГГГ-ММ-ДД: \n";
		print "<input type='text' name='birthday'> ";
		print "<p>Введите e-mail [*]: \n";
		print "<input type='text' name='mail'> ";
		print "<p>Поля, помеченные [*], обязательны для заполнения!";
		print "<p><input type='submit' value='Записать! '>\n </form>\n";
	}
	
	Write_form();
	if(isset($_POST['name']) && isset($_POST['mail']))
	{
		$dberror = "";
		$name = $_POST['name'];
		$city = $_POST['city'];
		$address = $_POST['address'];
		$birthday = $_POST['birthday'];
		$mail = $_POST['mail'];
		$ret = Add_to_database($name, $city, $address, $birthday, $mail, $dberror);
		if (!$ret)
		{
			print "Ошибка: $dberror<br>";
		}
		else
		{
			print "Спасибо";
		}
	}
	else
	{
		print "Обязательные поля не введены!";
	}
?> 
	</body> 
</html>