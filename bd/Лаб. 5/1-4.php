<?php	
	define("NUM_E", 2.71828);
	
	print "Число e равно ".NUM_E."\n";
	
	$num_e1=NUM_E;

	print gettype($num_e1); 
	print " $num_e1\n";
	
	settype($num_e1, "string");
	print gettype($num_e1);
	print " $num_e1\n";
	
	settype($num_e1, "integer");
	print gettype($num_e1);
	print " $num_e1\n";
	
	settype($num_e1, "boolean");
	print gettype($num_e1);
	print " $num_e1\n";
?>