<?php
	// examples
	
	header ("Content-type: text/html; charset=utf-8");
	
	require_once '../PHPWord.php';
	
	$PHPWord = new PHPWord();	
	$document = $PHPWord->loadTemplate('source.docx');
	
	// simple parsing
	$document->setValue('{var1}', 'value');
	
	// prepare data for tables
	$data1 = array(
		'num' => array(1,2,3),
		'color' => array('red', 'blue', 'green'),
		'code' => array('ff0000','0000ff','00ff00')
	);	
	$data2 = array(
		'val1' => array(1,2,3),
		'val2' => array('red', 'blue', 'green'),
		'val3' => array('a','b','c')
	);
	$data3 = array(
		'day' => array('Mon','Tue','Wed','Thu','Fri'),
		'dt' => array(12,14,13,11,10),
		'nt' => array(0,2,1,2,-1),
		'dw' => array('SSE at 3 mph', 'SE at 2 mph', 'S at 3 mph', 'S at 1 mph', 'Calm'),
		'nw' => array('SSE at 1 mph', 'SE at 1 mph', 'S at 1 mph', 'Calm', 'Calm')		
	);
		
	// clone rows	
	$document->cloneRow('TBL1', $data1);
	$document->cloneRow('TBL2', $data2);
	$document->cloneRow('DATA3', $data3);
	
	// save file
	$tmp_file = 'result.docx';
	$document->save($tmp_file);
	
	print date("Y-m-d H:i:s") . " <br>";
	print "source.docx &rarr; result.docx <br>";
	print "complete.";
?>