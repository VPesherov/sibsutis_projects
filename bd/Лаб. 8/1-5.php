<?php
	$listing="";
    $list_sites = array('http://www.yandex.ru', 'http://www.google.com', 'http://yahoo.com', 'http://rambler.ru', 'http://mail.ru');
    
    foreach($list_sites as $val)
	{
        $listing.='<option value='.$val.'>'.$val.'</option>';
    }
     
    $html = '
		<html> 
			<head>
				<title> 
					Листинг 10-9. Посылка заголовка с помощью функции header() 
				</title> 
			</head> 
			<body>
				<form action="" method="post">
					<select name="site">
					<option value = "">Поисковые системы:
						'.$listing.'
					</select>
					<input type="submit" value="Перейти" />
				</form>
			</body>
		</html> 
    ';
    
    $site = $_POST['site'];
    if($site != "")
	{
        header("Location: $site");
        exit($site);
    }
     
    echo $html;    
?>