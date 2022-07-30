<?php  
	function vid_structure($table, $conn) 
	{
		print "<h4>Структура таблицы $table</h4>";
			
		$result = mysqli_query($conn, "SELECT * FROM $table");
		if (!$result)
		{ 
			$dberror = mysqli_error($conn);
			print "$dberror";
			return false;
		}
		$num_fields = mysqli_num_fields($result);
		for ($x = 0; $x < $num_fields; $x++)
		{
			$finfo = mysqli_fetch_field_direct($result, $x);
				
			print "Name:".$finfo->name.", ";
			print "max. Len:".$finfo->max_length.", ";
			print "Flags:".$finfo->flags.", ";
			print "Type:".$finfo->type."<br>";	
		}
		print "<br>";
	}

	function vid_content($table, $conn) 
	{
		$rus_name["id"] = "идентификатор";
		$rus_name["snum"] = "номер продавца";
		$rus_name["sname"] = "имя продавца";
		$rus_name["city"] = "город";
		$rus_name["comm"] = "коммисия";
		$rus_name["cnum"] = "номер покупателя";
		$rus_name["cname"] = "имя покупателя";
		$rus_name["rating"] = "рейтинг";
		$rus_name["onum"] = "номер заказа";
		$rus_name["amt"] = "кол-во";
		$rus_name["odate"] = "дата заказа";
		
		print "<h4>Содержимое таблицы $table</h4>";

		$result = mysqli_query($conn, "SHOW COLUMNS FROM $table");
		if (!$result)
		{ 
			$dberror = mysqli_error($conn);
			print "$dberror";
			return false;
		}
			
		$head="";
		while($a_row = mysqli_fetch_array($result))
		{
			$head .='<th>'.$rus_name[$a_row[0]]."<br>".$a_row[0].'</th>';
		}

		$result = mysqli_query($conn, "SELECT * FROM $table");
		if (!$result)
		{ 
			$dberror = mysqli_error($conn);
			print "$dberror";
			return false;
		}
			
		$output = "<table border=1>".$head."<tr>";
		while($a_row = mysqli_fetch_row($result)) 
		{
			$output .= "<tr>";
			foreach ($a_row as $key => $val) 
			{	
				$output .= "<td>".$val."</td>";			
			}
			$output .= "</tr>";
		}
		$output .= "</table><br>";
		print $output;
	}
	
  	if (isset($_GET["structure"]))
	{	
		foreach($_GET["structure"] as $key=>$value) 
		{
			vid_structure($value, $conn);
		}
	}

  	if (isset($_GET["content"]))
	{	
		foreach($_GET["content"] as $key=>$value) 
		{
			vid_content($value, $conn);
		}
	}
  
	print "<br><a href='1-2.html'>Возврат к выбору таблицы</a>";
?>