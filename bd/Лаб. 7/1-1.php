<?php
	function print_array($array)
	{
		print "<p>";
		foreach ($array as $val)
		{
			print "$val  ";
		}
		print "</p>";
	}
	
	for($i=1; $i<=10; $i++)
	{
		$treug[$i] = ($i*($i+1))/2;
		$kvd[$i] = ($i*$i);
	}
	$rez = array_merge($treug, $kvd);
	
	print "Treug mas:"; 
	print_array($treug);
	print "Kvd mas:"; 
	print_array($kvd);
	print "Treug+kvd mas:"; 	
	print_array($rez);
	
	print "Sort rez mas:"; 
	sort($rez);
	print_array($rez);

	print "Array shift rez mas:"; 	
	array_shift($rez);
	print_array($rez);	

	print "Unique rez mas:"; 
	$rez1=array_unique($rez);
	print_array($rez1);	
?>