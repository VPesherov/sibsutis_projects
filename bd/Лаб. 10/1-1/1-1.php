<?php
//css-styles
	print "<style>
	th 
	{
		font-family: Arial;
		font-size: 10pt;
	}

	td 
	{
		font-family: 'Courier New';
		font-size: 12pt;
	}

	h4 
	{
		color: blue;
		font-size: 14pt;
	}
	</style>";
//////////////////
	
//Connect to db	
    $servername = "localhost";
    $user = "root";
    $pass = "";
    $db = "study";
  
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
//////////////////


////////////print-db
	if (isset($_GET["structure"]))
	{		
		foreach($_GET["structure"] as $key=>$value) 
		{
			print "<h4>Структура таблицы $value</h4>";
			
			$result = mysqli_query($conn, "SELECT * FROM $value");
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
	}
	
	if (isset($_GET["content"]))
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
		$rus_name["amt"] = "цена";
		$rus_name["odate"] = "дата заказа";
		
		foreach($_GET["content"] as $key=>$value) 
		{
			print "<h4>Содержимое таблицы $value</h4>";

			$result = mysqli_query($conn, "SHOW COLUMNS FROM $value");
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

			$result = mysqli_query($conn,  "SELECT * FROM $value");
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
	}
	print "<p align=left><a href='1-1.html'>возврат к выбору таблицы</a>";
//////////////

//disconnect-from-db
    mysqli_close($conn);
////////////
?>