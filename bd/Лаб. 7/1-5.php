<?php
	function print_array($array)
	{
		print "<p>";
		foreach ($array as $key=>$val)
		{
			print "$key: $val<br>";
		} 
		print "</p>";
	}
	$cust = array 
	(
		'cnum' => "2001",
		'city' => "London",
		'cname' => "Hoffman",
		'snum' => 1001,
		'rating' => 100
	); 
	print_array($cust);
	
	asort($cust);
	print_array($cust);	
	
	ksort($cust);
	print_array($cust);

	sort($cust);
	print_array($cust);	
?>