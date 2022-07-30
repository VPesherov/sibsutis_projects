<html> 
	<head>
		<title> 
			Листинг 10-4. Обработка данных формы из листинга 10-3 
		</title> 
	</head> 
<body>
	<?php
		if ($_GET['user']==null) 
		{
			$user = "Makovka";
		}
		else
		{
			$user = ($_GET['user']);		
		}
		$correct = 0;
		$answers = ($_GET['answers']);
		$correct_answers = array("Maдpид", "Бepлин", "Mилaн", "Caнкт-Пeтepбypг", "Иepуcaлим", "Moсква", "Пapиж", "Hью-Йopк", "Лондон");
		print "<ul>\n";
		for ($i=0; $i<=8; $i++)
		{
			if ($answers[$i] == $correct_answers[$i])
			{
				$correct++;
			}
		}
		switch ($correct)
		{
			case 0:
				print "$user, вы вообще не знаете географию";
				break;
			case 1:
				print "$user, вы вообще не знаете географию";
				break;
			case 2:
				print "$user, вы очень плохо знаете географию";
				break;
			case 3:				
				print "$user, вы плохо знаете географию";
				break;
			case 4:
				print "$user, вы терпимо знаете географию";
				break;
			case 5:				
				print "$user, вы удовлетворительно знаете географию";
				break;
			case 6:
				print "$user, вы хорошо знаете географию";
				break;
			case 7:
				print "$user, вы очень хорошо знаете географию";
				break;
			case 8:
				print "$user, вы отлично знаете географию";
				break;
			case 9:	
				print "$user, вы великолепно знаете географию";
				break;			
		}
		print "</ul>\n";
		print "<p align=left><a href='1-3.htm'>назад</a>";
	?>
</body> 
</html> 