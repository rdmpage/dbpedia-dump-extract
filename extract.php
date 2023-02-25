<?php

$row_count = 1;

$filename = "short-abstracts_lang=en.ttl";

$headings = array('id', '`key`', 'language', 'value');

echo join("\t", $headings) . "\n";

$file_handle = fopen($filename, "r");
while (!feof($file_handle)) 
{
	$line = trim(fgets($file_handle));
	
	//echo $line . "\n";
	
	if (preg_match('/<http:\/\/dbpedia.org\/resource\/(?<enwiki>.*)> <http:\/\/www.w3.org\/2000\/01\/rdf-schema#comment>\s+"(?<value>.*)"@(?<language>[a-z]+)/', $line, $m))
	{
		//print_r($m);
		
		$row = array(
			$m['enwiki'],
			'comment',
			$m['language'],
			$m['value']
		);
		
		echo join("\t", $row) . "\n";
	}
	
	if ($row_count++ == 10)
	{
		//exit();
	}
	
}	


